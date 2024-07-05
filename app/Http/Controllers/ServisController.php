<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Barang;
use App\Models\KategoriService;
use App\Models\Profile;
use App\Models\Servis;
use Illuminate\Http\Request;

class ServisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servis = servis::orderBy('id')->get();
        return view('servis.index', compact('servis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $profile = Profile::Orderby('id')->get();
        $kategoriService = KategoriService::Orderby('id')->get();
        $barang = Barang::Orderby('id')->get();
        return view ('servis.create', compact('profile', 'kategoriService', 'barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_kategori' => 'required',
            'id_profil' => 'required',
            'id_barang' => 'required',
            'jumlah_bayar' => 'required',
            'tanggal_masuk' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        $validatedData['status'] = 'pending';
        Servis::create($validatedData);

        // Arahkan berdasarkan peran pengguna
    if (Auth::user()->role === 'admin') {
        return redirect()->route('servis.index')->with('success', 'Service Berhasil Input');
    } elseif (Auth::user()->role === 'user') {
        return redirect()->route('home')->with('success', 'Reservasi Servis Telah Berhasil');
    }

    // Default redirect jika peran tidak diketahui
    return redirect()->route('home')->with('success', 'Service Berhasil Input');

    }

    public function updateStatus(Request $request, $id)
    {
        $servis = Servis::findOrFail($id);
        $servis->update(['status' => $request->status]);

        return redirect()->route('servis.index')->with('success', 'Status Servis Berhasil Diubah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $servis = servis::findOrfail($id);
        return view('servis.show', compact('servis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(servis $servis, string $id)
    {
        $servis = servis::findOrfail($id);
        $profile = Profile::all();
        $kategoriService = KategoriService::all();
        $barang = Barang::all();

        return view('servis.edit', compact ('servis', 'profile', 'kategoriService', 'barang'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'id_kategori' => 'required',
            'id_profil' => 'required',
            'id_barang' => 'required',
            'jumlah_bayar' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'status' => 'required || in:pending',
        ]);
        $servis = Servis::findOrFail($id);
        $servis->update($validatedData);

        return redirect()->route('servis.index')->with('success', 'Servis Berhasil Di Edit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(servis $servis, string $id)
    {
        $servis = servis::findOrFail($id);
        $servis->delete();
        return redirect()->route('servis.index')->with('success', 'Servis Berhasil Dihapus!');
    }
}
