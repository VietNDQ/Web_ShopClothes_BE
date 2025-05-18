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
            'id_quan_huyen'         => 'required',
            'id_phuong_xa'          => 'required',
            'dia_chi'               => 'required',
            'ten_nguoi_nhan'        => 'required',
            'so_dien_thoai'         => 'required',
        ];
    }
    public function messages()
    {
        return [
            'id_quan_huyen.required'      => 'Quận/huyện không được để trống.',
            'id_phuong_xa.required'       => 'Phường/xã không được để trống.',
            'dia_chi.required'            => 'Địa chỉ không được để trống.',
            'ten_nguoi_nhan.required'     => 'Tên người nhận không được để trống.',
            'so_dien_thoai.required'      => 'Số điện thoại không được để trống.',
        ];
    }
}
