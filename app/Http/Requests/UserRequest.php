<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
     */
    public function rules(): array
    {
        // Obtém o ID do usuário atual, se disponível.
        $userId = $this->route('user') ? $this->route('user')->id : null;

        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                // Adiciona o ID do usuário corretamente na regra unique.
                'unique:users,email,' . $userId,
            ],
            'password' => $userId ? 'nullable|min:6' : 'required|min:6', // Senha opcional ao editar
        ];
    }

    /**
     * Customiza as mensagens de validação.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório!',
            'email.required' => 'O campo e-mail é obrigatório!',
            'email.email' => 'É necessário enviar um e-mail válido.',
            'email.unique' => 'O e-mail já está cadastrado.',
            'password.required' => 'O campo senha é obrigatório!',
            'password.min' => 'A senha deve conter no mínimo 6 caracteres.',
        ];
    }
}
