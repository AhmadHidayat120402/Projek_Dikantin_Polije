<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\User;
use App\Models\Detail_penjualan;
use App\Models\Menu;
use App\Models\Kantin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;


class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allData(Request $req)
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


        // return  DB::table('penjualans')
        //     ->leftJoin('customers', 'penjualans.id_customer', '=', 'customers.id')
        //     ->leftJoin('users', 'penjualans.id_kasir', '=', 'users.id')
        //     ->leftJoin('detail_penjualans', 'penjualans.id', '=', 'detail_penjualans.id_penjualan')
        //     ->leftJoin('menus', 'menus.id', '=', 'detail_penjualans.id_menu')
        //     ->leftJoin('kantins', 'kantins.id', '=', 'menus.id_kantin')
        //     ->where('kantins.id', '1')
        //     ->get();
        // dd($data);
        // return view('dashboard.order.waiting', [
        //     'title' => 'waiting list',
        //     'data' => $data
        // ]);

        // return response()->json($data);
        // return Penjualan::join('customers', 'customers.id', '=', 'penjualans.id_customer')
        // ->join('users', 'penjualans.id_kasir', '=', 'users.id')
        // ->join('detail_penjualans', 'penjualans.id', '=', 'detail_penjualans.id_penjualans')
        // ->join('menus', 'menus.id', '=', 'detail_penjualans.id_menu')
        // ->join('kantins', 'kantins.id', '=', 'menus.id_kantin')
        // ->where('users.type', '2')
        // ->get();
    }
    public function allDataa(Request $req)
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
        // return view('dashboard.order.waiting', [
        //     'title' => 'waiting list',
        //     'data' => $data
        // ]);

        // return response()->json($data);
        // return Penjualan::join('customers', 'customers.id', '=', 'penjualans.id_customer')
        // ->join('users', 'penjualans.id_kasir', '=', 'users.id')
        // ->join('detail_penjualans', 'penjualans.id', '=', 'detail_penjualans.id_penjualans')
        // ->join('menus', 'menus.id', '=', 'detail_penjualans.id_menu')
        // ->join('kantins', 'kantins.id', '=', 'menus.id_kantin')
        // ->where('users.type', '2')
        // ->get();
    }

    public function index()
    {

        $penjualan = Penjualan::all();
        return view('dashboard.penjualan.index', [
            'title' => 'penjualan',
            'penjualan' => $penjualan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function tambahJumlah(Request $request)
    {
        $detail = detail_penjualan::find($request->id);

        $jumlah = $detail->jumlah + 1;

        $harga = $detail->menus->harga * $jumlah;

        $data['jumlah'] = $jumlah;
        $data['harga'] = $harga;

        $detail->update($data);

        return response(true);
    }
    public function kurangJumlah(Request $request)
    {
        $detail = detail_penjualan::find($request->id);

        $jumlah = $detail->jumlah - 1;

        $harga = $detail->menus->harga * $jumlah;

        $data['jumlah'] = $jumlah;
        $data['harga'] = $harga;

        $detail->update($data);

        return response(true);
    }

    public function hapusItem(Request $request)
    {
        $detail = detail_penjualan::find($request->id)->delete();
        return response(true);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ini udah dibuat dari kode yang kemarin kan? ya tinggal ubah aja wis
        // kayane wis bener, tinggal buat request ajaxnya ke route yang dideifinisikan
        $data['id_customer'] = $request->id_customer;
        $data['id_kasir'] = $request->id_kasir;
        $data['nomer_penjualan'] = Penjualan::count() + 1;
        $data['subtotal'] = $request->subtotal;
        $data['diskon'] = $request->diskon;
        $data['total'] = $request->total;
        $data['bayar'] = $request->bayar;;
        $data['model_pembayaran'] = $request->model_pembayaran;
        $data['kembalian'] = 0;
        $data['no_meja'] = $request->no_meja;
        $data['tanggal_penjualan'] = date("Y-m-d");

        $details = $request->details;

        $penjualanId = Penjualan::insertGetId($data);

        $detailsWithPenjualanId = collect($details)->map(function ($detail) use ($penjualanId) {
            $id_menu = $detail['id_menu'];
            $menu = Menu::where('id', $id_menu)->first();
            $detail['id_penjualan'] = $penjualanId;
            $detail['id_kantin'] = $menu->id_kantin;
            $detail['tanggal_penjualan'] = date("Y-m-d");
            return $detail;
        })->toArray();

        detail_penjualan::insert($detailsWithPenjualanId);
        // $penjualan = Penjualan::orderBy('id', 'desc')->first();
        // $options = array(
        //     'cluster' => 'ap1',
        //     'useTLS' => true
        // );

        // $pusher = new Pusher\Pusher(
        //     '635466c2765ece12d468',
        //     '4029aa215ead14872575',
        //     '1563594',
        //     $options
        // );

        // $data['message'] = 'uji';
        // $pusher->trigger('Dikantin', 'ID-12345', $data);

        return response()->json(['status' => true, 'message' => 'Transaksi selesai.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjualan $penjualan)
    {
        //
    }
}
