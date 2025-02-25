<?php

namespace App\Http\Controllers;

use App\Models\MasterKub;
use App\Models\ProfilKub;
use Illuminate\Http\Request;

class ProfilKubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kub = MasterKub::get();
        $data = ProfilKub::latest()->get();
        return view('profil-kub.index', compact('data', 'kub'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kub = MasterKub::get();
        return view('profil-kub.create', compact('kub'));
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
        ProfilKub::create($data);
        return redirect()->route('pk.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProfilKub $profilKub)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kub = MasterKub::get();
        $data = ProfilKub::find($id);
        return view('profil-kub.edit', compact('data', 'kub'));
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
        $profilKub = ProfilKub::find($id);
        $profilKub->update($data);
        return redirect()->route('pk.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        ProfilKub::find($id)->delete();
        return redirect()->route('pk.index')->with('success', 'Data berhasil dihapus');
    }
}
