<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'ci',
        'contacto',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(user::class, 'user_id');
    }

    public function loans()
    {
        return $this->hasMany(loan::class);
    }
}
