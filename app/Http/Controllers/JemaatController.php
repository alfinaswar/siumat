<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\Dokumen;
use App\Models\Jemaat;
use App\Models\KartuKeluarga;
use App\Models\MasterKub;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;
use DB;

class JemaatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd('123');
        if ($request->ajax()) {
            $data = KartuKeluarga::with('getKub')->where('kub', auth()->user()->kub)->orderBy('id', 'Desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $tambah = '<a href="' . route('jemaat.tambah-anggota-keluarga', $row->no_kk) . '" class="btn btn-primary btn-sm btn-tambah" title="Tambah"><i class="fas fa-plus"></i></a>';
                    return $tambah;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $kub = MasterKub::all();
        return view('jemaat.index', compact('kub'));
    }

    public function export(Request $request)
    {
        $jenisKelamin = $request->input('jenis_kelamin');
        $usiaMin = $request->input('usia_min');
        $usiaMax = $request->input('usia_max');

        return Excel::download(new UsersExport($jenisKelamin, $usiaMin, $usiaMax), 'Laporan_Data_Keluarga.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $user = User::where('no_kk', $id)->where('status_dalam_keluarga', 'AYAH')->first();
        $Keluarga = User::where('no_kk', $id)->get();
        // dd($id);
        return view('jemaat.create', compact('user', 'Keluarga'));
    }

    public function dokumen($id)
    {
        $user = User::with('getDokumen')->find($id)->first();
        // dd($user);
        return view('jemaat.form-add-dokumen', compact('user'));
    }

    public function createAnggota()
    {
        $getRole = auth()->user()->getRoleNames();
        $curentRole = $getRole[0];
        $kub = MasterKub::all();
        $roles = Role::pluck('name', 'name')->all();
        return view('jemaat.create-anggota', compact('roles', 'kub', 'curentRole'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeDokumen(Request $request): RedirectResponse
    {
        $input = $request->all();
        $input['pemilik'] = auth()->user()->id;
        // dd($input);
        // dd($request->hasFile('Foto'));

        if ($request->hasFile('file_dokumen')) {
            $file = $request->file('file_dokumen');
            $file->storeAs('public/file_dokumen', $file->hashName());
            $input['file_dokumen'] = $file->hashName();
        }

        $data = Dokumen::create($input);

        return redirect()->back()->with('success', 'Dokumen Pengguna Berhasil Ditambahkan');
    }

    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        // dd($input);
        // dd($request->hasFile('Foto'));

        if ($request->hasFile('foto_profil')) {
            $file = $request->file('foto_profil');
            $file->storeAs('public/foto_profil', $file->getClientOriginalName());
            $data['foto_profil'] = $file->getClientOriginalName();
        }

        $user = User::create($input);

        return redirect()->route('jemaat.tambah-anggota-keluarga', $request->no_kk)->with('success', 'Data Pengguna Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jemaat $jemaat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $kub = MasterKub::all();
        $user = User::with('getProvinsi', 'getKabupaten', 'getKecamatan', 'getKelurahan')->find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('jemaat.edit', compact('user', 'roles', 'userRole', 'kub'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $input = $request->all();
        if ($request->hasFile('foto_profil')) {
            $file = $request->file('foto_profil');
            $file->storeAs('public/foto_profil', $file->getClientOriginalName());
            $data['foto_profil'] = $file->getClientOriginalName();
        }

        $user = User::find($id);
        $user->update($input);

        return redirect()
            ->back()
            ->with('success', 'Data Pengguna Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyDoc($id)
    {
        $data = Dokumen::find($id);
        $data->delete();
        return response()->json(['message' => 'Data Dokumen Berhasil Dihapus'], 200);
    }
}
