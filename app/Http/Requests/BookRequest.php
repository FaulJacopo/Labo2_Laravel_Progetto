<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title' => 'required|max:128',
            'description' => 'required|max:2048',
            'pages' => 'required',
            'author_id' => 'required',
            'category_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Il campo titolo è obbligatorio.',
            'title.max' => 'Il campo titolo non può superare i 128 caratteri.',
            'description.required' => 'Il campo descrizione è obbligatorio.',
            'description.max' => 'Il campo descrizione non può superare i 2048 caratteri.',
            'pages.required' => 'Il campo pagine è obbligatorio.',
            'author_id.required' => 'Il campo autore è obbligatorio.',
            'category_id.required' => 'Il campo categoria è obbligatorio.',
        ];
    }
}
