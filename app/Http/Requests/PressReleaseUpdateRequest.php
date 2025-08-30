<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\PressRelease;

class PressReleaseUpdateRequest extends FormRequest
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
            'body' => 'required',
            'start' => 'required|date_format:Y-m-d',
            'end' => 'required|date_format:Y-m-d|after_or_equal:start',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '必ず入力してください。',
            'body.required' => '必ず入力してください。',
            'start.required'   => '必ず入力してください。',
            'start.date_format'      => '「 YYYY-MM-DD 」の形式で入力してください。',
            'end.required'   => '必ず入力してください。',
            'end.date_format'      => '「 YYYY-MM-DD 」の形式で入力してください。',
            'end.after_or_equal'      => '開始日時よりも後の日時を入力してください。',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $id = $this->route('press_release');
            $start = $this->input('start');
            $end = $this->input('end');

            $overlap = PressRelease::where(function ($query) use ($start, $end) {
                $query->where('start', '<=', $end)
                      ->where('end', '>=', $start);
            })->where('id', '!=', $id['id'])->exists();

            if ($overlap) {
                $validator->errors()->add('start', 'すでに登録しているデータと重複しています。');
                $validator->errors()->add('end', ' ');
            }
        });
    }
}
