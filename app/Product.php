<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['nama', 'supplier_id', 'harga', 'status', 'image'];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function getStatusAttribute(){
        if($this->status = '1'){
            $status = '<span class="badge badge-info text-light">Aktif</span>';
        }else{
            $status = '<span class="badge badge-danger text-light">Tidak Aktif</span>';
        }
        return $status;
    }

    public function setHargaAttribute($value)
    {
        $this->attributes['harga'] = str_replace(".","",$value);
    }

    public function getImageProductAttribute()
    {
        if ($this->image !== NULL)
        {
            return url('/image/products/' . $this->image);
        } else {
            return url('/image/unggah.jpg');
        }
    }
}
