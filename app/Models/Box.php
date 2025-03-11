<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Box extends Model
{
    use HasFactory;

    protected $fillable = ['numero', 'recinto', 'especialidades', 'piso', 'torre'];

    public function doctores(){
        return $this->hasMany(Doctor::class);
    }

    public function horarios(){
        return $this->hasMany(Horario::class);
    }

    //1 box puede tener varios eventos.
    public function events(){
        return $this->hasMany(Event::class);
    }

}
