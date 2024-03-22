<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pelanggan extends Model
{
    use HasFactory;
    public function readData()
    {
        $data = DB::select("SELECT * FROM pelanggan");
        return $data;
    }

    public function createData($requset)
    {
        $nama = $requset->nama;
        $alamat = $requset->alamat;
        $nomor_telepon = $requset->nomor_telepon;

        DB::insert("INSERT INTO pelanggan(nama,alamat,nomor_telepon) VALUES('$nama','$alamat',$nomor_telepon)");
    }

    public function editData($id)
    {
        $data = DB::select("SELECT * FROM pelanggan WHERE id = $id LIMIT 1");
        return $data[0];
    }

    public function updateData($requset)
    {
        $id = $requset->id;
        $nama = $requset->nama;
        $alamat = $requset->alamat;
        $nomor_telepon = $requset->nomor_telepon;

        DB::update("UPDATE pelanggan SET nama = '$nama', alamat = '$alamat', nomor_telepon = $nomor_telepon WHERE id = $id");
    }

    public function checkData($id)
    {
        $data = DB::select("SELECT * FROM pelanggan WHERE id = $id LIMIT 1");

        if (isset($data)) {
            return true;
        } else {
            false;
        }
    }

    public function deleteData($id)
    {
        return DB::delete("DELETE FROM pelanggan
        WHERE id = ?", [$id]);
    }
}
