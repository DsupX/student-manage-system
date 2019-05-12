<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('username', 'password');

        $user = DB::select('select * from tblaccount', [1]);
    }
}