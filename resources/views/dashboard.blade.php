@extends('layouts.app')

@section('content')
<button class="btn btn-sm btn-success mb-3" id="add-post"><i class="fas fa-paper-plane"></i> Post</button>
    @foreach ($post as $p)
        <div class="card mb-4">
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
                <button class="btn btn-sm btn-success add-comment" data-id="{{$p->id}}" ><i class="fas fa-comment"></i> Comment</button>
                <hr>
                <b>
                    {{$count->where('post_id', $p->id)->count()}}
                     Comment </b>

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
                        @if ($c->number = 2)
                            @break
                        @endif
                    @endif
                @endforeach
                <a href="{{route('post.show', $p->id)}}" style="text-decoration: none">See All Comment</a>
            </div>
        </div>
    @endforeach

      <!-- Modal -->
      <div class="modal fade" id="modal-add-comment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Comment</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{route('comment.store')}}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="text" name="post_id" class="post_id" hidden>
                    @if (!Auth::check())
                        <div class="row">
                            <div class="col-md-auto">
                                <label for="">Your Email</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control email" name="email" id="email">
                                <small>*We will send notification about your comment answers</small>
                            </div>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-auto">
                            <label for="">Comment</label>
                        </div>
                        <div class="col-md">
                            <textarea name="comment" class="form-control" id="comment" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                            <div class="text-right mt-3">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary save-comment" >Save changes</button>
                            </div>

                </form>
            </div>
          </div>
        </div>
      </div>

      {{-- Add New Post --}}
      <div class="modal fade" id="modal-add-post" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add New Post</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{route('post.store')}}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="text" name="post_id" id="post_id" hidden>
                        <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control title" name="title" id="title">
                        </div>

                    <div class="form-group">
                            <label for="">content</label>
                            <textarea name="content" class="form-control content" id="content" cols="30" rows="10"></textarea>
                    </div>
                            <div class="text-right mt-3">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="save-post">Save changes</button>
                            </div>

                </form>
            </div>
          </div>
        </div>
      </div>
@endsection


@section('script')
<script>



    $('.add-comment').on('click', function () {
        $('#modal-add-comment').modal('show')
        var id = $(this).data('id')
        $('.post_id').val(id)
    })

    $('#add-post').on('click', function () {
        data = {{ Auth::check() ? true : false }}
        console.log(data);
        data == 1 ?  $('#modal-add-post').modal('show')  : window.location.href = '/login'
    })
</script>
@endsection
