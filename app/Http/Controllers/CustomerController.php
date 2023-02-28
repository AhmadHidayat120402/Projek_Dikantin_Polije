<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::all();
        return view('dashboard.customer.index', [
            'title' => 'customer',
            'customer' => $customer
        ]);
    }

    public function search(Request $request)
    {
        $data = Customer::select("id_customer")->where("id_customer","LIKE","{$request->query}%")->get();
        return response()->json($data);
    }
    // public function read()
    // {
    //     $customer = Customer::all();
    //     return view('dashboard.customer.read', [
    //         'title' => 'customer',
    //         'customer' => $customer
    //     ]);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.customer.create', [
            'title' => 'Add Customer'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $data['id_customer'] = $request->id_customer;
        // $data['nama'] = $request->nama;
        // $data['alamat'] = $request->alamat;
        // $data['no_telepon'] = $request->no_telepon;

        // Customer::insert($data);
        Customer::create($request->all());
        return redirect('/customer');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Customer::findOrFail($id);
        return view('dashboard.customer.edit')->with([
            'data' => $data,
            'title' => 'Edit Data'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        $title = "Edit Customer";
        return view('dashboard.customer.edit', compact(['customer', 'title']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Customer::find($id);
        // $data->id_customer = $request->id_customer;
        // $data->nama = $request->nama;
        // $data->alamat = $request->alamat;
        // $data->no_telepon = $request->no_telepon;
        // $data->save();
        $data->update($request->all());
        return redirect('/customer');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect('/customer');
    }
}
