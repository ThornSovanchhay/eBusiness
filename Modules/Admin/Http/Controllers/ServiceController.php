<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DB;
class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['services'] = DB::table('services')
            ->where('active', 1)
            ->paginate(config('app.row'));
        return view('admin::services.index', $data);
    }

    public function create()
    {
        return view('admin::services.create');
    }
   
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $data = array(
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon
        );
        $i = DB::table('services')->insert($data);
        if($i)
        {
            return redirect()->route('service.create')
                ->with('success', 'Data has been saved!');
        }
        else{
            session()->flash('error', 'Fail to save data!');
            return redirect()->route('service.create')
                ->withInput();
        }
    }


    public function delete($id)
    {
        DB::table('services')
            ->where('id', $id)
            ->update(['active'=>0]);
        return redirect()->route('service.index')
            ->with('success', 'Data has been removed!');
    }

    public function edit($id)
    {
        $data['service'] = DB::table('services')->find($id);
        return view('admin::services.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $data = array(
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon
        );
        $i = DB::table('services')
            ->where('id', $id)
            ->update($data);
        if($i)
        {
            return redirect()->route('service.index')
                ->with('success', 'Data has been saved!');
        }
        else{
            session()->flash('error', 'Fail to save data!');
            return redirect()->route('service.edit', $id)
                ->withInput();
        }
    }

}
