<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreProjectRequest extends FormRequest
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
            'title' => ['required', 'min:5', 'max:50', 'unique:projects'],
            'content' => ['nullable'],
            'cover_image' => ['nullable', 'image', 'max:800'],
            'type_id' => ['nullable', 'exists:types,id'],
            'technologies' => ['nullable', 'exists:technologies,id'],
            /* 'github_link' => 'required|unique:projects,github_link|max:255',
            'internet_link' => 'nullable|unique:projects,internet_link|max:255', */
            'description' => ['nullable']
        ];
    }
}
