<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class allOrderController extends Controller
{
    public function allOrderPembeli()
    {

        // $results = DB::table('penjualans')
        //     ->leftJoin('orders', 'users.id', '=', 'orders.user_id')
        //     ->select('users.name', 'orders.order_date')
        //     ->get();

        // $data = Penjualan::all();

        // foreach ($data as $key => $item) {
        //     $builder = new Detail_penjualan();

        //     $builder = $builder->where('id_penjualan', $item->id);

        //     if ($req->id_kantin) {
        //         $builder = $builder->where('id_kantin', $req->id_kantin);
        //     }

        //     if ($req->status) {
        //         $builder = $builder->where('status', $req->status);
        //     }

        //     $details = $builder->get();

        //     $data[$key]->details = $details;
        // }
        // dd($data);

        $data = DB::table('penjualans')
            ->leftJoin('customers', 'penjualans.id_customer', '=', 'customers.id')
            ->leftJoin('users', 'penjualans.id_kasir', '=', 'users.id')
            ->leftJoin('detail_penjualans', 'penjualans.id', '=', 'detail_penjualans.id_penjualan')
            ->leftJoin('menus', 'menus.id', '=', 'detail_penjualans.id_menu')
            ->leftJoin('kantins', 'kantins.id', '=', 'menus.id_kantin')
            ->where('kantins.id', '1')
            ->get();

        return view(
            'dashboard.order.waiting',
            [
                'title' => 'waiting list',
                'data' => $data
            ]
        );
        // dd($data);
        return view('dashboard.order.waiting_detail', [
            'title' => 'waiting list',
            'data' => $data
        ]);

        // return response()->json($data);
        // return Penjualan::join('customers', 'customers.id', '=', 'penjualans.id_customer')
        // ->join('users', 'penjualans.id_kasir', '=', 'users.id')
        // ->join('detail_penjualans', 'penjualans.id', '=', 'detail_penjualans.id_penjualans')
        // ->join('menus', 'menus.id', '=', 'detail_penjualans.id_menu')
        // ->join('kantins', 'kantins.id', '=', 'menus.id_kantin')
        // ->where('users.type', '2')
        // ->get();
    }
}
