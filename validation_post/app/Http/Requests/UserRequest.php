<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $userId = $this->route('User');
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->route('User'),
            'role' => 'required|string|in:client,admin',
            'password' => $this->isMethod('post') ? 'required|string|min:8|confirmed' : 'nullable|string|min:8|confirmed',
            'telephone' => 'nullable|string|max:15',
            'role' => 'required|in:client,admin',
        ];
        if ($this->isMethod('post')) {
            $rules['password'] = 'required|string|min:8|confirmed';
        }

        if ($this->isMethod('put')) {
            $rules['password'] = 'nullable|string|min:8|confirmed';
        }

        return $rules;
    }




}
