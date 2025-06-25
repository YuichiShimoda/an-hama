<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VoiceController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'your-name'       => 'required|string|max:255',
            'your-sex'        => 'required',
            'your-age'        => 'required',
            'your-day'        => 'required',
            // 'your-num'        => 'required',
            'your-visit-num'  => 'required',
            'your-visit-how'  => 'required',
            'your-know'       => 'required',
            'your-taste'      => 'required',
            'your-service'    => 'required',
            'your-clean'      => 'required',
            'your-interior'   => 'required',
            'your-overall'    => 'required',
        ]);

        $data = $request->only([
            'your-name', 'your-sex', 'your-age', 'your-day',
            'your-visit-num', 'your-visit-how', 'your-know',
            'your-taste', 'your-service', 'your-clean',
            'your-interior', 'your-overall', 'your-request',
        ]);

        $body = <<<EOT

HP経由でアンケートの回答がありました。

-------------------------

ニックネーム：{$data['your-name']}
性別：{$data['your-sex']}
年齢：{$data['your-age']}
来店日：{$data['your-day']}
来店回数：{$data['your-visit-num']}
来店方法：{$data['your-visit-how']}
知ったキッカケ：{$data['your-know']}
味評価：{$data['your-taste']}
接客評価：{$data['your-service']}
清潔評価：{$data['your-clean']}
内装評価：{$data['your-interior']}
総合評価：{$data['your-overall']}

ご意見・ご感想:
{$data['your-request']}
EOT;

        Mail::raw($body, function ($message) {
            $message->to('info@an-hama.com')->subject('【 要確認 】HPからのアンケート回答');
        });
        return redirect()->back()->with('success', 'complete');
    }
}
