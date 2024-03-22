@extends('layout.layout')
@section('content')

@if (session('berhasil'))
<div class="alert alert-success">{{ session('berhasil') }}</div>
@elseif(session('gagal'))
<div class="alert alert-danger">{{ session('gagal') }}</div>
@endif
<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Produk</h6>
            </div>
            <div class="card-body border-bottom-primary">
                <form class="user" action="{{ route('produk.create') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="nama" id="nama" class="form-control form-control-user"
                            placeholder="Masukkan nama">
                    </div>
                    <div class="form-group">
                        <input type="number" min="0" name="harga" id="harga" class="form-control form-control-user"
                            placeholder="Masukkan harga">
                    </div>
                    <div class="form-group">
                        <input type="number" min="0" name="stok" id="stok" class="form-control form-control-user"
                            placeholder="Masukkan stok">
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <button type="reset" class="btn btn-secondary">
                        Reset
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>{{ $item->stok }}</td>
                            <td>
                                <a href="{{ route('produk.edit', ['id' => $item->id]) }}" class="btn btn-warning mb-1">Edit</a>
                                <form action="{{ route('produk.delete', $item->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger mb-1">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
