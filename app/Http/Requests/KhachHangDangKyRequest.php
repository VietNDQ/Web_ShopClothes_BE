<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhachHangDangKyRequest extends FormRequest
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
            'ho_va_ten'         =>"required|min:4|max:50",
            'email'             =>"required|email|unique:khach_hangs,email",
            'password'          =>"required|min:6|max:30",
            're_password'       =>"required|same:password",
            'so_dien_thoai'     =>"required|digits:10",
            'ngay_sinh'         =>"required|date",
        ];
    }
    public function messages()
    {
        return [
            'ho_va_ten.*'         =>"Họ và tên phải từ 4 đến 50 ký tự",
            'email.unique'        =>"Tài khoản đã tồn tại",
            'email.email'         =>"Email không đúng định dạng",
            'email.required'      =>"Nhập địa chỉ email",
            'password.*'          =>"Nhập mật khẩu từ 6 đến 30 ký tự",
            're_password.*'       =>"Mật khẩu nhập lại không trùng khớp",
            'so_dien_thoai.*'     =>"Số điện thoại phải đủ 10 chữ số.",
            'ngay_sinh.required'  =>"Nhập ngày sinh",
            'ngay_sinh.date'      =>"Ngày sing không đúng định dạng",
        ];
    }
}
