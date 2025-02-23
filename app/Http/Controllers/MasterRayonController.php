<?php

namespace App\Http\Controllers;

use App\Models\MasterRayon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MasterRayonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $getRole = auth()->user()->getRoleNames();
            if ($getRole[0] === 'Admin' || $getRole[0] === 'Ketua') {
                $data = MasterRayon::orderBy('id', 'Desc')->get();
            } else {
                $data = MasterRayon::where('kub', auth()->user()->kub)->orderBy('id', 'Desc')->get();
            }
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btnEdit = '<a href="' . route('rayon.edit', $row->id) . '" class="btn btn-primary btn-sm btn-edit" title="Edit"><i class="fas fa-edit"></i></a>';
                    $btnDelete = '<a href="javascript:void(0)" data-id="' . $row->id . '" class="btn btn-danger btn-sm btn-delete" title="Hapus"><i class="fas fa-trash-alt"></i></a>';
                    return $btnEdit . '  ' . $btnDelete;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('master-rayon.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master-rayon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['kub'] = auth()->user()->kub;
        $data['dibuat_oleh'] = auth()->user()->id;
        MasterRayon::create($data);
        return redirect()->route('rayon.index')->with('success', 'Data Rayon Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterRayon $MasterRayon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = MasterRayon::findOrFail($id);
        return view('master-rayon.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $Rayon = MasterRayon::find($id);
        $Rayon->update($data);
        return redirect()->route('rayon.index')->with('success', 'Data Rayon Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = MasterRayon::find($id);
        $data->delete();
        return response()->json(['message' => 'Data Rayon Berhasil Dihapus'], 200);
    }
}
