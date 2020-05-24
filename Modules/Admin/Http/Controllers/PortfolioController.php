<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DB;
class PortfolioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['portfolios'] = DB::table('portfolios')
            ->join('categories', 'portfolios.category_id', 'categories.id')
            ->where('portfolios.active', 1)
            ->select('portfolios.*', 'categories.name')
            ->paginate(config('app.row'));
        return view('admin::portfolios.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['cats'] = DB::table('categories')
            ->where('active', 1)
            ->get();
        return view('admin::portfolios.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required'
        ]);
        $data = array(
            'title' => $request->title,
            'category_id' => $request->category
        );
        if($request->photo)
        {
            $data['photo'] = $request->file('photo')->store('uploads/portfolios', 'custom');
        }
        $i = DB::table('portfolios')->insert($data);
        if($i)
        {
            return redirect()->route('portfolio.create')
                ->with('success', 'Data has been saved!');
        }
        else{
            session()->flash('error', 'Fail to save data!');
            return redirect()->route('portfolio.create')
                ->withInput();
        }
    }

  
    public function edit($id)
    {
        $data['cats'] = DB::table('categories')
            ->where('active', 1)
            ->get();
        $data['port'] = DB::table('portfolios')->find($id);
        return view('admin::portfolios.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required'
        ]);
        $data = array(
            'title' => $request->title,
            'category_id' => $request->category
        );
        $port = DB::table('portfolios')->find($id);
        if($request->photo)
        {
            $data['photo'] = $request->file('photo')->store('uploads/portfolios', 'custom');
            @unlink($port->photo);
        }
        $i = DB::table('portfolios')
            ->where('id', $id)
            ->update($data);
        if($i)
        {
            return redirect()->route('portfolio.index')
                ->with('success', 'Data has been saved!');
        }
        else{
            return redirect()->route('portfolio.edit', $id)
                ->with('error', 'Fail to save change!');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function delete($id)
    {
        DB::table('portfolios')
            ->where('id', $id)
            ->update(['active'=>0]);
        return redirect()->route('portfolio.index')
            ->with('success', 'Data has been removed!');
    }
}
