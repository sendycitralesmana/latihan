<?php

namespace App\Http\Requests\Students;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
                'name' => 'required',
                'nis' => 'required|unique:students',
                'gender' => 'required',
                'id_class' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'id_class' => 'class'
        ];
    }

    public function messages()
    {
        return [
            // 'name.required' => 'Required'
        ];
    }
}
