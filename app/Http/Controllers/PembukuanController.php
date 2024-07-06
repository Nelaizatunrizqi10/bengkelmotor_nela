<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Servis;
use App\Models\Akun;
use App\Models\Pembukuan;
use Illuminate\Http\Request;

class PembukuanController extends Controller
{
    public function index()
    {
        $akun = Akun::Orderby('id')->get();
        $servis = Servis::Orderby('id')->get();
        $pembukuan = Pembukuan::orderBy('id')->get();
        return view('pembukuan.index', compact('akun', 'servis', 'pembukuan'));
    }
    public function create()
    {
        $servis = Servis::Orderby('id')->get();
        $akun = Akun::Orderby('id')->get();
        return view ('pembukuan.create', compact('servis', 'akun'));
    }
    public function store(Request $request)
    {
        // dd($request->all()); // Debug request data
        $validatedData = $request->validate([
            'id_servis' => 'required|exists:servis,id',
            'id_akuns' => 'required|exists:akuns,id',
            'saldo' => 'required',
        ]);
        Pembukuan::create($validatedData);
        return redirect()->route('laporan.index')->with('success', 'Data Berhasil Input');
    }

    public function show(string $id)
    {
        $pembukuan = Pembukuan::findOrFail($id);
        return view('pembukuan.show', compact('pembukuan'));
    }

    public function edit(servis $servis, string $id)
    {
        $pembukuan = Pembukuan::findOrFail($id);
        $akun = Akun::Orderby('id')->get();
        $servis = Servis::Orderby('id')->get();
        return view('pembukuan.edit', compact('pembukuan', 'akun', 'servis'));
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'id_servis' => 'required|exists:servis,id',
            'id_akuns' => 'required|exists:akuns,id',
            'saldo' => 'required|numeric',
        ]);

        $pembukuan = Pembukuan::findOrFail($id);
        $pembukuan->update($validatedData);

        return redirect()->route('pembukuan.index')->with('success', 'Data Berhasil Di Edit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(servis $servis, string $id)
    {
        $pembukuan = Pembukuan::findOrFail($id);
        $pembukuan->delete();
        return redirect()->route('/laporan')->with('success', 'Data Berhasil Dihapus!');
    }
}
