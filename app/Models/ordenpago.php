<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ordenpago extends Model
{
    use HasFactory;
    protected $fillable = ['total', 'cuenta', 'saldo', 'estado', 'loan_id', 'user_id'];

    public function loan()
    {
        return $this->belongsTo(loan::class);
    }

    public function pagos()
    {
        return $this->hasMany(pago::class);
    }
}
