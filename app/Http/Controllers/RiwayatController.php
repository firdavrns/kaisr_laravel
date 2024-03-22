<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    private $riwayat;
    public function __construct(Riwayat $riwayat)
    {
        $this->riwayat = $riwayat;
    }

    public function index()
    {
        $data = $this->riwayat->getData();
        return view('riwayat.index', compact('data'));
    }

}
