<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolDoble extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];


    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }

    public function box()
    {
        return $this->belongsTo(Box::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
