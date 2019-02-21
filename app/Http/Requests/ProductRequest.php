<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $id = isset($this->produk) ? $this->produk : '';
        return [
            'nama' => 'required|unique:products,nama,'.$id,
            'supplier_id' => 'required',
            'harga' => 'required',
            'status' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=300,min_height=250,max_width=1400,max_height=1200',
        ];
    }

    public function messages(){
        return [
            'nama.unique'   => 'Nama Barang Sudah Ada',
            'nama.required' => 'Nama Di larang Kosong',
            'harga.required' => 'Harga Di larang Kosong',
            'status.required' => 'Status Di larang Kosong',
            'image.required' => 'Masukan Gambar larang Kosong',
            'image.mimes'    => 'Hanya ekstensi jpg,gif,png,svg yang di dukung',
            'image.max'    => 'Besar Gambar Max 2048kb',
            'image.dimensions' => 'Minimal lebar dan tinggi gambar 300x250 | Maksimal lebar dan tinggi gambar 1400x1200',
        ];
    }
}
