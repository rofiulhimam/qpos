<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        return view('pages.staff.index');
    }

    public function form_staff()
    {
        return view('pages.staff.form');
    }

    public function staffCrud(Request $request)
    {
        if ($request->isMethod('get')) {
            return response()->json(User::all());
        }
        else if ($request->isMethod('post')) {
            switch ($request->metode) {
                case 'tambah':
                    return User::tambah($request);
                    break;
            }
        } else if ($request->isMethod('delete')) {
            return User::hapus($request);
        }
    }
}
