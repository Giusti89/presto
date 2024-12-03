<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'monto',
        'interes',
        'plazofinal',
        'cliente_id',
        'estadopago_id'
    ];

    public function cliente()
    {
        return $this->belongsTo(cliente::class);
    }

    public function estadopago()
    {
        return $this->belongsTo(estadoPago::class);
    }

    public function ordenpagos()
    {
        return $this->hasMany(ordenPago::class);
    }
}
