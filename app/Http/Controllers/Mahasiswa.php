<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Mahasiswa extends Controller
{
    public function index()
    {
        $mahasiswa = \App\Models\mahasiswas::all();
        return view('mahasiswa.index', ['mahasiswa' => $mahasiswa]);
    }

    public function store(Request $request)
    {
        \App\Models\mahasiswas::create([
            'nama' => $request->input('nama'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'alamat' => $request->input('alamat'),
            'no_hp' => $request->input('no_hp'),
        ]);

        return redirect('/mahasiswa')->with('success', 'Mahasiswa Berhasil Ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'string', 'max:15'],
        ]);

        $mahasiswa = \App\Models\mahasiswas::findOrFail($id);
        $mahasiswa->update($validated);

        return redirect('/mahasiswa')->with('success', 'Mahasiswa Berhasil Diperbarui.');
    }

    public function destroy($id)
    {
        $mahasiswa = \App\Models\mahasiswas::findOrFail($id);
        $mahasiswa->delete();

        return redirect('/mahasiswa')->with('success', 'Mahasiswa Berhasil Dihapus.');
    }

    public function edit($id)
    {
        $mahasiswa = \App\Models\mahasiswas::findOrFail($id);
        return view('mahasiswa.edit', ['mahasiswa' => $mahasiswa]);
    }
}
