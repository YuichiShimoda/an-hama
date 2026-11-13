<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeasonPastaStoreRequest extends FormRequest
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
            'is_visible' => 'boolean',
            'period' => 'required',
            'reservation_at' => 'required|date_format:Y-m-d H:i',
            'expired_at' => 'required|date_format:Y-m-d H:i|after:reservation_at',
            'dish' => 'required|image|mimes:png,webp|max:3072',
            'ingredient1' => 'required',
            'ingredient2' => 'required',
            'comment' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'period.required' => '必ず選択してください。',
            'reservation_at.required' => '開始時間を入力してください。',
            'reservation_at.date_format' => '「 YYYY-MM-DD HH:mm 」の形式で入力してください。',
            'expired_at.required' => '終了時間を入力してください。',
            'expired_at.date_format' => '「 YYYY-MM-DD HH:mm 」の形式で入力してください。',
            'expired_at.after' => '終了時間は開始時間より後に設定してください。',
            'dish.required' => '画像ファイルを必ず設定してください。',
            'dish.image' => '画像ファイルを選択してください。',
            'dish.mimes' => '「 png / webp 」の拡張子が使用可能です。',
            'dish.max'   => 'ファイルサイズは3MB以下にしてください。',
            'dish.required' => '必ず選択してください。',
            'ingredient1.required'   => '1つ目の食材を入力してください。',
            'ingredient2.required'   => '2つ目の食材を入力してください。',
        ];
    }
}
