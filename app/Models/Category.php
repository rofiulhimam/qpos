<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    public static function tambah($request)
    {
        DB::beginTransaction();
        try {
            $db = new Category();
            $db->name = $request->name;
            $db->save();
            DB::commit();

            $responseData = 'Data berhasil ditambahkan!';
            return response()->json(['message' => $responseData, 'data' => $db], 201); // Return saved data
        } catch (\Exception $ex) {
            DB::rollback();
            $responseData = $ex->getMessage();
            return response()->json(['message' => 'failed', 'data' => $responseData], 400);
        }
    }

    public static function rubah($request)
    {
        DB::beginTransaction();
        try {
            $db = Category::find($request->id);
            $db->name =  $request->name;
            $db->save();
            DB::commit();
            $responseData = 'Data berhasil diperbarui!';
            return response()->json(['message' => $responseData, 'data' => $responseData], 201);
        } catch (\Exception $ex) {
            DB::rollback();
            $responseData = $ex->getMessage();
            return response()->json(['message' => 'failed', 'data' => $responseData], 400);
        }
    }

    public static function hapus($request)
    {
        DB::beginTransaction();
        try {
            $db = Category::find($request->id);
            $db->delete();
            DB::commit();
            $responseData = 'Data berhasil dihapus!';
            return response()->json(['message' => $responseData, 'data' => $responseData], 201);
        } catch (\Exception $ex) {
            DB::rollback();
            $responseData = $ex->getMessage();
            return response()->json(['message' => 'failed', 'data' => $responseData], 400);
        }
    }
}
