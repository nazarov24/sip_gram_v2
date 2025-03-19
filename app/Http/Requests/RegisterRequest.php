<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Определяет, имеет ли пользователь право выполнить этот запрос.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;  // Разрешаем всем пользователям выполнять этот запрос
    }

    /**
     * Получаем правила валидации, которые должны быть применены к запросу.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string|exists:roles,name' 
        ];
    }

    /**
     * Получаем сообщения для пользовательских ошибок валидации.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Имя обязательно для заполнения.',
            'email.required' => 'Email обязателен для заполнения.',
            'email.email' => 'Пожалуйста, укажите корректный email.',
            'password.required' => 'Пароль обязателен для заполнения.',
            'role.required' => 'Роль обязательна.',
        ];
    }
}
