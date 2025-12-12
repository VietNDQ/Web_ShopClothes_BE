<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DanhMucRequestCreate extends FormRequest
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
            'ten_danh_muc' => 'required|string|max:255',
            'tinh_trang'   => 'nullable|integer|in:0,1',
        ];
    }

    public function messages(): array
    {
        return [
            'ten_danh_muc.required' => 'Tên danh mục không được để trống',
            'ten_danh_muc.string'   => 'Tên danh mục phải là chuỗi ký tự',
            'ten_danh_muc.max'      => 'Tên danh mục không được vượt quá 255 ký tự',
            'tinh_trang.integer'    => 'Tình trạng phải là số nguyên',
            'tinh_trang.in'         => 'Tình trạng không hợp lệ (0 = Không hoạt động, 1 = Hoạt động)',
        ];
    }
}
