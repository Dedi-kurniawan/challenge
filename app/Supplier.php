<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['nama', 'email', 'kota', 'tahun_kelahiran'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function getUmurSupplierAttribute(){
        $sekarang = date('Y');
        return $sekarang-$this->tahun_kelahiran;
    }
}
