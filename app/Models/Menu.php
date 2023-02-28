<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $with = [
        'kantins'
    ];

    public function kantins(){
        return $this->belongsTo(Kantin::class, 'id_kantin', 'id');
    }
}
