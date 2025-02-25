<?php

namespace App\Http\Controllers;

use App\Models\MasterKub;
use App\Models\ProfilStasi;
use Illuminate\Http\Request;

class ProfilStasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kub = MasterKub::get();
        $data = ProfilStasi::latest()->get();
        return view('profil-stasi.index', compact('data', 'kub'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kub = MasterKub::get();
        return view('profil-stasi.create', compact('kub'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('FotoProfil')) {
            $file = $request->file('FotoProfil');
            $file->storeAs('public/foto_profil', $file->getClientOriginalName());
            $data['FotoProfil'] = $file->getClientOriginalName();
        }
        ProfilStasi::create($data);
        return redirect()->route('ps.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProfilStasi $ProfilStasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kub = MasterKub::get();
        $data = ProfilStasi::find($id);
        return view('profil-stasi.edit', compact('data', 'kub'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        if ($request->hasFile('FotoProfil')) {
            $file = $request->file('FotoProfil');
            $file->storeAs('public/foto_profil', $file->getClientOriginalName());
            $data['FotoProfil'] = $file->getClientOriginalName();
        }
        $ProfilStasi = ProfilStasi::find($id);
        $ProfilStasi->update($data);
        return redirect()->route('ps.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        ProfilStasi::find($id)->delete();
        return redirect()->route('ps.index')->with('success', 'Data berhasil dihapus');
    }
}
