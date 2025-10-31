<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'email'      => 'nullable|email|max:255',
            'phone'      => 'nullable|string|max:20',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'The first name is required.',
            'last_name.required'  => 'The last name is required.',
            'company_id.required' => 'Please select a company.',
            'company_id.exists'   => 'The selected company is invalid.',
            'email.email'         => 'Please enter a valid email address.',
        ];
    }
}
