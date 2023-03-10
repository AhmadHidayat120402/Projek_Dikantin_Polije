<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomerApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $customer = Customer::where('id_customer', $id)->get();
        return response($customer);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // membuat fungsi untuk mengambil data customer berdasarkan id_customer
    public function showByIdCustomer(Request $req)
    {
        $id_customer = $req->id_customer;

        // cek kalo ada request id_customer maka dia nampilin berdasarkan id tersebut
        if ($id_customer) {
            $customer = Customer::where('id_customer', $id_customer)->first();
            return [
                'success' => true,
                'data' => $customer
            ];
        } else {
            return ['success' => false];
        }
    }
}
