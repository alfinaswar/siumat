<?php

namespace App\Http\Controllers;

use App\Models\KartuKeluarga;
use App\Models\MasterRayon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KartuKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $getRole = auth()->user()->getRoleNames();
            if ($getRole[0] === 'Admin' || $getRole[0] === 'Ketua') {
                $data = KartuKeluarga::with('getRayon')->orderBy('id', 'Desc')->get();
            } else {
                $data = KartuKeluarga::with('getRayon')->where('kub', auth()->user()->kub)->orderBy('id', 'Desc')->get();
            }
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btnEdit = '<a href="' . route('data-kk.edit', $row->id) . '" class="btn btn-primary btn-sm btn-edit" title="Edit"><i class="fas fa-edit"></i></a>';
                    $btnDelete = '<a href="javascript:void(0)" data-id="' . $row->id . '" class="btn btn-danger btn-sm btn-delete" title="Hapus"><i class="fas fa-trash-alt"></i></a>';
                    return $btnEdit . '  ' . $btnDelete;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('kartu-keluarga.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rayon = MasterRayon::where('kub', auth()->user()->kub)->get();
        return view('kartu-keluarga.create', compact('rayon'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['kub'] = $request->kub;
        $data['dibuat_oleh'] = auth()->user()->id;
        KartuKeluarga::create($data);
        return redirect()->route('jemaat.index')->with('success', 'Data KK Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(KartuKeluarga $MasterRayon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rayon = MasterRayon::where('kub', auth()->user()->kub)->get();
        $data = KartuKeluarga::findOrFail($id);
        return view('kartu-keluarga.edit', compact('data', 'rayon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $Rayon = KartuKeluarga::find($id);
        $Rayon->update($data);
        return redirect()->route('data-kk.index')->with('success', 'Data Majelis Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = KartuKeluarga::find($id);
        $data->delete();
        return response()->json(['message' => 'Data Kartu Keluarga Berhasil Dihapus'], 200);
    }
}
