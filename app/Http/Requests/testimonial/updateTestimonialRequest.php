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
                'is_visible' => (int) $this->is_visible,
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
            'occupation' => ['required', 'max:255'],
            'feedback' => ['required', 'max:300'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'is_visible' => ['required', 'integer', 'in:0,1']
        ];
    }

    #[Override]
    public function messages(): array
    {
        return [
            'name.required' => 'Nama pelanggan harus diisi.',
            'name.regex' => 'Nama harus diawali huruf kapital dan dipisahkan dengan spasi.',
            'name.max' => 'Panjang nama pelanggan maksimal 255 karakter.',

            'occupation.required' => 'Pekerjaan harus diisi.',
            'occupation.max' => 'Panjang nama pekerjaan maksimal 255 karakter.',

            'feedback.required' => 'Testimoni pelanggan harus diisi.',
            'feedback.max' => 'Panjang testimoni maksimal 300 karakter.',

            'rating.required' => 'Rating harus diisi',
            'rating.integer' => 'Rating invalid',
            'rating.min' => 'Rating minimal adalah 1',
            'rating.max' => 'Rating maksimal adalah 5',
        ];
    }

    #[Override]
    protected function failedValidation(Validator $validator)
    {
        session()->flash('error', 'Gagal menyimpan data, silahkan cek data dan coba lagi!');
        return parent::failedValidation($validator);
    }
}
