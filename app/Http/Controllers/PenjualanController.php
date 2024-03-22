<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index(Penjualan $penjualan, Produk $produk, Pelanggan $pelanggan)
    {
        $data_produk = $produk->readData();
        $data_penjualan = $penjualan->readData();
        $data_pelanggan = $pelanggan->readData();
        $nota = $penjualan->readNota();

        $total_bayar = request('total_bayar');
        $bayar = request('bayar');

        $kembalian = $bayar - $total_bayar;

        return view(
            'penjualan.index',
            compact(
                'data_produk',
                'data_penjualan',
                'data_pelanggan',
                'nota',
                'kembalian'
            )
        );
    }

    public function new($nota, Penjualan $penjualan)
    {
        session(['isNew' => true]);
        $nota = urldecode($nota);
        $penjualan->updateTotalPenjualan($nota);
        // return redirect()->route('penjualan.index');
        $data_struk = $penjualan->readStruck();
        $nomor_nota = $penjualan->readNota();
        // dd($data_struk, $nomor_nota);
        Penjualan::where('nomor_nota', $nomor_nota)->first()->update(['bayar' => request('bayar')]);

        $bayar = request('bayar');
        $kembalian = request('kembalian');

        return view('penjualan.struk', compact('data_struk', 'nomor_nota', 'kembalian', 'bayar'));

    }

    public function store(Request $request, Penjualan $penjualan)
    {
        $store = $penjualan->storeDataPenjualan($request);

        session()->forget('isNew');

        if ($store == false) {
            session()->flash('error', 'stok tidak mencukupi');
            return redirect()
                ->route('penjualan.index');
        } else {
            return redirect()->route('penjualan.index');
            // $totalPenjualan = $penjualan->calculateTotalPenjualan();

        }
    }

    public function delete($id, Penjualan $penjualan)
    {
        if ($penjualan->deleteData($id)) {
            return redirect()->route('penjualan.index')->with('berhasil', 'data berhasil di hapus');
        } else {
            return redirect()->route('penjualan.index')->with('gagal', "data dengan id:" . $id . " gagal di hapus");
        }
    }
}
