@extends('admin::layouts.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <h3><i class="fa fa-star"></i> Edit Portfolio</h3>
                </div>
                <div class="col-sm-8">
                    <a href="{{route('portfolio.index')}}" class="btn btn-primary btn-sm float-right">
                        <i class="fa fa-reply"></i> Back
                    </a>
                </div>
            </div>
            <hr>
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p>
                        {{session('success')}}
                    </p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <p>
                        {{session('error')}}
                    </p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                   <ul>
                       @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                       @endforeach
                   </ul>
                </div>
            @endif
            <form action="{{route('portfolio.update', $port->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-sm-7">
                        <div class="form-group row">
                            <label class="col-sm-2" for='title'>Title <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="title" required 
                                    value="{{$port->title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2" for='category'>Category <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="category" id="category" class="form-control" required>
                                    <option value="">--Select one--</option>
                                    @foreach($cats as $c)
                                        <option value="{{$c->id}}" {{$port->category_id==$c->id?'selected':''}}>{{$c->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group row">
                            <label class="col-sm-2">Photo</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name='photo' accept="image/*">
                                <div style="margin-top: 12px">
                                    <img src="{{asset($port->photo)}}" alt="" width="120">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2"></label>
                            <div class="col-sm-10">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-save"></i> Save
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

