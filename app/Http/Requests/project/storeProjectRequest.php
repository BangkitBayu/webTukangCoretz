<?php

namespace App\Http\Requests\project;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Override;

class storeProjectRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }



    #[Override]
    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => Str::slug($this->name),
            'is_show' => (int) $this->is_show,
            'category_id' => (int) $this->category_id,
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
            'name' => ['required', 'uppercase', 'max:255'],
            'thumbnail' => ['required', 'string'],
            'description' => ['required'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after:start_date'],
            'is_show' => ['required', 'integer', 'in:0,1'],
            'category_id' => ['required', 'integer', 'exists:category_projects,id']
        ];
    }

    #[Override]
    protected function failedValidation(Validator $validator)
    {
        session()->flash('error', 'Failed to save data, please check your form and try again!');
        return parent::failedValidation($validator);
    }
}
