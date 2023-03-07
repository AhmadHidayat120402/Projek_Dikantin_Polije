<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function pusher()
    {
        return view('pusher');

    }

    public function index()
    {
        $menu = Menu::all();
        return view('dashboard.menu.index', [
            'menu' => $menu,
            'title' => 'Menu'
        ]);
        return response()->json(['message' => 'success', 'menu' => $menu]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.menu.create', [
            'title' => 'Add Menu'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // $file_name = $request->foto->getClientOriginalName();
        $data['foto'] = $request->file('foto')->store('menu', 'public');
        Menu::create($data);
        return redirect('/menu');
        // $request->validate([
        //     'foto' => 'required|image|mimes:png,jpg,gif,svg|max:2048',
        // ]);
        // $imageName = time() . '.' . $request->foto->extension();
        // $foto = $request->foto->storeAs('images', $imageName);
        // Menu::create($foto);
        // return redirect('/menu');
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);
        return view('dashboard.menu.edit', [
            'title' => 'Edit Menu',
            'menu' => $menu
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        if (!empty($data['foto'])) {
            $data['foto'] = $request->file('foto')->store('menu', 'public');
        } else {
            unset($data['foto']);
        }

        Menu::findOrFail($id)->update($data);
        return redirect('/menu');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        Storage::delete($menu);
        $menu->delete();
        return redirect()->back();
    }
}
