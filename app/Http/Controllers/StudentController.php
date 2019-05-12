<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function selectAll()
    {
        $students = DB::select("select * from tblaccount where role = 'student'");
        $message = "null";
        return view('student_manage', ['students' => $students]);
    }

    public function insert(Request $request)
    {
        $username = $request->input('username');
        $fullname = $request->input('fullname');
        $dob = $request->input('dob');
        $pob = $request->input('pob');
        $gender = $request->input('gender');
        $role = "student";
        $password = date('Ymd', strtotime($dob));
        DB::insert('insert into tblaccount (username, password, fullname, dob, pob, gender, role) values (?, ?, ?, ?, ?, ?, ?)', [$username, $password, $fullname, $dob, $pob, $gender, $role]);
        $message = "Thành Công";
        return redirect('students')->with('message', $message);
    }

    public function delete(Request $request)
    {
        $username = $request->input('username');

        DB::delete('delete from tblaccount where username = :username', ['username' => $username]);
        $message = "Thành Công";
        return redirect('students')->with('message', $message);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $username = $request->input('username');
        $fullname = $request->input('fullname');
        $dob = $request->input('dob');
        $pob = $request->input('pob');
        $gender = $request->input('gender');
        $role = "student";
        $password = date('Ymd', strtotime($dob));
        DB::update('update tblaccount set username = ?, fullname = ?, dob = ?, pob = ?, gender = ?, role = ? where id = ?', [$username, $fullname, $dob, $pob, $gender, $role, $id]);
        $message = "Thành Công";
        return redirect('students')->with('message', $message);
    }
}