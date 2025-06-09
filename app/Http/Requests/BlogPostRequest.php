<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostRequest extends FormRequest
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
            'title' => 'bail|required|max:255|unique:post,title,' . $this->route('blog'),
            'body' => 'bail|required',
            'author' => 'bail|required|max:255',
            'published' => 'bail|required',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Mandatory field',
            'body.required' => 'Mandatory field',
            'author.required' => 'Mandatory field',
            'published.required' => 'Mandatory field',
        ];
    }
}
