<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiaChiCreateRequest extends FormRequest
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
            'id_tinh_thanh'         => 'required|integer|exists:tinh_thanhs,id',
            'id_quan_huyen'         => 'required|integer|exists:quan_huyens,id',
            'id_phuong_xa'          => 'required|integer|exists:phuong_xas,id',
            'dia_chi'               => 'required|string|max:255',
            'ten_nguoi_nhan'        => 'required|string|max:100',
            'so_dien_thoai'         => 'required|string|regex:/^[0-9]{10,11}$/',
        ];
    }
    public function messages()
    {
        return [
            'id_tinh_thanh.required'      => 'Tỉnh/thành phố không được để trống.',
            'id_tinh_thanh.exists'        => 'Tỉnh/thành phố không tồn tại.',
            'id_quan_huyen.required'      => 'Quận/huyện không được để trống.',
            'id_quan_huyen.exists'         => 'Quận/huyện không tồn tại.',
            'id_phuong_xa.required'       => 'Phường/xã không được để trống.',
            'id_phuong_xa.exists'          => 'Phường/xã không tồn tại.',
            'dia_chi.required'            => 'Địa chỉ không được để trống.',
            'dia_chi.max'                 => 'Địa chỉ không được vượt quá 255 ký tự.',
            'ten_nguoi_nhan.required'     => 'Tên người nhận không được để trống.',
            'ten_nguoi_nhan.max'           => 'Tên người nhận không được vượt quá 100 ký tự.',
            'so_dien_thoai.required'      => 'Số điện thoại không được để trống.',
            'so_dien_thoai.regex'         => 'Số điện thoại không đúng định dạng (10-11 chữ số).',
        ];
    }
}
