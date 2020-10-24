<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $fillable = [
        'id', 'created_at', 'updated_at'
    ];

    protected $table = 'factura';

    protected $with = ['detalle'];

    public function detalle(){
        return $this->hasMany('App\DetalleFactura');
    }


}
