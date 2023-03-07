<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_penjualan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $with = [
        'menus', 'kantins'
    ];

    public function kantins()
    {
        return $this->belongsTo(Kantin::class, 'id_kantin', 'id');
    }

    public function menus()
    {
        return $this->belongsTo(Menu::class, 'id_menu');
    }
}
