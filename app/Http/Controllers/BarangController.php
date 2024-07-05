<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::orderBy('id', 'asc')->get();
        return view('barang.index', [
            'barang' => $barang
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_brg'  => 'required',
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'deskripsi' => 'required',
            'stok'      => 'required',
            'harga'     => 'required',
        ]);

        // Upload foto
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->storeAs('public/barang', $image->hashName());

            // Simpan data barang
            Barang::create([
                'nama_brg'  => $validatedData['nama_brg'],
                'image'     => $image->hashName(),
                'deskripsi' => $validatedData['deskripsi'],
                'stok'      => $validatedData['stok'],
                'harga'     => $validatedData['harga'],
            ]);

            return redirect('/barang')->with('success', 'Data berhasil tersimpan');
        }

        return back()->withInput()->withErrors(['image' => 'File gambar tidak valid.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        return view('barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $validatedData = $request->validate([
            'nama_brg'  => 'required',
            'image'     => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'deskripsi' => 'required',
            'stok'      => 'required',
            'harga'     => 'required',
        ]);

        // Update image if new image is uploaded
        if ($request->hasFile('image')) {
            // Delete old image
            Storage::delete('public/barang/' . $barang->image);

            // Upload new image
            $image = $request->file('image');
            $imagePath = $image->storeAs('public/barang', $image->hashName());

            // Update image path
            $barang->image = $image->hashName();
        }

        // Update other fields
        $barang->update([
            'nama_brg'  => $validatedData['nama_brg'],
            'deskripsi' => $validatedData['deskripsi'],
            'stok'      => $validatedData['stok'],
            'harga'     => $validatedData['harga'],
        ]);

        return redirect('/barang')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        // Delete image from storage
        Storage::delete('public/barang/' . $barang->image);

        // Delete barang
        $barang->delete();

        return redirect('/barang')->with('success', 'Data berhasil dihapus');
    }
}
