<?php

namespace App\Http\Controllers;

use App\Models\MasterPendeta;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MasterPendetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $getRole = auth()->user()->getRoleNames();
            if ($getRole[0] === 'Admin' || $getRole[0] === 'Ketua') {
                $data = MasterPendeta::orderBy('id', 'Desc')->get();
            } else {
                $data = MasterPendeta::where('kub', auth()->user()->kub)->orderBy('id', 'Desc')->get();
            }
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btnEdit = '<a href="' . route('pendeta.edit', $row->id) . '" class="btn btn-primary btn-sm btn-edit" title="Edit"><i class="fas fa-edit"></i></a>';
                    $btnDelete = '<a href="javascript:void(0)" data-id="' . $row->id . '" class="btn btn-danger btn-sm btn-delete" title="Hapus"><i class="fas fa-trash-alt"></i></a>';
                    return $btnEdit . '  ' . $btnDelete;
                })
                ->addColumn('kontak', function ($row) {
                    $kontak = $row->telepon . '<hr>' . $row->email;
                    return $kontak;
                })
                ->addColumn('foto', function ($row) {
                    $foto = '<img src="' . asset('storage/foto_pendeta/' . $row->foto) . '" width="180px" height="180px">';
                    return $foto;
                })
                ->rawColumns(['action', 'kontak', 'foto'])
                ->make(true);
        }
        return view('master-pendeta.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master-pendeta.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['kub'] = auth()->user()->kub;
        $data['dibuat_oleh'] = auth()->user()->id;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $file->storeAs('public/foto_pendeta', $file->getClientOriginalName());
            $data['foto'] = $file->getClientOriginalName();
        }
        MasterPendeta::create($data);
        return redirect()->route('pendeta.index')->with('success', 'Data Pendeta Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterPendeta $masterPendeta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pendeta = MasterPendeta::findOrFail($id);
        return view('master-pendeta.edit', compact('pendeta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $file->storeAs('public/foto_pendeta', $file->getClientOriginalName());
            $data['foto'] = $file->getClientOriginalName();
        }
        $pendeta = MasterPendeta::find($id);
        $pendeta->update($data);
        return redirect()->route('pendeta.index')->with('success', 'Data Pendeta Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = MasterPendeta::find($id);
        $data->delete();
        return response()->json(['message' => 'Data Pendeta Berhasil Dihapus'], 200);
    }
}
