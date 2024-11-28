<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estadopago extends Model
{
    use HasFactory;
    
    protected $fillable = ['nombre'];

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
