<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        return view('pages.kategori.index');
    }

    public function form_kategori()
    {
        return view('pages.kategori.form');
    }

    public function categoryCrud(Request $request)
    {
        if ($request->isMethod('get')) {
            return response()->json(Category::all());
        }
        else if ($request->isMethod('post')) {
            switch ($request->metode) {
                case 'tambah':
                    return Category::tambah($request);
                    break;
                case 'edit':
                    return Category::rubah($request);
                    break;
            }
        } else if ($request->isMethod('delete')) {
            return Category::hapus($request);
        }
    }
}
