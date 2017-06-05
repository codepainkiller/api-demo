<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrackStore extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'artist' => 'required',
            'duration' => 'required|integer'
        ];
    }

    public function response(array $errors)
    {
        return response()->json(['errors' => $errors], 422);
    }

    public function messages()
    {
        return [
            'required' => 'El parámetro :attribute es requerido.',
            'integer'  => 'El parámetro :attribute debe ser un entero.'
        ];
    }
}
