<?php

namespace App\Http\Requests\ProjectManagement;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class storeProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'regex:/^[A-Z]/', 'unique:projects,name'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after:start_date'],
            'category_id' => ['required', 'exists:categories,id']
        ];
    }

    #[Override]
    protected function failedValidation(Validator $validator)
    {
        return back(422)->withErrors($validator->errors())->withInput();
    }
}
