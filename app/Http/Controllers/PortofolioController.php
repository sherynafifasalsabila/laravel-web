<?php
namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataPortofolio'] = Portofolio::all();
        return view('admin.portofolio.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portofolio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['judul']            = $request->judul;
        $data['tentang_saya']     = $request->tentang_saya;
        $data['data_diri']        = $request->data_diri;
        $data['pendidikan']       = $request->pendidikan;
        $data['pengalaman_kerja'] = $request->pengalaman_kerja;
        $data['kemampuan']        = $request->kemampuan;
        $data['kontak']           = $request->kontak;
        $data['sosial_media']     = $request->sosial_media;

        if ($request->hasFile('gambar')) {
            $nama = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('uploads'), $nama);
            $data['gambar'] = $nama;
        }

        Portofolio::create($data);

        return redirect()->route('portofolio.index')->with('success', 'Penambahan Data Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
            $data['dataPortofolio'] = Portofolio::findOrFail($id);
            return view('admin.portofolio.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    $data['dataPortofolio'] = Portofolio::findOrFail($id);
    return view('admin.portofolio.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $portofolio = Portofolio::findOrFail($id);

        $portofolio->judul            = $request->judul;
        $portofolio->tentang_saya     = $request->tentang_saya;
        $portofolio->data_diri        = $request->data_diri;
        $portofolio->pendidikan       = $request->pendidikan;
        $portofolio->pengalaman_kerja = $request->pengalaman_kerja;
        $portofolio->kemampuan        = $request->kemampuan;
        $portofolio->kontak           = $request->kontak;
        $portofolio->sosial_media     = $request->sosial_media;

        if ($request->hasFile('gambar')) {
            if ($portofolio->gambar) {
                File::delete(public_path('uploads/' . $portofolio->gambar));
            }
            $nama = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('uploads'), $nama);
            $portofolio->gambar = $nama;
        }

        $portofolio->save();
        return redirect()->route('portofolio.index')->with('success', 'Perubahan Data Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $portofolio = Portofolio::findOrFail($id);
        if ($portofolio->gambar) {
            File::delete(public_path('uploads/' . $portofolio->gambar));
        }

        $portofolio->delete();
        return redirect()->route('portofolio.index')->with('success', 'Data berhasil dihapus');
    }
}
