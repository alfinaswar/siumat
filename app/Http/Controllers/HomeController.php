<?php

namespace App\Http\Controllers;

use App\Models\KartuKeluarga;
use App\Models\MasterKub;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        // Hitung usia dari tanggal lahir
        $users = User::select('tanggal_lahir')->get();

        $totalPria = User::where('jenis_kelamin', 'L')->count();
        $totalWanita = User::where('jenis_kelamin', 'P')->count();

        $usiaAnak = $users->filter(function ($user) {
            return Carbon::parse($user->tanggal_lahir)->age >= 0 && Carbon::parse($user->tanggal_lahir)->age <= 12;
        })->count();

        $usiaRemaja = $users->filter(function ($user) {
            return Carbon::parse($user->tanggal_lahir)->age >= 13 && Carbon::parse($user->tanggal_lahir)->age <= 25;
        })->count();

        $usiaDewasa = $users->filter(function ($user) {
            return Carbon::parse($user->tanggal_lahir)->age >= 26 && Carbon::parse($user->tanggal_lahir)->age <= 45;
        })->count();

        $usiaLansia = $users->filter(function ($user) {
            return Carbon::parse($user->tanggal_lahir)->age > 45;
        })->count();

        $totalKK = KartuKeluarga::count();
        $totalUser = User::count();
        $totalRT = User::select('rt')->distinct()->count();
        $totalRW = User::select('rw')->distinct()->count();
        $totalKub = MasterKub::count();
        return view('home', compact('totalPria', 'totalWanita', 'usiaAnak', 'usiaRemaja', 'usiaDewasa', 'usiaLansia', 'totalKK', 'totalUser', 'totalRT', 'totalRW', 'totalKub'));
    }
    public function menu()
    {
        return view('pilih-kub');
    }
}
