<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ObituaryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required|date|before:today',
            'date_of_death' => 'required|date|before_or_equal:today',
            'biography' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'status' => 'sometimes|in:draft,published,pending'
        ];
    }
}
