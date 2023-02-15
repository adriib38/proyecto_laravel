<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessagesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'subject' => 'required|min:3|max:40',
            'text' => 'required|min:5|max:500',
        ];
    }

    public function messages()
    {
        return [
            'subject.required' => 'El asunto es obligatorio',
            'subject.min' => 'El asunto debe tener minimo 3 caracteres',
            'subject.max' => 'El asunto debe tener máximo 40 caracteres',
            'text.required' => 'El campo texto es obligatorio',
            'text.min' => 'El mensaje debe tener al menos 5 caracteres',
            'text.max' => 'El mensaje debe tener como máximo 500 caracteres',
        ];
    }
}
