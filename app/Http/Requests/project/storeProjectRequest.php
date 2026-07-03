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
            'is_visible' => (int) $this->is_visible,
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
            'name' => ['required', "regex:/^([A-Z][A-Za-z0-9\-']*)(\s[A-Za-z0-9][A-Za-z0-9\-']*)*$/", 'max:255', 'unique:projects,name'],
            'slug' => ['required', 'alpha_dash'],
            'thumbnail' => ['required', 'image', 'mimes:png,jpg,jpeg,webp', 'max:2048'],
            'description' => ['required', 'max:300'],
            'is_visible' => ['required', 'integer', 'in:0,1'],
            'category_project_id' => ['required', 'integer', 'exists:category_projects,id']
        ];
    }

    #[Override]
    public function messages(): array
    {
        return [
            'name.required' => 'Nama proyek harus diisi.',
            'name.regex' => 'Nama harus diawali huruf kapital dan dipisahkan dengan spasi.',
            'name.max' => 'Panjang nama proyek maksimal 255 karakter.',

            'thumbnail.required' => 'Thumbnail harus diisi.',
            'thumbnail.image' => 'Thumbnail harus berupa gambar.',
            'thumbnail.mimes' => 'Thumbnail harus berupa file dengan format: png,jpg,jpeg,webp.',
            'thumbnail.max' => 'Ukuran thumbnail maksimal 2 MB.',

            'description.required' => 'Deskripsi proyek harus diisi.',
            'description.max' => 'Panjang deskripsi maksimal 300 karakter.',

            'is_visible.required' => 'Status visibilitas harus diisi.',
            'is_visible.integer' => 'Status visibilitas invalid.',
            'is_visible.in' => 'Status visibilitas harus diantara 0 dan 1.',

            'category_project_id.required' => 'Kategori proyek harus diisi.',
            'category_project_id.integer' => 'Kategori proyek invalid.',
            'category_project_id.exists' => 'Kategori proyek tidak ada.',
        ];
    }

    #[Override]
    protected function failedValidation(Validator $validator)
    {
        session()->flash('error', 'Gagal menyimpan data, silahkan cek data dan coba lagi!');
        return parent::failedValidation($validator);
    }
}
