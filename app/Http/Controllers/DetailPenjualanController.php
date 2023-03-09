<?php

namespace App\Http\Controllers;

use App\Models\detail_penjualan;
use App\Models\Menu;
use Illuminate\Http\Request;

class DetailPenjualanController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function get_all_order()
    {
        $data = detail_penjualan::all();
        return view('dashboard.order.waiting', compact('data'));
    }

    // public function get_pusher()
    // {

    //     $options = array(
    //         'cluster' => 'ap1',
    //         'useTLS' => true
    //     );

    //     $pusher = new Pusher\Pusher(
    //         '635466c2765ece12d468',
    //         '4029aa215ead14872575',
    //         '1563594',
    //         $options
    //     );

    //     $data['message'] = 'pesanan akan dari makanan';
    //     $pusher->trigger('Dikantin', 'ID-12345', $data);
    // }

    public function get_all($id)
    {
        $penjualans = detail_penjualan::where('id_penjualan', $id)->get();
        // $penjualans = detail_penjualan::join('penjualans', 'detail_penjualans.id_penjualan', '=', 'detail_penjualans.id_penjualan')
        // ->get(['penjualans.*', 'detail_penjualans', $id]);

        return response($penjualans);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();
        $menu = Menu::findOrFail($request->id_menu);
        $data['id_penjualan'] = $request->id_penjualan;
        $data['tanggal_penjualan'] = date("Y-m-d");
        $data['harga'] = $menu->harga;
        $data['diskon'] = 0;

        // CEK KEBRADAAN MENU DI DETAIL DPENJUALAN
        $available_menu = detail_penjualan::where('id_penjualan', $request->id_penjualan)->where('id_menu', $request->id_menu);
        if ($available_menu->count() != null) {
            $data['jumlah'] = $available_menu->first()->jumlah + 1;
            detail_penjualan::where('id_menu', $request->id_menu)->update($data);
        } else {
            $data['jumlah'] = 1;
            detail_penjualan::create($data);
        }
        return response()->json(['id_penjualan' => $request->id_penjualan]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\detail_penjualan  $detail_penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(detail_penjualan $detail_penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\detail_penjualan  $detail_penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(detail_penjualan $detail_penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\detail_penjualan  $detail_penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, detail_penjualan $detail_penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\detail_penjualan  $detail_penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(detail_penjualan $detail_penjualan)
    {
        //
    }
}
