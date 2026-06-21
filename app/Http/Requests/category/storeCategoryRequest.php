<?php

namespace App\Http\Requests\category;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Override;

class storeCategoryRequest extends FormRequest
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
            'category_name' => Str::title($this->category_name)
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
            'category_name' => ['required', 'unique:category_projects,name']
        ];
    }

    #[Override]
    protected function failedValidation(Validator $validator): void
    {
        session()->flash('error', 'Failed to save data, please check your form and try again!');
        parent::failedValidation($validator);
    }
}
