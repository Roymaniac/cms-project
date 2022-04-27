<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image_url' => 'nullable',
            'category_id' => 'required|string|exists:categories,id',
            'user_id' => 'required|string|exists:users,id',
            'status' => 'nullable|string|in:Published,Archived,Draft',
        ];
    }
}
