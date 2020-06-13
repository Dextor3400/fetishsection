<x-user-master>
    @section('title', 'Post')
    @section('content')
        <h4 class="border-top border-bottom border-light h4 py-3 text-center text-md-left">{{ $post->title }}</h4>
            <section class="col-12 my-5">
                <article class="row my-4 pb-4 text-center text-lg-left border-bottom border-light">
                    <div class="col-12 col-lg-6 col-xl-5">
                        @if(!$post->post_image === null)
                            <img src="{{ $post->post_image }}" alt="user-image" class="img-fluid" alt="post-image">
                        @else
                            <img src="https://picsum.photos/500/300" class="img-fluid" alt="post-image">
                        @endif
                    </div>
                    <div class="col-12 col-lg-6 col-xl-7">
                        <small>{{ $post->created_at->diffForHumans() }}</small>
                        <p>{!! $post->body !!}</p>
                    </div>
                </article>
            </section>
            @if (Session::has('commentCreatedMessage'))
                <div class="alert alert-success">{{ Session::get('commentCreatedMessage') }}</div>
            @elseif(Session::has('commentUpdatedMessage'))
                <div class="alert alert-success">{{ Session::get('commentUpdatedMessage') }}</div>
            @elseif(Session::has('commentDeletedMessage'))
                <div class="alert alert-danger">{{ Session::get('commentDeletedMessage') }}</div>
            @elseif(Session::has('replyUpdatedMessage'))
                <div class="alert alert-success">{{ Session::get('replyUpdatedMessage') }}</div>
            @elseif(Session::has('replyDeletedMessage'))
                <div class="alert alert-danger">{{ Session::get('replyDeletedMessage') }}</div>
            @elseif(Session::has('reply_message'))
                <div class="alert alert-success">{{ Session::get('reply_message') }}</div>
            @endif
            <section class="col-12 col-lg-8 col-xl-10">
                <div class="row bootstrap snippets">
                    <div class="comment-wrapper">
                        <div class="panel panel-info">
                            <div class="">
                                <form action="{{route('comments.store')}}" method="post">
                                    @csrf
                                    @method('post')
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <div class="form-group">
                                        <label for="body">Comment Section:</label>
                                        <textarea name="body" class="form-control" rows="3" placeholder="Leave a comment..."></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </form>
                                <hr>
                                @foreach ($comments as $comment)
                                    @if($comment->is_active == 1)
                                        @if(count($comment->replies)<=0)
                                        <div class="media-list pl-0">
                                            <div class="media">
                                                <a href="#" class="pull-left">
                                                    @if(!$comment->user->avatar === null)
                                                        <img src="{{ $comment->user->avatar }}" alt="user-image" class="img-circle">
                                                    @else
                                                        <img src="https://www.artistboat.org/wp-content/uploads/2017/01/blank-user.gif" alt="" class="img-circle">
                                                    @endif
                                                </a>
                                                <div class="ml-2 media-body">
                                                    <span class="text-muted pull-right">
                                                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                                    </span>
                                                    <strong class="text-success">{{ $comment->user->name }}</strong>
                                                    <!--COMMENT-->
                                                    <p>
                                                        {{ $comment->body }}
                                                    </p>
                                                    <div class="comment-reply-container">
                                                        <div class="d-flex ">
                                                            @if($comment->user->id == auth()->user()->id)
                                                            <form action="{{ route('comments.destroy',$comment->id) }}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="btn btn-danger" role="btn">Delete</button>
                                                            </form>
                                                            <!--EDIT TOGGLER-->
                                                            <a class="edit-toggler btn btn-primary ml-1 mb-1" role='button' type="button" data-toggle="collapse" data-target="#edit{{ $comment->id }}">Edit</a>
                                                            @endif
                                                            <!--REPLY TOGGLER-->
                                                            <a class="reply-toggler btn btn-primary ml-1 mb-1" role='button' type="button" data-toggle="collapse" data-target="#reply{{ $comment->id }}">Reply</a>
                                                        </div>
                                                    <!--EDIT TOGGLE-->
                                                    <div class="collapse toggle-edit" id="edit{{ $comment->id }}">
                                                        <form method="POST" action="{{ route('comments.update',$comment->id) }}">
                                                            @csrf
                                                            @method('put')
                                                            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                                            <div class="form-group">
                                                                <textarea type="text" name="body" class="form-control @error('body') is-invalid @enderror" aria-describedby="bodyHelp" placeholder="Enter body">{{ $comment->body }}</textarea>
                                                                @error('body')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <button type="submit" class="btn btn-primary">Send</button>
                                                        </form>
                                                    </div>
                                                    <!--REPLY TOGGLE-->
                                                    <div class="collapse toggle-reply" id="reply{{ $comment->id }}">
                                                    <form action="{{ route('replies.store') }}" method="post">
                                                        @csrf
                                                        <div class="form-group">
                                                            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                                            <label for="body"></label>
                                                            <textarea class="form-control" name="body" id="" cols="30" rows="1"></textarea>
                                                            <button class="btn btn-primary" role='button' type="submit">Send</button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="media-list pl-0">
                                            <div class="media">

                                                <a href="#" class="pull-left">
                                                    @if(!$comment->user->avatar === null)
                                                        <img src="{{ $comment->user->avatar }}" alt="user-image" class="img-circle">
                                                    @else
                                                        <img src="https://www.artistboat.org/wp-content/uploads/2017/01/blank-user.gif" alt="" class="img-circle">
                                                    @endif
                                                </a>
                                                <div class="ml-2 media-body">
                                                    <span class="text-muted pull-right">
                                                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                                    </span>
                                                    <strong class="text-success">{{ $comment->user->name }}</strong>
                                                    <p>{{ $comment->body }}</p>
                                                    <div class="comment-reply-container">
                                                        <div class="d-flex ">
                                                            @if($comment->user->id == auth()->user()->id)
                                                            <form action="{{ route('comments.destroy',$comment->id) }}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="btn btn-danger" role="btn">Delete</button>
                                                            </form>
                                                            <!--EDIT TOGGLER-->
                                                            <a class="edit-toggler btn btn-primary ml-1 mb-1" role='button' type="button" data-toggle="collapse" data-target="#edit{{ $comment->id }}">Edit</a>
                                                            @endif
                                                            <!--REPLY TOGGLER-->
                                                            <a class="reply-toggler btn btn-primary ml-1 mb-1" role='button' type="button" data-toggle="collapse" data-target="#reply{{ $comment->id }}">Reply</a>
                                                        </div>
                                                        <!--EDIT TOGGLE-->
                                                    <div class="collapse toggle-edit" id="edit{{ $comment->id }}">
                                                        <form method="POST" action="{{ route('comments.update',$comment->id) }}">
                                                            @csrf
                                                            @method('put')
                                                            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                                            <div class="form-group">
                                                                <textarea type="text" name="body" class="form-control @error('body') is-invalid @enderror" aria-describedby="bodyHelp" placeholder="Enter body">{{ $comment->body }}</textarea>
                                                                @error('body')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <button type="submit" class="btn btn-primary">Send</button>
                                                        </form>
                                                    </div>
                                                    <div class="collapse toggle-reply " id="reply{{ $comment->id }}">
                                                    <form action="{{ route('admin.replies.store') }}" method="post">
                                                        @csrf
                                                        <div class="form-group">
                                                            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                                            <label for="body"></label>
                                                            <textarea class="form-control" name="body" id="" cols="30" rows="1"></textarea>
                                                            <button class="btn btn-primary" type="submit">Send</button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                    </div>

                                                    <!--ANSWER-->
                                                    @foreach ($comment->replies as $reply)
                                                    @if($reply->is_active == 1)
                                                    <div class="media mt-2">
                                                        @if(!$comment->user->avatar === null)
                                                            <img src="{{ $reply->user->avatar }}" alt="user-image" class="img-circle mr-2">
                                                        @else
                                                            <img src="https://www.artistboat.org/wp-content/uploads/2017/01/blank-user.gif" alt="" class="img-circle mr-2">
                                                        @endif
                                                        <div class="media-body">
                                                            <span class="text-muted pull-right">
                                                                <small class="text-muted">{{ $reply->created_at->diffForHumans() }}</small>
                                                            </span>
                                                            <strong class="text-success">{{ $reply->user->name }}</strong>
                                                            <p>{{ $reply->body }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="comment-reply-container">
                                                        <div class="d-flex ">
                                                            @if($reply->user->id == auth()->user()->id)
                                                            <form action="{{ route('replies.destroy',$reply->id) }}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="btn btn-danger" role="btn">Delete</button>
                                                            </form>
                                                            <!--EDIT TOGGLER-->
                                                            <a class="reply-edit-toggler btn btn-primary ml-1 mb-1" role='button' type="button" data-toggle="collapse" data-target="#editreply{{ $reply->id }}">Edit</a>
                                                            @endif
                                                        </div>
                                                    <!--EDIT TOGGLE-->
                                                    <div class="collapse toggle-reply-edit" id="editreply{{ $reply->id }}">
                                                        <form method="POST" action="{{ route('replies.update',$reply->id) }}">
                                                            @csrf
                                                            @method('put')
                                                            <input type="hidden" name="reply_id" value="{{ $reply->id }}">
                                                            <div class="form-group">
                                                                <textarea type="text" name="body" class="form-control @error('body') is-invalid @enderror" aria-describedby="bodyHelp" placeholder="Enter body">{{ $reply->body }}</textarea>
                                                                @error('body')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <button type="submit" class="btn btn-primary">Send</button>
                                                        </form>
                                                    </div>
                                                    </div>

                                                    @endif
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    @endsection
</x-user-master>
