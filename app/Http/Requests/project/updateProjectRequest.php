<?php

namespace App\Http\Requests\project;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Override;

class updateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    #[Override]
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->name),
            'is_show' => (int) $this->is_show,
            'category_project_id' => (int) $this->category_project_id,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', "regex:/^([A-Z][A-Za-z0-9\-']*)(\s[A-Za-z0-9][A-Za-z0-9\-']*)*$/", 'max:255'],
            'slug' => ['required', 'alpha_dash'],
            'thumbnail' => ['sometimes', 'image', 'mimes:png,jpg,jpeg,webp', 'max:2048'],
            'description' => ['required'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after:start_date'],
            'is_show' => ['required', 'integer', 'in:0,1'],
            'category_project_id' => ['required', 'integer', 'exists:category_projects,id']
        ];
    }

    #[Override]
    protected function failedValidation(Validator $validator)
    {
        session()->flash('error', 'Failed to update data, please check your form and try again!');
        return parent::failedValidation($validator);
    }
}
