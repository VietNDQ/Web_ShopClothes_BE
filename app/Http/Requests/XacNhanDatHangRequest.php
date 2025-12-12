<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class XacNhanDatHangRequest extends FormRequest
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
            'id_dia_chi_giao_hang' => 'required|exists:dia_chis,id',
            'phuong_thuc_thanh_toan' => 'required|in:0,1',
            'chi_tiet_don_hang' => 'required|array|min:1',
            'chi_tiet_don_hang.*.id_san_pham' => 'required|exists:san_phams,id',
            'chi_tiet_don_hang.*.so_luong' => 'required|integer|min:1',
            'chi_tiet_don_hang.*.don_gia' => 'required|numeric|min:0',
            'chi_tiet_don_hang.*.mau_sac' => 'nullable|string|max:50',
            'chi_tiet_don_hang.*.kich_thuoc' => 'nullable|string|max:50',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'id_dia_chi_giao_hang.required' => 'Vui lòng chọn địa chỉ giao hàng',
            'id_dia_chi_giao_hang.exists' => 'Địa chỉ giao hàng không hợp lệ',
            'phuong_thuc_thanh_toan.required' => 'Vui lòng chọn phương thức thanh toán',
            'phuong_thuc_thanh_toan.in' => 'Phương thức thanh toán không hợp lệ',
            'chi_tiet_don_hang.required' => 'Giỏ hàng trống, vui lòng thêm sản phẩm',
            'chi_tiet_don_hang.array' => 'Chi tiết đơn hàng phải là một mảng',
            'chi_tiet_don_hang.min' => 'Giỏ hàng phải có ít nhất một sản phẩm',
            'chi_tiet_don_hang.*.id_san_pham.required' => 'ID sản phẩm không được để trống',
            'chi_tiet_don_hang.*.id_san_pham.exists' => 'Sản phẩm không tồn tại',
            'chi_tiet_don_hang.*.so_luong.required' => 'Số lượng sản phẩm không được để trống',
            'chi_tiet_don_hang.*.so_luong.integer' => 'Số lượng sản phẩm phải là số nguyên',
            'chi_tiet_don_hang.*.so_luong.min' => 'Số lượng sản phẩm phải lớn hơn 0',
            'chi_tiet_don_hang.*.don_gia.required' => 'Đơn giá không được để trống',
            'chi_tiet_don_hang.*.don_gia.numeric' => 'Đơn giá phải là số',
            'chi_tiet_don_hang.*.don_gia.min' => 'Đơn giá không được nhỏ hơn 0',
            'chi_tiet_don_hang.*.mau_sac.string' => 'Màu sắc phải là chuỗi ký tự',
            'chi_tiet_don_hang.*.mau_sac.max' => 'Màu sắc không được vượt quá 50 ký tự',
            'chi_tiet_don_hang.*.kich_thuoc.string' => 'Kích thước phải là chuỗi ký tự',
            'chi_tiet_don_hang.*.kich_thuoc.max' => 'Kích thước không được vượt quá 50 ký tự',
        ];
    }
}
