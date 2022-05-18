@extends('layouts.app')

@section('content')
<a href="{{ route('post.index')}}" class="">
    <i class="fas fa-arrow-circle-left fa-2x mb-2" style="color: rgb(109, 109, 109)"></i>
</a>
@foreach ($post as $p)
<div class="card">
    <div class="card-body">
        <div class="row">
            <input type="text" name="" id="" value="{{$p->id}}" hidden>
            <div class="col-md-auto">
                <img src="https://placeimg.com/480/480/any"  class="img-fluid" style="clip-path: circle(); max-height: 50px" alt="">
            </div>
            <div class="col" >
                <b>{{ $p->user->name }}</b>
                <p class="text-disabled"> {{$p->user->email}} </p>
            </div>

        </div>
        <h5 class="card-title">{{ $p->title }}</h5>
        <p class="card-text">{{ $p->content }}</p>
        <button class="btn btn-sm btn-success" data-id="{{$p->id}}" id="add-comment"> Comment</button>
        <hr>
        <b> All Comment </b>
        <hr>
        @foreach ($comment as $c)
            @if ($c->post_id == $p->id)
                <div class="row">
                    <div class="col-md-auto">
                        <b>{{ $c->name }}</b>
                        <p class="text-disabled"> {{$c->email}} </p>
                    </div>
                    <div class="col">
                        <p>{{ $c->comment }}</p>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
@endforeach

@endsection
