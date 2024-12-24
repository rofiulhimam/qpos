<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    public function index() {
        return view('pages.inventori.index');
    }

    public function form_inventori()
    {
        $categories = DB::table('categories')->select('id', 'name')->get();
        return view('pages.inventori.form', compact('categories'));
    }

    public function inventoryCrud(Request $request)
    {
        if ($request->isMethod('get')) {
            $table = DB::table('inventories')
                ->join('categories', 'inventories.id_category', '=', 'categories.id')
                ->select('inventories.*', 'categories.name as category_name')
                ->get();
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
