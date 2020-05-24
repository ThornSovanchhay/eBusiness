@extends('layouts.master')
@section('content')
    <div style="margin-top: 100px">
        <div class="container">
            <h3>{{$post->title}}</h3>
            <hr>
            {!! $post->description !!}

            <h4 contenteditable="true">Comments</h4>
            <hr>
            <?php $total = 0; ?>
            <?php
                if($coms!=null)
                {
                    $total = count($coms);
                }
            ?>
            <p>
                {{$total}} comments
            </p>
            @foreach($coms as $com)
                <strong>{{$com->name}}</strong>
                <blockquote>
                    {{$com->message}}
                </blockquote>
            @endforeach
            @if(Session::has('member'))
                <form action="{{url('comment/save')}}" method="POST">
                    @csrf
                    <input type="hidden" name='post_id' value="{{$post->id}}">
                   <div class="row">
                       <div class="col-sm-5">
                           <input type="text" class="form-control" name="message">
                       </div>
                       <div class="col-sm-2">
                           <button class="btn btn-primary">Comment</button>
                       </div>
                   </div>
                </form>
            @endif
            @if(!Session::has('member'))
                <a href="{{url('front-login')}}">Please login to comment!</a>
            @endif
            
        </div>
    </div>
    <p>&nbsp;</p>
@endsection