<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DB;
class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data['teams'] = DB::table('teams')
            ->where('active', 1)
            ->paginate(config('app.row'));
        return view('admin::teams.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::teams.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = array(
            'name' => $request->name,
            'position' => $request->position,
            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
            'profile' => $request->profile
        );
        if($request->photo)
        {
            $data['photo'] = $request->file('photo')->store('uploads/teams', 'custom');
        }
        $i = DB::table('teams')->insert($data);
        if($i)
        {
            return redirect('admin/team/create')->with('success', 'Data has been saved!');
        }
        else{
            session()->flash('error', 'Fail to save data!');
            return redirect('admin/team/create')->withInput();
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
        //
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
