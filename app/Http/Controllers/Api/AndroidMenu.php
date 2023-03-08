<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class AndroidMenu extends Controller
{
    public function apimenu(Request $request)
    {
        // Validasi input dari pengguna
        $validatedData = $request->validate([
            'id_kantin' => 'required|integer'
        ]);

        // Ambil data menu dari database berdasarkan id_kantin yang diterima dari pengguna
        $menu = Menu::where('id_kantin', $validatedData['id_kantin'])->get();

        // Kirimkan data menu dalam format JSON sebagai respons
        return response()->json(
            $menu,
            // 'message' => 'Berhasil menampilkan data menu berdasarkan id_kantin'
        );
    }
}
