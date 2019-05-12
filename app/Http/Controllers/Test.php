<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;



class Test extends Controller
{
    public function index()
    {
        $user = DB::select('select * from tblaccount', [1]);
        return view('test', ['user' => $user]);
    }
}