@extends('layouts.master')
@section('content')
    <div style="margin-top: 100px">
        <div class="container">
            <h3>Member Login</h3>
            <hr>
            <form action="{{url('front-login/dologin')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(Session::has('success'))
                    <p class="text-success">
                        {{session('success')}}
                    </p>
                @endif
                @if(Session::has('error'))
                    <p class="text-danger">
                        {{session('error')}}
                    </p>
                @endif
                <div class="row">
                    <div class="col-sm-8">
                       
                        <div class="form-group row">
                            <label for="username" class="col-sm-3">Username <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="username" name='username'
                                    value="{{old('username')}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-3">Password <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="password" name='password' required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3"></label>
                            <div class="col-sm-9">
                                <button class="btn btn-primary">Login</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection