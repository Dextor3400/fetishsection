<x-admin-master>
    @section('title', 'Posts')
    @section('content')
        <h1 class="h1">Posts</h1>
        <div class="card shadow mb-4">

            @if (Session::has('postDeletedMessage'))
                <div class="alert alert-danger">{{ Session::get('postDeletedMessage') }}</div>
            @elseif(Session::has('postCreatedMessage'))
                <div class="alert alert-success">{{ Session::get('postCreatedMessage') }}</div>
            @endif

            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">User Posts</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="align-middle">Id</th>
                            <th class="align-middle">Owned By</th>
                            <th class="align-middle">Title</th>
                            <th class="align-middle">Image</th>
                            <th class="align-middle">Created_at</th>
                            <th class="align-middle">Updated_at</th>
                            <th class="align-middle">Number of Comments</th>
                            <th class="align-middle">Comments</th>
                            <th class="align-middle">Edit</th>
                            <th class="align-middle">Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="align-middle">Id</th>
                            <th class="align-middle">Owned By</th>
                            <th class="align-middle">Title</th>
                            <th class="align-middle">Image</th>
                            <th class="align-middle">Created_at</th>
                            <th class="align-middle">Updated_at</th>
                            <th class="align-middle">Number of Comments</th>
                            <th class="align-middle">Comments</th>
                            <th class="align-middle">Edit</th>
                            <th class="align-middle">Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td class="align-middle">{{ $post->id }}</td>
                                <td class="align-middle">{{ $post->user->name }}</td>
                                <td class="align-middle"><a href="{{ route('admin.posts.show',$post->id) }}">{{ $post->title }}</a></td>
                                <td class="align-middle">
                                    <img height="40px" src="{{ $post->post_image }}"  alt="Post Image" srcset="">
                                </td>
                                <td class="align-middle">{{ $post->created_at->diffForHumans() }}</td>
                                <td class="align-middle">{{ $post->updated_at->diffForHumans() }}</td>
                                <td class="align-middle">{{ count($post->comments) }}</td>
                                <td class="align-middle"><a href="{{ route('admin.comments.show',$post->id) }}">View Comments</a></td>
                                <td class="align-middle"><a class="btn btn-primary" href="{{ route('admin.posts.edit',$post->id) }}">Edit</a></td>
                                <td class="align-middle">
                                    <form action="{{ route('admin.posts.destroy',$post->id) }}" method="post">
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
                {{ $posts->links() }}
            </div>
          </div>
    @endsection
</x-admin-master>
