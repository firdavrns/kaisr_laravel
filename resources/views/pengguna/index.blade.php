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
                <h6 class="m-0 font-weight-bold text-primary">Tambah pengguna</h6>
            </div>
            <div class="card-body border-bottom-primary">
                <form class="user" action="{{ route('pengguna.create') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="nama" id="nama" class="form-control form-control-user"
                            placeholder="Masukkan nama" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control form-control-user"
                            placeholder="Masukkan email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control form-control-user"
                            placeholder="Masukkan password">
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
        <h6 class="m-0 font-weight-bold text-primary">Data pengguna</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Peran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->peran }}</td>
                            <td>
                                <a href="{{ route('pengguna.edit', ['id' => $item->id]) }}" class="btn btn-warning mb-1">Edit</a>
                                <form action="{{ route('pengguna.delete', $item->id) }}" method="POST">
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
