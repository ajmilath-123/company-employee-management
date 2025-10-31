<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        try {
            $companies = Company::paginate(10);

            return response()->json([
                'success' => true,
                'data'    => $companies,
            ], 200);
        } catch (\Exception $e) {
            \Log::error('Company Index Error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch companies',
            ], 500);
        }

    }

    public function show($id)
    {
        try {
            $company = Company::with('employees')->findOrFail($id);

            return response()->json([
                'success' => true,
                'data'    => $company,
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Company not found',
            ], 404);
        } catch (\Exception $e) {
            \Log::error('Company Show API Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch company',
            ], 500);
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'logo'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email'   => 'nullable|email|max:255',
            'website' => 'nullable|string|max:255',
        ]);

        try {
            if ($request->hasFile('logo')) {
                $path              = $request->file('logo')->store('logos', 'public');
                $validated['logo'] = $path;
            }

            $company = Company::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Company created successfully',
                'data'    => $company,
            ], 201);
        } catch (\Exception $e) {
            \Log::error('Company Store API Error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to create company',
            ], 500);
        }
    }

    public function update(Request $request, Company $company)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
            'logo'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $path              = $request->file('logo')->store('logos', 'public');
            $validated['logo'] = $path;
        }

        $company->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Company updated successfully',
            'data'    => $company,
        ]);
    }

    public function destroy(Company $company)
    {
        try {
            $company->delete();

            return response()->json([
                'success' => true,
                'message' => 'Company deleted successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete company',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
