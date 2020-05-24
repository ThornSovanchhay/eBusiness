<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class LoginController extends Controller
{
    public function index()
    {
        return view('front-login');
    }
    public function do_login(Request $r)
    {
        $username = $r->username;
        $pass = $r->password;
        $member = DB::table('members')
            ->where('username', $username)
            ->first();
        if($member==null)
        {
            session()->flash('error', 'Invalid username or password!');
            return redirect('front-login')
                ->withInput();
        }
        else
        {
            if(password_verify($pass, $member->password))
            {
                session()->put('member', $member);
                return redirect('/');
            }
            else{

                session()->flash('error', 'Invalid username or password!');
                return redirect('front-login')
                    ->withInput();
            }
        }
    }
    public function logout()
    {
        session()->forget('member');
        session()->flush();
        return redirect('/');
    }
}
