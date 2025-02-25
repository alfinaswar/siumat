<?php

namespace App\Http\Controllers;

use App\Models\MasterKub;
use App\Models\User;
use Illuminate\Http\Request;

class MasterKubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = MasterKub::latest()->get();
        return view('master-kub.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master-kub.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        MasterKub::create($data);
        return redirect()->route('kub.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterKub $masterKub)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kub = MasterKub::findOrFail($id);
        return view('master-kub.edit', compact('kub'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NamaKub' => 'required|string|max:255',
            'Deskripsi' => 'nullable|string',
        ]);

        $kub = MasterKub::findOrFail($id);
        $kub->update([
            'NamaKub' => $request->NamaKub,
            'Deskripsi' => $request->Deskripsi,
        ]);

        return redirect()
            ->route('kub.index')
            ->with('success', 'Data KUB berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cek = User::where('kub', $id)->first();
        if ($cek) {
            return redirect()
                ->route('kub.index')
                ->with('error', 'Data tidak dapat dihapus')
                ->with('message', 'Data sudah digunakan oleh user');
        } else {
            $kub = MasterKub::find($id);
            $kub->delete();
            return redirect()
                ->route('kub.index')
                ->with('success', 'KUB berhasil dihapus');
        }
    }
}
