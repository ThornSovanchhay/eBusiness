@extends('admin::layouts.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <h3><i class="fa fa-user"></i> Create Team</h3>
                </div>
                <div class="col-sm-8">
                    <a href="{{route('team.index')}}" class="btn btn-primary btn-sm float-right">
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
            <form action="{{route('team.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-7">
                        <div class="form-group row">
                            <label class="col-sm-2" for='name'>Name <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" required 
                                    value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2" for='position'>Position</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="position" name="position" 
                                    value="{{old('position')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2" for='facebook'>Facebook</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="facebook" name="facebook" 
                                    value="{{old('facebook')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2" for='linkedin'>Linkedin</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="linkedin" name="linkedin" 
                                    value="{{old('linkedin')}}">
                            </div>
                        </div>
                       
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group row">
                            <label class="col-sm-2" for='photo'>Photo</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="photo" name="photo" 
                                    accept="image/*" onchange="preview(event)">
                                <div style="margin-top: 9px">
                                    <img src="" alt="" width="100" id="img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h3>Profile</h3>
                        <textarea name="profile" id="profile" cols="30" rows="10" 
                            class="form-control">{{old('profile')}}</textarea>
                        <p></p>
                        <p>
                            <button class="btn btn-primary">
                                <i class="fa fa-save"></i> Save
                            </button>
                        </p>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('admin-assets/ckeditor/ckeditor.js')}}"></script>
    <script>
        var roxyFileman = "{{asset('fileman/index.html')}}"; 
        $(function(){
            CKEDITOR.replace( 'profile',{filebrowserBrowseUrl:roxyFileman,
                                        filebrowserImageBrowseUrl:roxyFileman+'?type=image',
                                        removeDialogTabs: 'link:upload;image:upload'}); 
        });
        function preview(evt)
        {
            let img = document.getElementById('img');
            img.src = URL.createObjectURL(evt.target.files[0]);
        }
    </script>
@endsection