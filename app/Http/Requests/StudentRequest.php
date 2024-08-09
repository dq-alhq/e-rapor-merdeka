<?php

namespace App\Http\Requests;

use App\Enums\ChildStatus;
use App\Enums\ParentJob;
use App\Enums\Religion;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentRequest extends FormRequest
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
            'nama' => ['required', 'string', 'max:255'],
            'nis' => ['required', 'numeric', Rule::unique('students', 'nis')->ignore($this->student?->id)],
            'nisn' => ['required', 'numeric', Rule::unique('students', 'nisn')->ignore($this->student?->id)],
            'nik' => ['required', 'numeric', Rule::unique('students', 'nik')->ignore($this->student?->id)],
            'gender' => ['required', 'in:L,P'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required'],
            'agama' => ['required', 'in:' . implode(',', array_column(Religion::cases(), 'value'))],
            'alamat' => ['required', 'string', 'max:255'],
            'village_id' => ['required', 'exists:villages,id'],
            'anak_ke' => ['required', 'numeric'],
            'status_anak' => ['required', 'in:' . implode(',', array_column(ChildStatus::cases(), 'value'))],
            'telepon' => ['required', 'string', 'max:255'],
            'ayah' => ['required', 'string', 'max:255'],
            'pekerjaan_ayah' => ['required', 'in:' . implode(',', array_column(ParentJob::cases(), 'value'))],
            'ibu' => ['required', 'string', 'max:255'],
            'pekerjaan_ibu' => ['required', 'in:' . implode(',', array_column(ParentJob::cases(), 'value'))],
            'wali' => ['required', 'string', 'max:255'],
            'pekerjaan_wali' => ['required', 'in:' . implode(',', array_column(ParentJob::cases(), 'value'))],
            'photo' => ['nullable', 'image', 'max:2048', 'mimes:png,jpg,jpeg'],
        ];
    }
}
