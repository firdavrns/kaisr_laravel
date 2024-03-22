<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Produk extends Model
{
    use HasFactory;
    public function readData()
    {
        $data = DB::select("SELECT * FROM produk");
        return $data;
    }

    public function createData($request)
    {
        $nama = $request->nama;
        $harga = $request->harga;
        $stok = $request->stok;

        DB::insert("INSERT INTO produk (nama,harga,stok) VALUES ('$nama',$harga,$stok)");
    }

    public function editData($id)
    {
        $data = DB::select("SELECT * FROM produk WHERE id = $id LIMIT 1");
        return $data[0] ?? 0;
    }

    public function updateData($request)
    {
        $id = $request->id;
        $nama = $request->nama;
        $harga = $request->harga;
        $stok = $request->stok;

        DB::update(
            "UPDATE produk SET
            nama = '$nama',
            harga = $harga,
            stok = $stok
            WHERE id = $id"
        );
    }

    public function checkData($id)
    {
        $data = DB::select("SELECT * FROM produk WHERE id = $id LIMIT 1");

        if (isset($data)) {
            return true;
        } else {
            false;
        }
    }

    public function deleteData($id)
    {
        return DB::delete("DELETE FROM produk WHERE id = ?", [$id]);
    }
}
