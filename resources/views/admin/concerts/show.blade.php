<x-admin-master>
    @section('title', 'Post')
    @section('content')
        <h1 class="h1">Concert</h1>
        <div class="card shadow mb-4">

            @if (Session::has('concertDeletedMessage'))
                <div class="alert alert-danger">
                    {{ Session::get('concertDeletedMessage') }}
                </div>
            @endif

            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Concert</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="align-middle">Id</th>
                            <th class="align-middle">Made By</th>
                            <th class="align-middle">Date</th>
                            <th class="align-middle">Venue</th>
                            <th class="align-middle">Open</th>
                            <th class="align-middle">Start</th>
                            <th class="align-middle">Előrefizetett</th>
                            <th class="align-middle">Helyszínen</th>
                            <th class="align-middle">More Info</th>
                            <th class="align-middle">Created_at</th>
                            <th class="align-middle">Updated_at</th>
                            <th class="align-middle">Edit</th>
                            <th class="align-middle">Delete</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="align-middle">Id</th>
                            <th class="align-middle">Made By</th>
                            <th class="align-middle">Date</th>
                            <th class="align-middle">Venue</th>
                            <th class="align-middle">Open</th>
                            <th class="align-middle">Start</th>
                            <th class="align-middle">Előrefizetett</th>
                            <th class="align-middle">Helyszínen</th>
                            <th class="align-middle">More Info</th>
                            <th class="align-middle">Created_at</th>
                            <th class="align-middle">Updated_at</th>
                            <th class="align-middle">Edit</th>
                            <th class="align-middle">Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                            <tr>
                                <td class="align-middle">{{ $concert->id }}</td>
                                <td class="align-middle">{{ $concert->user->name }}</td>
                                <td class="align-middle">{{ $concert->date }}</td>
                                <td class="align-middle">{{ $concert->venue }}</td>
                                <td class="align-middle">{{ $concert->open }}</td>
                                <td class="align-middle">{{ $concert->start }}</td>
                                <td class="align-middle">{{ $concert->price_advance }}</td>
                                <td class="align-middle">{{ $concert->price_onsite }}</td>
                                <td class="align-middle">{{ $concert->more_info }}</td>
                                <td class="align-middle">{{ $concert->created_at->diffForHumans() }}</td>
                                <td class="align-middle">{{ $concert->updated_at->diffForHumans() }}</td>
                                <td class="align-middle">
                                    <a class="btn btn-primary" href="{{ route('admin.concerts.edit',$concert->id) }}">Edit</a>
                                </td>
                                <td class="align-middle">
                                    <form action="{{ route('admin.concerts.destroy',$concert->id) }}" method="post">
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
