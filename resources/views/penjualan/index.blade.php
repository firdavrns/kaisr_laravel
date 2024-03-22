@extends('layout.layout')
@section('content')

@php
    if (session('isNew')) {
        $nomor_nota = '';
    } else {
        $nomor_nota = $nota;
    }
    $total = '0';
@endphp
<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Penjualan</h6>
                @if (session('error'))
                    <div class="alert alert-warning">{{ session('error') }}</div>
                @endif
            </div>
            <div class="card-body border-bottom-primary">
                <form  action="{{ route('penjualan.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="m-0 font-weight-bold text-primary" for="">Nota</label>
                        <input value="{{ session('error') ? '' : $nomor_nota }}" type="text" class="form-control" name="nota"  readonly>
                    </div>
                    <div class="form-group">
                        <label class="m-0 font-weight-bold text-primary" for="Peran">Produk</label>
                        <select  name="produk_id" id="" class="form-control">
                            <option value="">--Pilih Produk</option>
                            @foreach ($data_produk as $produk)
                            <option value="{{ $produk->id. '_'.(float)$produk->harga }}">
                            {{ $produk->nama }} - {{ $produk->harga }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="m-0 font-weight-bold text-primary" for="Peran">Pilih Pelanggan</label>
                        <select  name="pelanggan_id" id="" class="form-control">
                            <option value="">--Pilih Pelanggan</option>
                            @foreach ($data_pelanggan as $pelanggan)
                            <option value="{{ $pelanggan->id}}">
                                {{ $pelanggan->nama }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="m-0 font-weight-bold text-primary" for="">Jumlah</label>
                        <input type="number" min="0" class="form-control" name="jumlah" id="jumlah" required>
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Simpan</button>
                    <a href="{{ route('penjualan.new', ['nota' => urlencode($nota)]) }}" class="btn btn-outline-warning">Pindah Nota</a>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Penjualan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Sub Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_penjualan as $item)
                            @php
                                $total += (float) $item->subtotal;
                                $bayar;
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_produk }}</td>
                                <td>{{ $item->harga_produk }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ $item->subtotal }}</td>
                                {{-- <td>
                                    <a class="btn btn-danger"
                                        href="{{ route('penjualan.delete', ['id_detail' => $item->id_detail]) }}">
                                        Hapus
                                    </a>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <td colspan="6">
                                <form action="">

                                    <input class="form-control mb-3" type="number" name="total_bayar" id=""
                                        value="{{ isset($total) ? $total : '' }}" readonly>
                                    <input class="form-control mb-3" type="number" name="bayar" id=""
                                        min="{{ isset($total) ? $total : '' }}">
                                    <button class="btn btn-primary mb-3" type="submit">hitung</button>
                                </form>

                                <form action="{{ route('penjualan.new', ['nota' => urlencode($nota)]) }}" method="get">
                                    <input class="form-control mb-3" type="hidden" name="bayar"
                                        value="{{ request('bayar') ? request('bayar') : '' }}">
                                    <input class="form-control mb-3" type="number" name="kembalian" id=""
                                        value="{{ isset($kembalian) ? $kembalian : '' }}">
                                    <button class="btn btn-outline-warning" type="submit">finalisasi nota</button>
                                </form>
                            </td>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
