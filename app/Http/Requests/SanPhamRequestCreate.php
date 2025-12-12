<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamRequestCreate extends FormRequest
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
            'ten_san_pham'  => 'required|string|min:2|max:255',
            'id_danh_muc'   => 'required|integer|exists:danh_mucs,id',
            'gia_co_ban'    => 'nullable|numeric|min:0',
            'tinh_trang'    => 'required|integer|in:0,1',
            'mo_ta'         => 'nullable|string',
            'bien_the'      => 'required|json',
            'hinh_anh'      => 'nullable|array',
            'hinh_anh.*'    => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    /**
     * Get the validation messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            // Tên sản phẩm
            'ten_san_pham.required' => 'Vui lòng nhập tên sản phẩm',
            'ten_san_pham.string'   => 'Tên sản phẩm phải là chuỗi ký tự',
            'ten_san_pham.min'      => 'Tên sản phẩm phải có ít nhất 2 ký tự',
            'ten_san_pham.max'      => 'Tên sản phẩm không được vượt quá 255 ký tự',

            // Danh mục
            'id_danh_muc.required' => 'Vui lòng chọn danh mục',
            'id_danh_muc.integer'  => 'Danh mục phải là số nguyên',
            'id_danh_muc.exists'   => 'Danh mục không tồn tại trong hệ thống',

            // Giá cơ bản
            'gia_co_ban.numeric' => 'Giá cơ bản phải là số',
            'gia_co_ban.min'     => 'Giá cơ bản phải lớn hơn hoặc bằng 0',

            // Tình trạng
            'tinh_trang.required' => 'Vui lòng chọn tình trạng sản phẩm',
            'tinh_trang.integer'  => 'Tình trạng phải là số nguyên',
            'tinh_trang.in'       => 'Tình trạng không hợp lệ (0 = Cũ, 1 = Mới)',

            // Mô tả
            'mo_ta.string' => 'Mô tả phải là chuỗi ký tự',

            // Biến thể
            'bien_the.required' => 'Vui lòng thêm ít nhất một biến thể sản phẩm',
            'bien_the.json'     => 'Biến thể phải là định dạng JSON hợp lệ',

            // Hình ảnh
            'hinh_anh.array'        => 'Hình ảnh phải là mảng',
            'hinh_anh.*.image'      => 'File phải là hình ảnh',
            'hinh_anh.*.mimes'      => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif',
            'hinh_anh.*.max'        => 'Mỗi hình ảnh không được vượt quá 2MB',
        ];
    }
}
