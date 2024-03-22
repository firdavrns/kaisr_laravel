@extends('layout.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Produk</h6>
            </div>
            <div class="card-body border-bottom-primary">
                <form class="user" action="{{ route('produk.update') }}" method="POST">
                    @csrf
                    <input value="{{ $data->id }}" type="text" name="id" id="id" readonly hidden>
                    <div class="form-group">
                        <input type="text" value="{{ $data->nama }}" name="nama" id="nama" class="form-control form-control-user"
                            placeholder="Masukkan nama">
                    </div>
                    <div class="form-group">
                        <input type="number" value="{{ $data->harga }}" min="0" name="harga" id="harga" class="form-control form-control-user"
                            placeholder="Masukkan harga">
                    </div>
                    <div class="form-group">
                        <input type="number" value="{{ $data->stok }}" min="0" name="stok" id="stok" class="form-control form-control-user"
                            placeholder="Masukkan stok">
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <a type="reset" href="{{ route('produk.index') }}" class="btn btn-secondary">
                        Back
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
