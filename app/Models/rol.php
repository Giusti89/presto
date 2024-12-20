<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rol extends Model
{
    use HasFactory;
    
    protected $fillable = ['categoria'];

    public function users()
    {
        return $this->hasMany(user::class);
    }
}
