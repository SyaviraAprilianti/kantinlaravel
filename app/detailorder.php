<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailorder extends Model
{
    protected $table = 'detail_orders';
    protected $primaryKey = 'id_detail';

    public function food()
    {
        return $this->hasOne('App\menu', 'id_menu', 'id_menu');
    }

    public function trasaction()
    {
        return $this->belongsTo('App\Transaksi');
    }
}
