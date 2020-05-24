<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DB;
class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['cats']= DB::table('categories')
            ->where('active', 1)
            ->paginate(config('app.row'));
        return view('admin::categories.index', $data);
    }
    public function create()
    {
        return view('admin::categories.create');
    }
    public function store(Request $request)
    {
        $i = DB::table('categories')
            ->insert(['name'=>$request->name]);
        if($i)
        {
            return redirect()->route('category.create')->with('success', 
                'Data has been saved!');
        }
        else{
            return redirect()->route('category.create')
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
        return view('admin::categories.edit', ['cates'=>DB::table('categories')->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $i = DB::table('categories')
            ->insert(['name'=>$request->name]);
            if($i)
            {
                return redirect('admin/categories')->with('success', 'Data has been saved!');
            }
            else{
                sess()->flash('error', 'Fail to save data!');
                return redirect()->route('categories.edit', $id);
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
