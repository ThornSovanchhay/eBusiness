@extends('admin::layouts.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <h3><i class="fa fa-star"></i> Edit Post</h3>
                </div>
                <div class="col-sm-8">
                    <a href="{{route('post.index')}}" class="btn btn-primary btn-sm float-right">
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
            <form action="{{route('post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group row">
                            <label class="col-sm-3" for='title'>Title <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title" name="title" required 
                                    value="{{old('title')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3" for='short_description'>Short Description <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea name="short_description" id="short_description" 
                                    cols="30" rows="2" class="form-control"></textarea>
                            </div>
                        </div>
                       
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group row">
                            <label class="col-sm-3" for='Photo'>Photo <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name='photo' id='photo' 
                                    accept="image/*" required onchange="preview(event)">
                                <div style="margin-top: 12px">
                                    <img src="" alt="" id='img' width="100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <textarea name="description" id="description" class="form-control" 
                            cols="30" rows="10"></textarea>
                        <p></p>
                        <p>
                            <button class="btn btn-primary btn-sm">
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
            CKEDITOR.replace( 'description',{filebrowserBrowseUrl:roxyFileman,
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

