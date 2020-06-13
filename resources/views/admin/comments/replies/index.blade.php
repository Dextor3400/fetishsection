<x-admin-master>
    @section('title', 'Replies')
    @section('content')
        <h1 class="h1">Replies</h1>
        <div class="card shadow mb-4">

            @if (Session::has('replyDeletedMessage'))
                <div class="alert alert-danger">{{ Session::get('replyDeletedMessage') }}</div>
            @elseif(Session::has('replyUpdatedMessage'))
                <div class="alert alert-success">{{ Session::get('replyUpdatedMessage') }}</div>
            @endif

            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Replies</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="align-middle">Id</th>
                            <th class="align-middle">Made By</th>
                            <th class="align-middle">Body</th>
                            <th class="align-middle">Created_at</th>
                            <th class="align-middle">Updated_at_at</th>
                            <th class="align-middle">Edit</th>
                            <th class="align-middle"></th>
                            <th class="align-middle"></th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="align-middle">Id</th>
                            <th class="align-middle">Made By</th>
                            <th class="align-middle">Body</th>
                            <th class="align-middle">Created_at</th>
                            <th class="align-middle">Updated_at_at</th>
                            <th class="align-middle">Edit</th>
                            <th class="align-middle"></th>
                            <th class="align-middle"></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($replies as $reply)
                            <tr>
                                <td class="align-middle">{{ $reply->id }}</td>
                                <td class="align-middle"><a href="{{ route('admin.users.show',$reply->user->id) }}">{{ $reply->user->name }}</a></td>
                                <td class="align-middle">{{ $reply->body }}</td>
                                <td class="align-middle">{{ $reply->created_at->diffForHumans() }}</td>
                                <td class="align-middle">{{ $reply->updated_at->diffForHumans() }}</td>
                                <td class="align-middle"><a class="btn btn-success" href="{{ route('admin.replies.edit',$reply) }}">Edit</a></td>
                                <td class="align-middle">
                                    @if ($reply->is_active == 1)
                                        <form action="{{ route('admin.replies.update', $reply->id) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="is_active" value="0">
                                            <div class="form-group">
                                                <button class="btn btn-primary" type="submit">Un-approve</button>
                                            </div>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.replies.update', $reply->id) }}" method="post">
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
                                    <form action="{{ route('admin.replies.destroy',$reply->id) }}" method="post">
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
        <div class="d-flex">
            <div class="mx-auto">
                {{ $replies->links() }}
            </div>
          </div>
    @endsection
</x-admin-master>
