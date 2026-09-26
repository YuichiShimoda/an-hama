<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoStoreRequest extends FormRequest
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
            'expired_at' => 'nullable|date_format:Y-m-d H:i|after_or_equal:now',
            // 'filename' => 'required|regex:/^[a-zA-Z0-9\-]+$/|unique:videos,filename',
            'video' => 'required|file|mimetypes:video/mp4,video/webm|max:10240',
            'btn_title' => 'required|max:11',
            'is_visible' => 'boolean',
            'script' => 'nullable',
            'memo' => 'nullable',
            'next_video_id1' => 'nullable|exists:videos,id',
            'next_video_id2' => 'nullable|exists:videos,id',
            'next_video_id3' => 'nullable|exists:videos,id',
            'first_video' => 'boolean',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '必ず入力してください。',
            'expired_at.date_format' => '「 YYYY-MM-DD HH:mm 」の形式で入力してください。',
            'expired_at.after_or_equal' => '現在以降の日時を入力してください。',
            // 'filename.required' => '必ず入力してください。',
            // 'filename.regex' => 'アルファベット、数字、-（ ハイフン ）で入力してください。',
            // 'filename.unique' => 'すでに使用されています。',
            'video.required' => '必ず選択してください。',
            'video.file' => 'ファイルを選択してください。',
            'video.mimetypes' => '対応している動画形式は「 mp4 / webm 」のいずれかです。',
            'video.max' => '10MBを超える動画はアップロードできません。',
            'btn_title.required' => '必ず入力してください。',
            'btn_title.max' => '11文字以内で入力してください。',
            'next_video_id1.exists' => '指定された動画は存在しません。',
            'next_video_id2.exists' => '指定された動画は存在しません。',
            'next_video_id3.exists' => '指定された動画は存在しません。',
            'first_video.boolean' => '正しい形式で選択してください。',
        ];
    }
}
