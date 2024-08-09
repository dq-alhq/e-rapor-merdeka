<?php

namespace App\Http\Requests;

use App\Enums\ProjectTheme;
use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'tema' => 'required|in:' . implode(',', array_column(ProjectTheme::cases(), 'value')),
            'kegiatan' => 'required',
            'deskripsi' => 'required',
            'subelement_1' => 'required|exists:subelements,id',
            'subelement_2' => 'required|exists:subelements,id',
            'subelement_3' => 'required|exists:subelements,id',
        ];
    }
}
