<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::orderBy('id')->get();
        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required',
        'role' => 'required|in:admin,user',
        'password' => 'required',
    ]);

    $validatedData['password'] = Hash::make($request->password);

    User::create($validatedData);

    return redirect()->route('user.index')->with('success', 'Data Berhasil Input');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrfail($id);
        return view ('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $user = User::findOrFail($id);
    return view('user.edit', compact('user'));
}

/**
 * Update the specified resource in storage.
 */
public function update(Request $request, string $id)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'role' => 'required|in:admin,user',
        'password' => 'nullable|min:8|confirmed',
    ]);

    $user = User::findOrFail($id);

    // Update user data without password
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->role = $validatedData['role'];

    // Update password only if it is provided
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect()->route('user.index')->with('success', 'User berhasil diupdate');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('succes', 'User Berhasil Dihapus');
    }
}
