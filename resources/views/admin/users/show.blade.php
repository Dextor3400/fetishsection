<x-admin-master>
    @section('title', 'User Profile')
    @section('content')
        <h1 class="h1">User Profile</h1>

        <div class="col-sm-6">
            <form method="POST" action="{{ route('admin.users.update',$user) }}" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="mb-4">
                    <img width="200px" src="{{ $user->avatar }}" alt="">
                </div>
                <div class="form-group">
                    <input type="file" name="avatar" readonly>
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"" value="{{ $user->username }}" readonly>
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" readonly>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"" value="{{ $user->email }}" readonly>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"" value="" readonly>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror"" value="" readonly>
                    @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-md-8 col-lg-12 mx-auto">
            <div class="col-sm-12">
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="align-middle">Options</th>
                            <th class="align-middle">Id</th>
                            <th class="align-middle">Name</th>
                            <th class="align-middle">Slug</th>
                            <th class="align-middle">Attach</th>
                            <th class="align-middle">Detach</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="align-middle">Options</th>
                            <th class="align-middle">Id</th>
                            <th class="align-middle">Name</th>
                            <th class="align-middle">Slug</th>
                            <th class="align-middle">Attach</th>
                            <th class="align-middle">Detach</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td class="align-middle"><input type="checkbox"
                                    @foreach ($user->roles as $user_role)
                                            @if($user_role->slug == $role->slug)
                                                checked
                                            @endif
                                    @endforeach
                                    ></td>
                                <td class="align-middle">{{ $role->id }}</td>
                                <td class="align-middle">{{ $role->name }}</td>
                                <td class="align-middle">{{ $role->slug }}</td>
                                <td class="align-middle">
                                    <form action="{{ route('admin.users.role.attach',$user) }}" method="post">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" name="role" value="{{ $role->id }}">
                                        <button
                                            type="submit"
                                            class="btn btn-primary"
                                            @if($user->roles->contains($role))
                                                disabled
                                            @endif

                                            >Attach</button></td>
                                    </form>
                                <td class="align-middle">
                                    <form action="{{ route('admin.users.role.detach',$user) }}" method="post">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" name="role" value="{{ $role->id }}">
                                        <button type="submit" class="btn btn-danger"
                                                @if(!$user->roles->contains($role))
                                                disabled
                                                @endif
                                            >Detach</button></td>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    @endsection
</x-admin-master>
