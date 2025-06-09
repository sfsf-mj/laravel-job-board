<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'author' => 'bail|required|string|max:255',
            'content' => 'bail|required|string|max:255',
            'post_id' => 'bail|required|exists:post,id',
        ];
    }
    // public function messages(): array
    // {
    //     return [
    //         'author.required' => 'Mandatory field',
    //         'content.required' => 'Mandatory field',
    //         'post_id.required' => 'Mandatory field',
    //         'post_id.exists' => 'The selected post does not exist',
    //     ];
    // }
}
