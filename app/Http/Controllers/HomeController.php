<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function index()
    {
        return view('pages.pos.index');
    }

    public function transaksi()
    {
        return view('pages.transaksi.index');
    }

    public function keuangan()
    {
        return view('pages.keuangan.index');
    }

    public function penjualan()
    {
        return view('pages.penjualan.index');
    }

    // public function staff()
    // {
    //     return view('pages.staff.index');
    // }
}
