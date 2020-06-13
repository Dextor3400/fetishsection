<x-admin-master>
    @section('title', 'All Users')
    @section('content')
        <h1 class="h1">Users</h1>
        <div class="card shadow mb-4">

            @if (Session::has('userDeletedMessage'))
                <div class="alert alert-danger">{{ Session::get('userDeletedMessage') }}</div>
            @endif

            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Users</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="align-middle">Id</th>
                            <th class="align-middle">Username</th>
                            <th class="align-middle">Name</th>
                            <th class="align-middle">Avatar</th>
                            <th class="align-middle">Email</th>
                            <th class="align-middle">Created_At</th>
                            <th class="align-middle">Updated_At</th>
                            <th class="align-middle">View</th>
                            <th class="align-middle">Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="align-middle">Id</th>
                            <th class="align-middle">Username</th>
                            <th class="align-middle">Name</th>
                            <th class="align-middle">Avatar</th>
                            <th class="align-middle">Email</th>
                            <th class="align-middle">Created_At</th>
                            <th class="align-middle">Updated_At</th>
                            <th class="align-middle">View</th>
                            <th class="align-middle">Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="align-middle">{{ $user->id }}</td>
                                <td class="align-middle">{{ $user->username }}</td>
                                <td class="align-middle">{{ $user->name }}</td>
                                <td class="align-middle">
                                    <img width="50px" src="{{ $user->avatar }}" alt="user-avatar">
                                </td>
                                <td class="align-middle">{{ $user->email }}</td>
                                <td class="align-middle">{{ $user->created_at->diffForHumans() }}</td>
                                <td class="align-middle">{{ $user->updated_at->diffForHumans() }}</td>
                                <td class="align-middle">
                                    <a class="btn btn-primary" href="{{ route('admin.users.show',$user->id) }}">View</a>
                                </td>
                                <td class="align-middle">
                                    <form action="{{ route('admin.users.destroy',$user->id) }}" method="post">
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
                {{ $users->links() }}
            </div>
          </div>
    @endsection
</x-admin-master>
