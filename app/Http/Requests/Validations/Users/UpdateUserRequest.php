<?php

namespace App\Http\Requests\Validations\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function wantsJson(){
        return $this->ajax() || $this->wantsJson();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $userId = $this->route('id') ?? null;

        return [
            'id' => 'required|integer',
            'name' => 'required|min:3',
             'email' => 'required|email|unique:users,email,' . $userId,
            'password' => 'required|min:6',
            'categories' => 'required|array',
            'channels' => 'required|array'
        ];
    }
}
