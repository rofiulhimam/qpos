<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class Inventory extends Model
{
    use HasFactory;

    public static function tambah($request)
    {
        DB::beginTransaction();
        try {
            // dd($request->all());
            $db = new Inventory();
            $db->name = $request->name;
            // $db->image = $request->image;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $randomNumber = substr(str_shuffle("0123456789"), 0, 3);
                $prefix = substr(strtoupper(str_shuffle(str_replace(' ', '', $request->name))), 0, 4);
                // $prefix = substr(strtoupper($request->name), 0, 4);
                $extension = $image->getClientOriginalExtension();
                $image_name = $prefix . '-' . $randomNumber . '.' . $extension;

                $filePath = 'image/inventory/';
                $image->move(public_path($filePath), $image_name);

                $db->image = $image_name;
            }
            $db->stock = $request->stock;
            $db->price = intval($request->price);
            $db->id_category = $request->id_category;
            $db->save();
            DB::commit();

            $responseData = 'Data berhasil ditambahkan!';
            return response()->json(['message' => $responseData, 'data' => $db], 201); // Return saved data
        } catch (\Exception $ex) {
            DB::rollback();
            $responseData = $ex->getMessage();
            return response()->json(['message' => $responseData, 'data' => $responseData], 400);
        }
    }

    public static function rubah($request)
    {
        DB::beginTransaction();
        try {
            $db = Inventory::find($request->id);
            $db->name =  $request->name;
            if ($request->hasFile('image')) {
                File::delete('image/inventory/'.$db->image);
                $image = $request->file('image');
                $randomNumber = substr(str_shuffle("0123456789"), 0, 3);
                $prefix = substr(strtoupper(str_shuffle(str_replace(' ', '', $request->name))), 0, 4);
                // $prefix = substr(strtoupper($request->name), 0, 4);
                $extension = $image->getClientOriginalExtension();
                $image_name = $prefix . '-' . $randomNumber . '.' . $extension;

                $filePath = 'image/inventory/';
                $image->move(public_path($filePath), $image_name);

                $db->image = $image_name;
            }
            $db->stock = $request->stock;
            $db->price = intval($request->price);
            $db->id_category = $request->id_category;
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
            $db = Inventory::find($request->id);
            File::delete('image/inventory/'.$db->image);
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
