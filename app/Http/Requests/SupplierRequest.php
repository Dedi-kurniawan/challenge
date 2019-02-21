<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = isset($this->supplier) ? $this->supplier : '';
        return [
            'nama' => 'required',
            'email' => 'required|unique:suppliers,email,'.$id,
            'kota' => 'required',
            'tahun_kelahiran' => 'required',
        ];
    }

    public function messages(){
        return [
            'email.unique'   => 'Email Sudah Terdaftar',
            'email.required' => 'Email Di larang Kosong',
            'nama.required' => 'Nama Di larang Kosong',
            'kota.required' => 'Kota Di larang Kosong',
            'tahun_kelahiran' => 'Status Di larang Kosong',
        ];
    }
}
