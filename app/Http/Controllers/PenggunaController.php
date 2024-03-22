<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PenggunaController extends Controller
{

    private $pengguna;
    private $validation;
    public function __construct(Pengguna $pengguna)
    {
        $this->pengguna = $pengguna;
        $this->validation = [
            'nama' => ['required'],
            'email' => ['required', 'email', Rule::unique('pengguna')],
            'password' => ['required'],
        ];
    }

    public function index(Pengguna $pengguna)
    {
        $data = $pengguna->readData();
        return view('pengguna.index', compact('data'));
    }

    public function create(Request $request, Pengguna $pengguna)
    {
        $request->validate($this->validation);
        $pengguna->createData($request);
        return redirect()->route('pengguna.index');
    }

    public function edit($id, Pengguna $pengguna)
    {
        $check = $pengguna->checkData($id);

        if ($check) {
            $data = $pengguna->editData($id);
            return view('pengguna.edit', compact('data'));
        } else {
            return "Data dengan id  $id tidak ada";
        }
    }

    public function update(Request $request, Pengguna $pengguna)
    {
        $check = $pengguna->checkData($request->id);
        if ($check) {
            $pengguna->updateData($request);
            return redirect()->route('pengguna.index');
        } else {
            return "Data tidak ada";
        }
    }

    public function delete($id, Pengguna $pengguna)
    {
        if ($pengguna->deleteData($id)) {
            return redirect()->route('pengguna.index')->with('berhasil', 'data berhasil dihapus');
        } else {
            return redirect()->route('pengguna.index')->with('gagal', 'data gagal dihapus');
        }
    }
}
