<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieStoreRequest extends FormRequest
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
            'title' => 'required|max:15',
            'movie' => 'required|file|mimetypes:video/mp4,video/webm|max:10240',
            'filename' => 'required|regex:/^[a-zA-Z0-9\-]+$/|unique:movies,filename',
            'next_movie_id1' => 'nullable|exists:movies,id',
            'next_movie_id2' => 'nullable|exists:movies,id',
            'next_movie_id3' => 'nullable|exists:movies,id',
            // 'conversion_type' => 'required',
            'is_visible' => 'boolean',
            'expired_at' => 'nullable|date_format:Y-m-d|after_or_equal:today',
            'script' => 'nullable',
            'memo' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '必ず入力してください。',
            'title.max'      => '15文字以内で入力してください。',
            'movie.required' => '必ず選択してください。',
            'movie.file' => 'ファイルを選択してください。',
            'movie.mimetypes' => '対応している動画形式は「 mp4 / webm 」のいずれかです。',
            'movie.max' => '10MBを超える動画はアップロードできません。',
            'filename.required' => '必ず入力してください。',
            'filename.regex' => 'アルファベット、数字、-（ ハイフン ）で入力してください。',
            'filename.unique' => 'すでに使用されています。',
            'next_movie_id1.exists' => '指定された動画は存在しません。',
            'next_movie_id2.exists' => '指定された動画は存在しません。',
            'next_movie_id3.exists' => '指定された動画は存在しません。',
            // 'conversion_type.required' => '必ず選択してください。',
            'expired_at.date_format' => '「 YYYY-MM-DD 」の形式で入力してください。',
            'expired_at.after_or_equal' => '今日以降の日付を入力してください。',
        ];
    }
}
