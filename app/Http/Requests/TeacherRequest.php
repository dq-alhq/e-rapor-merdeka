<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TeacherRequest extends FormRequest
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
            'nama' => 'required|string|max:255',
            'gender' => 'required|in:L,P',
            'nip' => ['required', 'numeric', Rule::unique('teachers', 'nip')->ignore($this?->teacher?->id)],
            'nuptk' => ['required', 'numeric', Rule::unique('teachers', 'nuptk')->ignore($this?->teacher?->id)],
            'nik' => ['required', 'numeric', Rule::unique('teachers', 'nik')->ignore($this?->teacher?->id)],
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'village_id' => 'required|exists:villages,id',
            'photo' => 'nullable|image|max:2048|mimes:png,jpg,jpeg',
        ];
    }
}
