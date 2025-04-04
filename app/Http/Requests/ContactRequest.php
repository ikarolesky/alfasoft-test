<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => ['required', 'min:5', 'string'],
            'email' => ['required', 'email', 'string', 'max:255', 'unique:contacts'],
            'contact' => ['required', 'string', 'min:9', 'max:9', 'unique:contacts']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'name.min' => 'Name should have more than 5 characters',
            'email.required' => 'Email is required',
            'email.unique' => 'This email is already in use!',
            'contact.min' => 'Contact should have 9 digits',
            'contact.max' => 'Contact should have 9 digits',
            'contact.unique' => 'This number is already in use!'
        ];
    }
}
