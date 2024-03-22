<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Riwayat extends Model
{
    protected $penjualan = 'penjualan';
    protected $detailPenjualan = 'detail_penjualan';
    protected $produk = 'produk';
    protected $pelanggan = 'pelanggan';
    public function getData()
    {
        $query = DB::table($this->detailPenjualan . ' AS d')
            ->select(
                'd.id',
                'p.nomor_nota',
                'p.tanggal',
                'pr.nama as nama_produk',
                'pl.nama as nama_pelanggan',
                'pr.harga',
                'd.jumlah',
                'd.subtotal'
            )
            ->join($this->penjualan . ' AS p', 'p.id', 'd.penjualan_id')
            ->join($this->produk . ' AS pr', 'pr.id', 'd.produk_id')
            ->leftJoin($this->pelanggan . ' AS pl', 'pl.id', 'p.pelanggan_id')
            ->orderByDesc('p.tanggal')
            ->orderBy('p.nomor_nota');

        return $query->get();
    }
}
