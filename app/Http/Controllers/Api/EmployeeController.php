<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        try {
            $employees = Employee::with('company')->select('employees.*')->get();

            return response()->json([
                'success' => true,
                'data'    => $employees,
            ], 200);
        } catch (\Exception $e) {
            \Log::error('Employee Index Error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch employees',
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $employee = Employee::with('company')->findOrFail($id);

            return response()->json([
                'success' => true,
                'data'    => $employee,
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Employee not found',
            ], 404);
        } catch (\Exception $e) {
            \Log::error('Employee Show API Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch employee',
            ], 500);
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'company_id' => 'nullable|exists:companies,id',
            'email'      => 'nullable|email|max:255',
            'phone'      => 'nullable|string|max:20',
        ]);

        try {
            $employee = Employee::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Employee created successfully',
                'data'    => $employee,
            ], 201);
        } catch (\Exception $e) {
            \Log::error('Employee Store API Error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to create employee',
            ], 500);
        }
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'email'      => 'nullable|email|max:255',
            'phone'      => 'nullable|string|max:20',
        ]);

        $employee->update($validated);

        return response()->json([
            'message'  => 'Employee updated successfully',
            'employee' => $employee,
        ]);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return response()->json([
            'message' => 'Employee deleted successfully',
        ]);
    }
}
