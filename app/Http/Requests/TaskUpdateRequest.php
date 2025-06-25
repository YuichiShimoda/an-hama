<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskUpdateRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'nullable|string',
            'start' => 'required|date_format:Y-m-d H:i',
            'end' => 'required|date_format:Y-m-d H:i|after_or_equal:start',
            'all_day' => 'boolean',
            'background_color' => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '必ず入力してください。',
            'start.required'   => '必ず入力してください。',
            'start.date_format'      => '「 YYYY-MM-DD HH:MM 」の形式で入力してください。',
            'end.required'   => '必ず入力してください。',
            'end.date_format'      => '「 YYYY-MM-DD HH:MM 」の形式で入力してください。',
            'end.after_or_equal'      => '開始日時よりも後の日時を入力してください。',
            'all_day.boolean' => '終日の設定に問題があります。',
            'background_color.required' => '必ず入力してください。',
            'background_color.regex' => '「 # 」から始まる6桁の16進数カラーコードで入力してください。',
        ];
    }
}
