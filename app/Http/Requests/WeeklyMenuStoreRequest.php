<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeeklyMenuStoreRequest extends FormRequest
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
            'menu' => 'required',
            'start_day' => 'required|date_format:Y-m-d',
            'end_day' => 'required|date_format:Y-m-d|after:start_day',
        ];
    }

    public function messages()
    {
        return [
            'menu.required' => '必ず入力してください。',
            'start_day.required'   => '必ず入力してください。',
            'start_day.date_format'      => '「 YYYY-MM-DD 」の形式で入力してください。',
            'end_day.required'   => '必ず入力してください。',
            'end_day.date_format'      => '「 YYYY-MM-DD 」の形式で入力してください。',
            'end_day.after'      => '開始日よりも後の日付を入力してください。',
        ];
    }
}
