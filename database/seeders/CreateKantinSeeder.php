<?php

namespace Database\Seeders;

use App\Models\Kantin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateKantinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kantin::insert([
            'nama_kantin' => 'Kantin1',
            'status_aktif' => 'aktif'
        ]
        ,[
            'nama_kantin' => 'Kantin2',
            'status_aktif' => 'aktif'
        ]
        ,[
            'nama_kantin' => 'Kantin3',
            'status_aktif' => 'aktif'
        ]
        ,[
            'nama_kantin' => 'Kantin4',
            'status_aktif' => 'aktif'
        ]
        ,[
            'nama_kantin' => 'Kantin5',
            'status_aktif' => 'aktif'
        ]
        ,[
            'nama_kantin' => 'Kantin6',
            'status_aktif' => 'aktif'
        ]
        ,[
            'nama_kantin' => 'Kantin7',
            'status_aktif' => 'aktif'
        ]
        ,[
            'nama_kantin' => 'Kantin8',
            'status_aktif' => 'aktif'
        ]
        ,[
            'nama_kantin' => 'Kantin9',
            'status_aktif' => 'aktif'
        ]
    );
    }
}
