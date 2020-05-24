<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }
    public function save(Request $r)
    {
        $data = array(
            'name' => $r->name,
            'username' => $r->username,
            'email' => $r->email,
            'password' => bcrypt($r->password)
        );
        if($r->password!=$r->cpassword)
        {
            session()->flash('error', 'Password and confirm password is not matched!');
            return redirect('register')->withInput();
        }
        if($r->photo)
        {
            $data['photo'] = $r->file('photo')->store('uploads/members', 'custom');
        }
        $i = DB::table('members')->insert($data);
        if($i)
        {
            return redirect('register')
                ->with('success', 'Success, you can go to login now!');
        }
        else{
            session()->flash('error','Fail to register, please try again!');
            return redirect('register')->withInput();
        }
    }
}
