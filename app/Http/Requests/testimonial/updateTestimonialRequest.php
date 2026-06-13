<?php

namespace App\Http\Requests\testimonial;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class updateTestimonialRequest extends FormRequest
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
        $this->merge(
            [
                'rating' => (int) $this->rating,
                'isShow' => (int) $this->isShow,
            ]
        );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', "regex:/^([A-Z][A-Za-z\-']*)(\s[A-Za-z][A-Za-z\-']*)*$/", 'max:255'],
            'position' => ['required', 'max:255'],
            'comment' => ['required'],
            'rating' => ['required', 'integer', function (string $attribute, mixed $value, \Closure $fail) {
                if ($value < 0) {
                    $fail("The rating field must be at least 0.");
                }
            }, 'max:5'],
            'isShow' => ['required', 'integer', 'in:0,1']
        ];
    }

    #[Override]
    protected function failedValidation(Validator $validator)
    {
        session()->flash('error', 'Failed to update data, please check your form and try again!');
        return parent::failedValidation($validator);
    }
}
