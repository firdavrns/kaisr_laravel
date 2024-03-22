@extends('layout.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Pelanggan</h6>
            </div>
            <div class="card-body border-bottom-primary">
                <form class="user" action="{{ route('pelanggan.update') }}" method="POST">
                    @csrf
                    <input value="{{ $data->id }}" type="text" name="id" id="id" readonly hidden>
                    <div class="form-group">
                        <input type="text" value="{{ $data->nama }}" name="nama" id="nama" class="form-control form-control-user"
                            placeholder="Masukkan nama">
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{ $data->alamat }}" name="alamat" id="alamat" class="form-control form-control-user"
                            placeholder="Masukkan alamat">
                    </div>
                    <div class="form-group">
                        <input type="number" value="{{ $data->nomor_telepon }}" min="0" name="nomor_telepon" id="nomor_telepon" class="form-control form-control-user"
                            placeholder="Masukkan no. telp">
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <a type="reset" href="{{ route('pelanggan.index') }}" class="btn btn-secondary">
                        Back
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
