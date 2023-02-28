<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $guarded =['id'];

    protected $with = [
        'customers','kasirs'
    ];

    public function customers()
    {
        return $this->belongsTo(Customer::class, 'id_customer', 'id');
    }

    public function kasirs()
    {
        return $this->belongsTo(Kasir::class, 'id_kasir', 'id');
    }
}
