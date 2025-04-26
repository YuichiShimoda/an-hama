<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsStoreRequest extends FormRequest
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
            'category' => 'required',
            'title' => 'required|max:30',
            'body' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'category.required' => '必ず入力してください。',
            'title.required'   => '必ず入力してください。',
            'title.max'      => '30文字以内で入力してください。',
            'body.required'=> '必ず入力してください。',
        ];
    }
}
