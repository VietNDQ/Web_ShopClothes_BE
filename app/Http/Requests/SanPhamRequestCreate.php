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
            'id_thuong_hieu'        => 'required|exists:thuong_hieus,id',
            'id_danh_muc'           => 'required|exists:danh_mucs,id',
            'ten_san_pham'          => 'required|min:2|max:255',
            'slug_san_pham'         => 'required|min:2|max:255',
            'gia_ban'               => 'required|numeric',
            'so_luong_ton'          => 'required|numeric',
            'hinh_anh'              => 'required',
            'mo_ta'                 => 'required',
            'tinh_trang'            => 'required|boolean',
        ];
    }
    public function messages()
    {
        return [
            'id_thuong_hieu.required' => 'Vui lòng chọn thương hiệu',
            'id_thuong_hieu.exists'   => 'Thương hiệu không tồn tại',
            'id_danh_muc.required'    => 'Vui lòng chọn danh mục',
            'id_danh_muc.exists'      => 'Danh mục không tồn tại',
            'ten_san_pham.required'   => 'Vui lòng nhập tên sản phẩm',
            'ten_san_pham.min'        => 'Tên sản phẩm phải có ít nhất 2 ký tự',
            'ten_san_pham.max'        => 'Tên sản phẩm không được vượt quá 255 ký tự',
            'slug_san_pham.required'  => 'Vui lòng nhập slug sản phẩm',
            'slug_san_pham.min'       => 'Slug sản phẩm phải có ít nhất 2 ký tự',
            'slug_san_pham.max'       => 'Slug sản phẩm không được vượt quá 255 ký tự',
            'gia_ban.required'        => 'Vui lòng nhập giá bán sản phẩm',
            'gia_ban.numeric'         => 'Giá bán sản phẩm phải là số',
            'so_luong_ton.required'   => 'Vui lòng nhập số lượng tồn sản phẩm',
            'so_luong_ton.numeric'    => 'Số lượng tồn sản phẩm phải là số',
            'hinh_anh.required'       => 'Vui lòng nhập hình ảnh sản phẩm',
            'mo_ta.required'          => 'Vui lòng nhập mô tả sản phẩm',
            'tinh_trang.required'     => 'Vui lòng chọn tình trạng sản phẩm',
            'tinh_trang.boolean'      => 'Tình trạng sản phẩm không hợp lệ',
        ];
    }
}
