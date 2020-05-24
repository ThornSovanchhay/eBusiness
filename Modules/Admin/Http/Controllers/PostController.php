<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DB;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data['posts'] = DB::table('posts')
            ->where('active', 1)
            ->orderBy('create_at', 'desc')
            ->paginate(config('app.row'));

        return view('admin::posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::posts.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = array(
            'title' => $request->title,
            'short_description' => $request->short_description,
            'description' => $request->description
        );
        if($request->photo)
        {
            $data['photo'] = $request->file('photo')->store('uploads/posts', 'custom');
        }
        $i = DB::table('posts')->insert($data);
        if($i)
        {
            return redirect('admin/post/create')
                ->with('success', 'Data has been saved!');
        }
        else
        {
            return redirect('admin/post/create')
                ->with('error', 'Fail to save data!');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('admin::posts.edit', ['post'=>DB::table('posts')->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $data = array(
            'title' => $request->title,
            'short_description' => $request->short_description,
            'description' => $request->description
        );
        if($request->photo)
        {
            $data['photo'] = $request->file('photo')->store('uploads/posts', 'custom');
        }
        $i = DB::table('posts')
            ->where('id', $id)
            ->update($data);
        if($i)
        {
            return redirect('admin/posts')->with('success', 'Data has been saved!');
        }
        else{
            sess()->flash('error', 'Fail to save data!');
            return redirect()->route('posts.edit', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
