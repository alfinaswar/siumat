<?php

namespace App\Http\Controllers;

use App\Models\MasterMajelis;
use App\Models\MasterRayon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MasterMajelisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $getRole = auth()->user()->getRoleNames();
            if ($getRole[0] === 'Admin' || $getRole[0] === 'Ketua') {
                $data = MasterMajelis::with('getRayon')->orderBy('id', 'Desc')->get();
            } else {
                $data = MasterMajelis::with('getRayon')->where('kub', auth()->user()->kub)->orderBy('id', 'Desc')->get();
            }
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btnEdit = '<a href="' . route('majelis.edit', $row->id) . '" class="btn btn-primary btn-sm btn-edit" title="Edit"><i class="fas fa-edit"></i></a>';
                    $btnDelete = '<a href="javascript:void(0)" data-id="' . $row->id . '" class="btn btn-danger btn-sm btn-delete" title="Hapus"><i class="fas fa-trash-alt"></i></a>';
                    return $btnEdit . '  ' . $btnDelete;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('master-majelis.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rayon = MasterRayon::where('kub', auth()->user()->kub)->get();
        return view('master-majelis.create', compact('rayon'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['kub'] = auth()->user()->kub;
        $data['dibuat_oleh'] = auth()->user()->id;
        MasterMajelis::create($data);
        return redirect()->route('majelis.index')->with('success', 'Data Rayon Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterMajelis $MasterRayon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rayon = MasterRayon::where('kub', auth()->user()->kub)->get();
        $data = MasterMajelis::findOrFail($id);
        return view('master-majelis.edit', compact('data', 'rayon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $Rayon = MasterMajelis::find($id);
        $Rayon->update($data);
        return redirect()->route('majelis.index')->with('success', 'Data Majelis Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = MasterMajelis::find($id);
        $data->delete();
        return response()->json(['message' => 'Data Majelis Berhasil Dihapus'], 200);
    }
}
