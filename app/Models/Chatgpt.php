<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Chatgpt extends Model
{
    use HasFactory;

    /**
     * 
     * question    chatgpt问题
     *
     */
    public function getAnswer($question){
        $chatgpt_key = config("app.chatgpt_key");
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer ".$chatgpt_key,
        ])->withoutVerifying()->post('https://api.openai.com/v1/completions', [
            'model' => 'text-davinci-003',
            'prompt' => $question,
            'temperature' => 0,
            'max_tokens' => 1024,
            'top_p' => 1,
            'frequency_penalty' => 0.0,
            'presence_penalty' => 0.0,
            'stop' => '["\n"]',
        ]);
        $result = $response->json();
        return $result['choices'][0]['text'];
    }
}
