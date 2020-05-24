<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    public function index()
    {
        $data['slides'] = DB::table('slides')
            ->where('active', 1)
            ->orderBy('sequence')
            ->get();

        $data['about'] = DB::table('abouts')->find(1);
        
        $data['services'] = DB::table('services')
            ->where('active', 1)
            ->get();
        $data['teams'] = DB::table('teams')
            ->where('active', 1)
            ->get();
        $data['cats'] = DB::table('categories')
            ->where('active', 1)
            ->get();
        $data['ports'] = DB::table('portfolios')
            ->join('categories', 'portfolios.category_id', 'categories.id')
            ->where('portfolios.active', 1)
            ->select('portfolios.*', 'categories.name')
            ->get();

        $data['posts'] = DB::table('posts')
            ->orderBy('create_at', 'desc')
            ->limit(6)
            ->get();

        return view('index', $data);
    }

    public function post($id)
    {
        $data['post'] = DB::table('posts')->find($id);

        $data['coms'] = DB::table('comments')
            ->join('members', 'comments.member_id', 'members.id')
            ->where('comments.post_id', $id)
            ->select('comments.*', 'members.name', 'members.photo')
            ->get();

        return view('page', $data);
    }
    public function save_comment(Request $r)
    {
        $m = session()->get('member');
        $data = array(
            'post_id' => $r->post_id,
            'member_id' => $m->id,
            'message' => $r->message
        );
        DB::table('comments')->insert($data);
        return redirect('post/'.$r->post_id);
    }
}
