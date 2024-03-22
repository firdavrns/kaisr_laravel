<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Auth extends Model
{
    use HasFactory;

    protected $table = 'pengguna';

    public function loginProcess($request)
    {
        $data = DB::table($this->table)
        ->where('email', $request->email)
        ->where('password', md5($request->password))
        ->first();

        if ($data) {
            session(['user' => $data]);
            return true;
        } else {
            return false;
        }
    }

    
}
