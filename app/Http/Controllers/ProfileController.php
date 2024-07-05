<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Profile::orderBy('id')->get();
        return view('profile.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::orderBy('id', 'asc')->get();
        return view('profile.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_user' => 'required',
            'no_plat' => 'required',
            'merek' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'alamat' => 'required',
            'hp' => 'required',
        ]);

        // Upload foto
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->storeAs('public/profile', $image->hashName());

            // Simpan data profile
            Profile::create([
                'id_user' => $validatedData['id_user'],
                'no_plat' => $validatedData['no_plat'],
                'merek' => $validatedData['merek'],
                'image' => $image->hashName(),
                'alamat' => $validatedData['alamat'],
                'hp' => $validatedData['hp'],
            ]);

            if (Auth::user()->role === 'admin') {
                return redirect()->route('profile.index')->with('success', 'Profil Berhasil Input');
            } elseif (Auth::user()->role === 'user') {
                return redirect()->route('home')->with('success', 'Service Berhasil Input');
            }
        }

        // Jika file gambar tidak valid
        return back()->withInput()->withErrors(['image' => 'File gambar tidak valid.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $profile = Profile::findOrfail($id);
        return view('profile.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $profile = Profile::findOrfail($id);
        $users = User::all();
        return view('profile.edit', compact('profile', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        $validatedData = $request->validate([
            'id_user'  => 'required',
            'no_plat' => 'required',
            'merek'      => 'required',
            'image'     => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'alamat'     => 'required',
            'hp'     => 'required',
        ]);

        // Update image if new image is uploaded
        if ($request->hasFile('image')) {
            // Delete old image
            Storage::delete('public/profile/' . $profile->image);

            // Upload new image
            $image = $request->file('image');
            $imagePath = $image->storeAs('public/profile', $image->hashName());

            // Update image path
            $profile->image = $image->hashName();
        }

        // Update other fields
        $profile->update([
            'id_user'  => $validatedData['id_user'],
            'no_plat' => $validatedData['no_plat'],
            'merek'      => $validatedData['merek'],
            'alamat'     => $validatedData['alamat'],
            'hp'     => $validatedData['hp'],
        ]);

        // Simpan data profile
        Profile::create([
            'id_user' => $validatedData['id_user'],
            'no_plat' => $validatedData['no_plat'],
            'merek' => $validatedData['merek'],
            'image' => $image->hashName(),
            'alamat' => $validatedData['alamat'],
            'hp' => $validatedData['hp'],
        ]);

        if (Auth::user()->role === 'admin') {
            return redirect()->route('profile.index')->with('success', 'Profil Berhasil Input');
        } elseif (Auth::user()->role === 'user') {
            return redirect()->route('home')->with('success', 'Service Berhasil Input');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        // Hapus gambar profil dari storage
    if ($profile->image) {
        Storage::delete('public/profile/' . $profile->image);
    }

    // Hapus data profil dari database
    $profile->delete();

    // Redirect kembali ke halaman indeks profil dengan pesan sukses
    return redirect()->route('profile.index')->with('success', 'Profile berhasil dihapus');
    }
}
