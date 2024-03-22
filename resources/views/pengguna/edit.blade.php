@extends('layout.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit pengguna</h6>
            </div>
            <div class="card-body border-bottom-primary">
                <form class="user" action="{{ route('pengguna.update') }}" method="POST">
                    @csrf
                    <input value="{{ $data->id }}" type="text" name="id" id="id" readonly hidden>
                    <div class="form-group">
                        <input type="text" value="{{ $data->nama }}" name="nama" id="nama" class="form-control form-control-user"
                            placeholder="Masukkan nama" required>
                    </div>
                    <div class="form-group">
                        <input type="email" value="{{ $data->email }}" name="email" id="email" class="form-control form-control-user"
                            placeholder="Masukkan email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" value="{{ $data->password }}" name="password" id="password" class="form-control form-control-user"
                            placeholder="Masukkan password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <a type="reset" href="{{ route('pengguna.index') }}" class="btn btn-secondary">
                        Back
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
