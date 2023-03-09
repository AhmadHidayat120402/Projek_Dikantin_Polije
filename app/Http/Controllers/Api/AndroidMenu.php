<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function api_penjualan(Request $request)
    {
        // Cek apakah parameter ID kantin telah diberikan
        if ($request->has('id_kantin')) {
            // Ambil nilai ID kantin
            $id_kantin = $request->input('id_kantin');

            // Query yang akan dijalankan
            $data = DB::table('penjualans')
                ->leftJoin('customers', 'customers.id', '=', 'penjualans.id_customer')
                ->leftJoin('users', 'users.id', '=', 'penjualans.id_kasir')
                ->leftJoin('detail_penjualans', 'penjualans.id', '=', 'detail_penjualans.id_penjualan')
                ->leftJoin('menus', 'menus.id', '=', 'detail_penjualans.id_menu')
                ->leftJoin('kantins', 'kantins.id', '=', 'menus.id_kantin')
                ->where('detail_penjualans.id_kantin', '=', $id_kantin)
                ->select(
                    'detail_penjualans.id as id_detail',
                    'penjualans.tanggal_penjualan as tanggal',
                    'nomer_penjualan',
                    'customers.nama as pembeli',
                    'customers.no_telepon as no_telepon_pembeli',
                    'users.name as kasir',
                    'model_pembayaran',
                    'no_meja',
                    'kantins.nama_kantin as kantin',
                    'menus.nama_menu as pesanan',
                    'detail_penjualans.harga as harga_satuan',
                    'detail_penjualans.jumlah as jumlah',
                    'detail_penjualans.diskon as diskon',
                    'status'
                )
                ->get();

            // Konversi data menjadi format JSON dan kembalikan
            return response()->json($data);
        } else {
            // Jika parameter ID kantin tidak diberikan, kirimkan pesan kesalahan
            return response()->json(['error' => 'Parameter ID kantin tidak diberikan']);
        }
    }
}
