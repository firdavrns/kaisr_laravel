<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $auth;
    private $valdation;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
        $this->valdation = [
            'email' => ['required', 'email'],
            'password' => ['required']
        ];
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $dataExist = $this->auth->loginProcess($request);

        if ($dataExist) {
            return redirect()->route('dashboard.index');
        } else {
            $pesan = [
                'status' => 'gagal',
                'pesan' => 'Masuk gagal'
            ];

            session()->flash('pesan', $pesan);
            return redirect()->route('auth.login');
        }

    }

    public function logoutProcess()
    {
        session()->forget('user');
        return redirect()->route('auth.login');
    }
}
