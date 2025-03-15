<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThươngHieuRequestCreate extends FormRequest
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
            'ten_thuong_hieu'      =>'required',
            'mo_ta'             =>'required',
        ];
    }
    public function messages()
    {
        return [
            'ten_thuong_hieu'      =>'Tên thương hiệu không được để trống',
            'mo_ta'             =>'Mô tả không được để trống',
        ];
    }
}
