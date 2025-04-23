<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellido', 'rut', 'profesion', 'user_id'];

    public function box()
    {
        return $this->belongsTo(Box::class);
    }

    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //1 doctor puede tener muchos eventos.- 
    public function events()
    {
        return $this->hasMany(Event::class);
    }


}
