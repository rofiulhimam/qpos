<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    public function index() {
        // return view('pages.inventori.index');
        $categories = DB::table('categories')->select('id', 'name')->get();
        return view('pages.inventori.index', compact('categories'));
    }

    public function form_inventori()
    {
        $categories = DB::table('categories')->select('id', 'name')->get();
        return view('pages.inventori.form', compact('categories'));
    }

    public function inventoryCrud(Request $request)
    {
        if ($request->isMethod('get')) {
            $query = DB::table('inventories')
                ->join('categories', 'inventories.id_category', '=', 'categories.id')
                ->select('inventories.*', 'categories.name as category_name');

            // Filter berdasarkan kategori
            if ($request->has('category') && $request->category != '') {
                $query->where('id_category', $request->category);
            }

            // Filter berdasarkan stok
            if ($request->has('stock') && $request->stock != '') {
                if ($request->stock === 'Tersedia') {
                    $query->where('inventories.stock', '=', 'Tersedia');
                } else if ($request->stock === 'Tidak Tersedia') {
                    $query->where('inventories.stock', '=', 'Tidak Tersedia');
                }
            }

            $table = $query->get();
            return response()->json($table);
        }
        else if ($request->isMethod('post')) {
            switch ($request->metode) {
                case 'tambah':
                    return Inventory::tambah($request);
                    break;
                case 'edit':
                    return Inventory::rubah($request);
                    break;
            }
        } else if ($request->isMethod('delete')) {
            return Inventory::hapus($request);
        }
    }
}
