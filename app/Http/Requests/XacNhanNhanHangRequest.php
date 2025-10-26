<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class XacNhanNhanHangRequest extends FormRequest
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
            'id'         => 'required|integer|exists:don_hangs,id',
            'trang_thai' => 'required|in:4,5' // 4: đã nhận hàng, 5: chưa nhận (bị hủy)
        ];
    }

    public function messages(): array
    {
        return [
            'id.required'         => 'ID đơn hàng là bắt buộc.',
            'id.integer'          => 'ID đơn hàng phải là một số nguyên.',
            'id.exists'           => 'Đơn hàng không tồn tại.',
            'trang_thai.required' => 'Trạng thái là bắt buộc.',
            'trang_thai.in'       => 'Trạng thái phải là 4 (đã nhận hàng) hoặc 5 (chưa nhận).',
        ];
    }
}
