<?php

namespace App\Http\Controllers;

use App\Services\TelegramService;
use Illuminate\Http\Request;

class TelegramController extends Controller
{
    protected $telegram;

    public function __construct(TelegramService $telegram)
    {
        $this->telegram = $telegram;
    }

    public function webhook(Request $request)
    {
        // Get the incoming update
        $update = $request->all();
        $message = json_encode($request->all());

        send_notification($message);

        // Check if the update contains a message
        if (isset($update['message'])) {
            $chatId = $update['message']['chat']['id'];
            $message = $update['message']['text'];

            // Auto-reply logic
            $this->autoReply($chatId, $message);
        }

        return response()->json(['status' => 'success']);
    }

    protected function autoReply($chatId, $message)
    {
        if (stripos($message, 'hello') !== false) {
            $replyText = "Hello! How can I help you?";
        } elseif (stripos($message, 'help') !== false) {
            $replyText = "You can ask me anything!";
        } else {
            $replyText = "I'm not sure how to respond to that.";
        }

        $this->telegram->sendMessage($chatId, $replyText);
    }
}
