<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Penjualan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $with = [
        'customers', 'kasirs', 'kantins','details'
    ];

    public function customers()
    {
        return $this->belongsTo(Customer::class, 'id_customer', 'id');
    }
    public function kantins()
    {
        return $this->belongsTo(Kantin::class, 'id_kantin', 'id');
    }

    public function kasirs()
    {
        return $this->belongsTo(User::class, 'id_kasir', 'id');
    }

    public function details()
    {
        return $this->hasMany(Detail_penjualan::class, 'id_penjualan');
    }
}
