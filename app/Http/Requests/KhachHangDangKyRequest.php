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
            'ho_va_ten'     => 'required|string|min:4|max:50',
            'email'         => 'required|email|unique:khach_hangs,email',
            'password'      => 'required|string|min:6|max:30',
            're_password'   => 'required|string|same:password',
            'so_dien_thoai' => 'required|string|min:10|max:11',
            'ngay_sinh'     => 'required|date|before:today',
        ];
    }
    
    public function messages(): array
    {
        return [
            'ho_va_ten.required'     => 'Họ và tên không được để trống!',
            'ho_va_ten.min'          => 'Họ và tên phải có ít nhất 4 ký tự!',
            'ho_va_ten.max'          => 'Họ và tên không được vượt quá 50 ký tự!',
            'email.required'         => 'Email không được để trống!',
            'email.email'            => 'Email không đúng định dạng!',
            'email.unique'           => 'Email này đã được sử dụng. Vui lòng chọn email khác!',
            'password.required'      => 'Mật khẩu không được để trống!',
            'password.min'           => 'Mật khẩu phải có ít nhất 6 ký tự!',
            'password.max'           => 'Mật khẩu không được vượt quá 30 ký tự!',
            're_password.required'  => 'Vui lòng xác nhận mật khẩu!',
            're_password.same'      => 'Mật khẩu xác nhận không khớp!',
            'so_dien_thoai.required' => 'Số điện thoại không được để trống!',
            'so_dien_thoai.min'      => 'Số điện thoại phải có ít nhất 10 chữ số!',
            'so_dien_thoai.max'      => 'Số điện thoại không được vượt quá 11 chữ số!',
            'ngay_sinh.required'     => 'Ngày sinh không được để trống!',
            'ngay_sinh.date'          => 'Ngày sinh không đúng định dạng!',
            'ngay_sinh.before'       => 'Ngày sinh phải trước ngày hiện tại!',
        ];
    }
}
