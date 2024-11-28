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
        return $this->belongsTo(Cliente::class);
    }

    public function estadopago()
    {
        return $this->belongsTo(EstadoPago::class);
    }

    public function ordenpagos()
    {
        return $this->hasMany(OrdenPago::class);
    }
}
