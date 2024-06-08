<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class UpdateRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The field is required.',
            'title.string' => 'The field must be a string.',
            'content.required' => 'The field is required.',
            'content.string' => 'The field must be a string.',
            'preview_image.required' => 'The field is required.',
            'preview_image.image' => 'The field must be a image.',
            'preview_image.max' => 'The field must not be greater than 1024 kilobytes.',
            'main_image.required' => 'The field is required.',
            'main_image.image' => 'The field must be a image.',
            'main_image.max' => 'The field must not be greater than 1024 kilobytes.',
            'category_id.required' => 'The field is required.',
            'category_id.integer' => 'The field must be a number.',
            'category_id.exists' => 'The category ID must be in the database.',
            'tag_ids.array' => 'Need to send an array of data.',
        ];
    }
}
