<x-admin-master>
    @section('title', 'Post')
    @section('content')
        <h1 class="h1">Post</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">User Post</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="align-middle">Id</th>
                            <th class="align-middle">Owned By</th>
                            <th class="align-middle">Title</th>
                            <th class="align-middle">Post Content</th>
                            <th class="align-middle">Image</th>
                            <th class="align-middle">Created_at</th>
                            <th class="align-middle">Updated_at</th>
                            <th class="align-middle">Edit</th>
                            <th class="align-middle">Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="align-middle">Id</th>
                            <th class="align-middle">Owned By</th>
                            <th class="align-middle">Title</th>
                            <th class="align-middle">Post Content</th>
                            <th class="align-middle">Image</th>
                            <th class="align-middle">Created_at</th>
                            <th class="align-middle">Updated_at</th>
                            <th class="align-middle">Edit</th>
                            <th class="align-middle">Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td class="align-middle">{{ $post->id }}</td>
                            <td class="align-middle">{{ $post->user->name }}</td>
                            <td class="align-middle">{{ $post->title }}</td>
                            <td class="align-middle">{{ $post->body }}</td>
                            <td class="align-middle">
                                <img height="40px" src="{{ $post->post_image }}"  alt="Post Image" srcset="">
                            </td>
                            <td class="align-middle">{{ $post->created_at->diffForHumans() }}</td>
                            <td class="align-middle">{{ $post->updated_at->diffForHumans() }}</td>
                            <td class="align-middle"><a class="btn btn-primary" href="{{ route('admin.posts.edit',$post->id) }}">Edit</a></td>
                            <td class="align-middle">
                                <form action="{{ route('admin.posts.destroy',$post->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
</x-admin-master>
