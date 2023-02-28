<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class RegisterAppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.index', [
            'title' => 'Register',
        ]);
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
        // mengembalikan nilai dalam bentuk json
        $datauser = $request->all();
        // $validatedData = $request->validate([
        //     'name' => ['required', 'max:255'],
        //     'username' => ['required', 'min:3', 'max:255', 'unique:users'],
        //     'email' => ['required', 'email:dns', 'unique:users'],
        //     'password' => ['required', 'min:5', 'max:255'],
        //     'type' => ['required', 'max:100', 'integer'],
        //     'id_kantin' => ['max:100', 'integer'],
        // ]);

        // dd($validatedData);

        // $validatedData['password'] = hash::make($validatedData['password']);

        User::create($datauser);

        // $request->session()->flash('success', 'Registration successful Please Login!');

        return redirect('/home');
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
}
