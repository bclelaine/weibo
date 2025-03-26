<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DeepseekController extends Controller
{
    public function chat(Request $request): StreamedResponse
    {
        $message = $request->getContent();
        var_dump($message);
        return response()->stream(function () use ($message) {
            yield $message;
            $msgData = json_decode($message, true);
            $stream = OpenAI::chat()->createStreamed([
                'model' => 'deepseek-chat',
                'messages' => [
                    ['role' => 'user', 'content' => $msgData['message']],
                ]
            ]);
            var_dump($stream);
            foreach ($stream as $response) {
                yield $response->choices[0];
            }
        });
    }
}
