<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Override;

class updateVisibilityRequest extends FormRequest
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
        $this->merge(
            [
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
            'is_visible' => ['required', 'integer', 'in:0,1']
        ];
    }

    #[Override]
    protected function failedValidation(Validator $validator): RedirectResponse
    {
        return back()->with('error', 'Gagal memperbarui status aktif, silahkan coba lagi!');
    }
}
