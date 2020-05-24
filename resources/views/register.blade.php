@extends('layouts.master')
@section('content')
    <div style="margin-top: 100px">
        <div class="container">
            <h3>Member Register</h3>
            <hr>
            <form action="{{url('register/save')}}" method="POST" enctype="multipart/form-data">
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
                            <label for="name" class="col-sm-3">Full Name <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name='name' 
                                    value="{{old('name')}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3">Email <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="email" name='email'
                                    value="{{old('email')}}" required>
                            </div>
                        </div>
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
                            <label for="cpassword" class="col-sm-3">Confirm Password <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="cpassword" name='cpassword' required>
                            </div>
                        </div>
                       
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group row">
                            <label for="photo" class="col-sm-2">Photo</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="photo" name='photo'
                                    accept="image/*">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2"></label>
                            <div class="col-sm-10">
                                <button class="btn btn-primary">Register</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection