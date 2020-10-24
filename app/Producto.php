<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'id', 'created_at', 'updated_at', 'descripcion', 'precio'
    ];

    protected $table = 'producto';

    //protected $with = ['detalle' ];

    //public function detalle() {
     //   return $this->hasMany('App\DetalleFactura');
    //}

    
}
