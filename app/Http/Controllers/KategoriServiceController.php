<?php

namespace App\Http\Controllers;

use App\Models\KategoriService;
use Illuminate\Http\Request;

class KategoriServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoriServices = KategoriService::orderBy('id', 'asc')->get();
        return view('kategori.index', compact('kategoriServices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required',
            'deskripsi' => 'required',
            'biaya' => 'required',
        ]);
        KategoriService::create($validatedData);
        return redirect()->route('kategori.index')->with('success', 'Data Berhasil Input');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $kategoriService = KategoriService::findOrFail($id);
    return view('kategori.show', compact('kategoriService'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // dd($kategoriService);
        $kategoriService = KategoriService::findOrFail($id);
        return view('kategori.edit', compact('kategoriService'));
        ['kategoriService' => $kategoriService];

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required',
            'deskripsi' => 'required',
            'biaya' => 'required',
        ]);
        $kategoriService = KategoriService::findOrFail($id);
        $kategoriService->update($validatedData);

        return redirect()->route('kategori.index')->with('success', 'Data Berhasil Di Edit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategoriService = KategoriService::findOrFail($id);
        $kategoriService->delete();
        return redirect()->route('kategori.index')->with('success', 'Data Berhasil Dihapus!');
    }
}
