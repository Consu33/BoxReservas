<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = ['fecha_inicio', 'hora_inicio', 'hora_fin', 'doctor_id', 'box_id', 'title', 'start', 'end', 'color', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

    public function box(){
        return $this->belongsTo(Box::class);
    }
}
