<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendMessageRequest extends FormRequest
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
            'message' => 'required|string|max:500',
            'sender_type' => 'required|string|in:user,staff',
        ];
    }

    public function messages(): array
    {
        return [
            'message.required' => 'Nội dung tin nhắn là bắt buộc.',
            'message.string' => 'Nội dung tin nhắn phải là một chuỗi.',
            'message.max' => 'Nội dung tin nhắn không được vượt quá 500 ký tự.',
            'sender_type.required' => 'Loại người gửi là bắt buộc.',
            'sender_type.string' => 'Loại người gửi phải là một chuỗi.',
            'sender_type.in' => 'Loại người gửi phải là "user" hoặc "staff".',
        ];
    }
}
