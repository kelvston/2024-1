<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class ChatController extends Controller
{
    public function index()
    {
        // Display chat interface
        return view('chat');
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $message = new Message();
        $message->content = $request->input('message');
        $message->user_id = auth()->id(); // Assuming you have user authentication
        $message->save();

        // Process message and get lawyer response here

        return response()->json(['success' => true]);
    }
}
