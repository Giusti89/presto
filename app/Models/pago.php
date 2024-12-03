<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pago extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha',
        'pago',
        'ordenpago_id'
    ];

    public function ordenpago()
    {
        return $this->belongsTo(ordenPago::class);
    }
}
