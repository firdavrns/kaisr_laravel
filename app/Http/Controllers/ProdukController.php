<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Produk $produk)
    {
        $data = $produk->readData();
        return view('produk.index', compact('data'));
    }

    public function create(Request $request, Produk $produk)
    {
        $produk->createData($request);
        return redirect()->route('produk.index');
    }

    public function edit($id, Produk $produk)
    {
        $check = $produk->checkData($id);

        if ($check) {
            $data = $produk->editData($id);
            return view('produk.edit', compact('data'));
        } else {
            return "Data dengan id $id tidak ada";
        }
    }

    public function update(Request $request, Produk $produk)
    {
        $check = $produk->checkData($request->id);

        if ($check) {
            $produk->updateData($request);
            return redirect()->route('produk.index');
        } else {
            return "Data dengan id $request->id tidak ada";
        }
    }

    public function delete($id, Produk $produk)
    {
        if ($produk->deleteData($id)) {
            return redirect()->route('produk.index')->with('berhasil', 'Data berhasil dihapus');
        } else {
            return redirect()->route('produk.index')->with('gagal', 'Data gagal dihapus');
        }
    }
}
