<x-admin-master>
    @section('title', 'Comments')
    @section('content')
        <h1 class="h1">Comments</h1>
        <div class="card shadow mb-4">

            @if (Session::has('commentDeletedMessage'))
                <div class="alert alert-danger">{{ Session::get('commentDeletedMessage') }}</div>
            @elseif(Session::has('commentUpdatedMessage'))
                <div class="alert alert-success">{{ Session::get('commentUpdatedMessage') }}</div>
            @endif

            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Comments</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="align-middle">Id</th>
                            <th class="align-middle">Made By</th>
                            <th class="align-middle">Post</th>
                            <th class="align-middle">Body</th>
                            <th class="align-middle">Created_at</th>
                            <th class="align-middle">Updated_at_at</th>
                            <th class="align-middle">Number Of Replies</th>
                            <th class="align-middle">View Replies</th>
                            <th class="align-middle"></th>
                            <th class="align-middle"></th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="align-middle">Id</th>
                            <th class="align-middle">Made By</th>
                            <th class="align-middle">Post</th>
                            <th class="align-middle">Body</th>
                            <th class="align-middle">Created_at</th>
                            <th class="align-middle">Updated_at_at</th>
                            <th class="align-middle">Number Of Replies</th>
                            <th class="align-middle">View Replies</th>
                            <th class="align-middle"></th>
                            <th class="align-middle"></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($comments as $comment)
                            <tr>
                                <td class="align-middle">{{ $comment->id }}</td>
                                <td class="align-middle"><a href="{{ route('admin.users.show',$comment->user->id) }}">{{ $comment->user->name }}</a></td>
                                <td class="align-middle"><a href="{{ route('admin.posts.show',$comment->post_id) }}">View Post</a></td>
                                <td class="align-middle">{{ $comment->body }}</td>
                                <td class="align-middle">{{ $comment->created_at->diffForHumans() }}</td>
                                <td class="align-middle">{{ $comment->updated_at->diffForHumans() }}</td>
                                <td class="align-middle">{{ count($comment->replies) }}</td>
                                <td class="align-middle"><a href="{{ route('admin.replies.show',$comment->id) }}">View Replies</a></td>
                                <td class="align-middle">
                                    @if ($comment->is_active == 1)
                                        <form action="{{ route('admin.comments.update', $comment->id) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="is_active" value="0">
                                            <div class="form-group">
                                                <button class="btn btn-primary" type="submit">Un-approve</button>
                                            </div>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.comments.update', $comment->id) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="is_active" value="1">
                                            <div class="form-group">
                                                <button class="btn btn-warning" type="submit">Approve</button>
                                            </div>
                                        </form>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    <form action="{{ route('admin.comments.destroy',$comment->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
</x-admin-master>
