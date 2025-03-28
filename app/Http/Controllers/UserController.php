<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MasterKub;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use DB;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        $roles = Role::pluck('name', 'name')->all();
        $data = User::orderBy('id', 'DESC')->get();
        return view('users.index', compact('data', 'roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $getRole = auth()->user()->getRoleNames();
        $curentRole = $getRole[0];
        $kub = MasterKub::all();
        $roles = Role::pluck('name', 'name')->all();
        return view('users.create', compact('roles', 'kub', 'curentRole'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        // dd($input);
        $input['password'] = Hash::make($input['password']);
        $input['akses'] = $request->roles[0];

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')->with('success', 'Data Pengguna Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $kub = MasterKub::all();
        $user = User::with('getProvinsi', 'getKabupaten', 'getKecamatan', 'getKelurahan')->find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('users.edit', compact('user', 'roles', 'userRole', 'kub'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $input = $request->all();
        if ($request->hasFile('foto_profil')) {
            $file = $request->file('foto_profil');
            $file->storeAs('public/foto_profil', $file->getClientOriginalName());
            $data['foto_profil'] = $file->getClientOriginalName();
        }
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()
            ->back()
            ->with('success', 'Data Pengguna Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        User::find($id)->delete();
        return redirect()
            ->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
