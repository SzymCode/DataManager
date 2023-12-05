<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required|integer',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'personal_phone' => 'nullable|string|max:20',
            'work_phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'birthday' => 'nullable|date',
            'contact_groups' => 'nullable|array',
            'role' => 'required|string|in:user,admin,staff'
        ];
    }
}
