<?php

namespace App\Http\Controllers;

use App\Models\RumahSakit;
use Illuminate\Http\Request;

class RumahSakitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rumahSakit = RumahSakit::all();
        return view('rumah-sakit.index', compact('rumahSakit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rumah-sakit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_rumah_sakit' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'required|string|max:15',
        ]);

        RumahSakit::create($request->all());
        return redirect()->route('rumah-sakit.index')->with('success', 'Rumah Sakit berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(RumahSakit $rumahSakit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RumahSakit $rumahSakit)
    {
        return view('rumah-sakit.edit', compact('rumahSakit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RumahSakit $rumahSakit)
    {
        $request->validate([
            'nama_rumah_sakit' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'required|string|max:15',
        ]);

        $rumahSakit->update($request->all());
        return redirect()->route('rumah-sakit.index')->with('success', 'Rumah Sakit berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RumahSakit $rumahSakit)
    {
        $rumahSakit->delete();
        return response()->json(['success' => true, 'message' => 'Data rumah sakit berhasil dihapus']);
    }
}
