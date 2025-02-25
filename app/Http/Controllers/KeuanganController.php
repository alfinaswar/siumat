<?php

namespace App\Http\Controllers;

use App\Exports\KeuanganExport;
use App\Models\Keuangan;
use App\Models\MasterKub;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Keuangan::with('getKub')->where('kub', auth()->user()->kub)->get();
        return view('keuangan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kub = MasterKub::get();
        return view('keuangan.create', compact('kub'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Keuangan::create($data);
        return redirect()->route('pengeluaran.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Keuangan $keuangan)
    {
        //
    }

    public function export(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $jenis = $request->input('JenisLaporan');
        // dd($startDate);
        return Excel::download(new KeuanganExport($startDate, $endDate, $jenis), 'Laporan_Keuangan.xlsx');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Keuangan::find($id);
        $kub = MasterKub::get();
        return view('keuangan.edit', compact('data', 'kub'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $keuangan = Keuangan::find($id);
        $keuangan->update($data);
        return redirect()->route('pengeluaran.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $keuangan = Keuangan::find($id);
        $keuangan->delete();
        return redirect()->route('pengeluaran.index')->with('success', 'Data berhasil dihapus');
    }
}
