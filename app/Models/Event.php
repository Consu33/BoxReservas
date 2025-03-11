<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    //un evento puede tener un solo usuario
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

    //1 evento puede tener un box
    public function box(){
        return $this->belongsTo(Box::class);
    }

    
    public function horario(){
        return $this->belongsTo(Horario::class);
    }
}
