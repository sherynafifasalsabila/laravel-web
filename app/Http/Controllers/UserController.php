<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $data['dataUser'] = User::all();
        return view('admin.user.index', $data);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        try {
            $data['name']     = $request->name;
            $data['email']    = $request->email;
            $data['password'] = Hash::make($request->password);

            User::create($data);

            return redirect()->route('user.index')->with('success', 'Penambahan Data Berhasil!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $data['dataUser'] = User::findOrFail($id);
        return view('admin.user.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        try {
            $user->name  = $request->name;
            $user->email = $request->email;

            // password hanya diubah kalau diisi
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            $user->save();

            return redirect()->route('user.index')->with('success', 'Perubahan Data Berhasil!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal mengubah data: ' . $e->getMessage());
        }
    }


    public function destroy(string $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->route('user.index')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
