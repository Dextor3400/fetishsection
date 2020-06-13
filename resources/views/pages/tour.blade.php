<x-user-master>
    @section('title', 'Tour')
    @section('content')
        <section class="col-12">
            <div class="text-center">
                <h3 class="display-4 my-5">Upcoming Shows</h3>
                <table class="table table-responsive text-white" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="align-middle">Időpont</th>
                            <th class="align-middle">Helyszín</th>
                            <th class="align-middle">Kapunyitás</th>
                            <th class="align-middle">Kezdés</th>
                            <th class="align-middle">Jegyár elővételben</th>
                            <th class="align-middle">Jegyár a helyszínen</th>
                            <th class="align-middle"></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="align-middle">Időpont</th>
                            <th class="align-middle">Helyszín</th>
                            <th class="align-middle">Kapunyitás</th>
                            <th class="align-middle">Kezdés</th>
                            <th class="align-middle">Jegyár elővételben</th>
                            <th class="align-middle">Jegyár a helyszínen</th>
                            <th class="align-middle"></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($concerts as $concert)
                        <tr>
                            <td class="align-middle">{{ $concert->date }}.</td>
                            <td class="align-middle">{{ $concert->venue }}</td>
                            <td class="align-middle">{{ $concert->open }}</td>
                            <td class="align-middle">{{ $concert->start }}</td>
                            <td class="align-middle">{{ $concert->price_advance }}.,- Ft</td>
                            <td class="align-middle">{{ $concert->price_onsite }}.,- Ft</td>
                            <td class="align-middle"><a class="btn btn-primary align-middle" target="_blank" href="{{ $concert->more_info }}">More info</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    @endsection
</x-user-master>
