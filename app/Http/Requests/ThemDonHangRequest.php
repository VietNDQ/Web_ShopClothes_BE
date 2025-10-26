<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemDonHangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Có thể thay bằng Auth::check() nếu muốn kiểm tra thêm
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id_san_pham'  => 'required|exists:san_phams,id',
            'so_luong'     => 'required|integer|min:1',
            'kich_thuoc'   => 'required|string',
            'mau_sac'      => 'required|string',
            'ghi_chu'      => 'nullable|string|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'id_san_pham.required' => 'Vui lòng chọn sản phẩm',
            'id_san_pham.exists'   => 'Sản phẩm không tồn tại',
            'so_luong.required'    => 'Vui lòng nhập số lượng',
            'so_luong.integer'     => 'Số lượng phải là số nguyên',
            'so_luong.min'         => 'Số lượng phải lớn hơn hoặc bằng 1',
            'kich_thuoc.required'  => 'Vui lòng chọn kích thước',
            'mau_sac.required'     => 'Vui lòng chọn màu sắc',
            'ghi_chu.string'       => 'Ghi chú phải là chuỗi',
            'ghi_chu.max'          => 'Ghi chú không được vượt quá 255 ký tự',
        ];
    }
}
