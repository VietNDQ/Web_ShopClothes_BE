<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMessageRequest;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    public function getMessages()
    {
        // Kiểm tra người dùng đã xác thực hay chưa
        $user = Auth::guard('sanctum')->user();
        if (!$user) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn chưa đăng nhập'
            ], 401);
        }
        // Trả về danh sách tin nhắn
        $messages = Message::orderBy('created_at')->limit(50)->get();
        return response()->json(['data' => $messages]);
    }

    public function sendMessage(SendMessageRequest $request)
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $message = Message::create([
            'sender_id' => $user->id,
            'sender_type' => $user instanceof \App\Models\KhachHang ? 'user' : 'staff',
            'message' => $request->message,
        ]);

        return response()->json($message, 201);
    }
}
