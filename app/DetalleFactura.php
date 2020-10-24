<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleFactura extends Model
{
    protected $fillable = [
        'id', 'created_at', 'updated_at', 'factura_id', 'producto_id', 'cantidad'
    ];

    protected $table = 'detalle_factura';

    protected $with = [ 'producto' ];

    public function factura() {
        return $this->belongsTo('App\Factura');
    }

    public function producto() {
        return $this->belongsTo('App\Producto');
    }

}
