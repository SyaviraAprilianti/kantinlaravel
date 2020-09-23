<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    protected $table ="menu";
    protected $primaryKey = 'id_menu';
   
    protected $fillable = ['nama_menu','harga','stok_menu','deskripsi','gambar_menu'];
}
