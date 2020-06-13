<x-admin-master>
    @section('title', 'Edit Post')
    @section('content')
        <h1 class="h1">Edit Concert</h1>
        @if(Session::has('concertUpdatedMessage'))
            <div class="alert alert-success">
                {{ Session::get('concertUpdatedMessage') }}
            </div>
        @endif


        <form method="POST" action="{{ route('admin.concerts.update',$concert->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="date">Időpont</label>
            <input type="date" class="form-control @error('date') is-invalid @enderror"" name="date" aria-describedby="dateHelp" placeholder="2020.01.01" value="{{ $concert->date }}">
            <small id="dateHelp" class="form-text text-muted">Enter a date like above.</small>
            @error('date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="venue">Helyszín</label>
            <input type="text" class="form-control @error('venue') is-invalid @enderror"" name="venue" aria-describedby="venueHelp" placeholder="City - Name of the venue" value="{{ $concert->venue }}">
            <small id="venueHelp" class="form-text text-muted">Enter a location like above.</small>
            @error('venue')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="open">Kapunyitás</label>
            <input type="text" class="form-control @error('open') is-invalid @enderror"" name="open" aria-describedby="openHelp" placeholder="24:00" value="{{ $concert->open }}">
            <small id="openHelp" class="form-text text-muted">Enter a time like above.</small>
            @error('open')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="start">Kezdés</label>
            <input type="text" class="form-control @error('start') is-invalid @enderror"" name="start" aria-describedby="startHelp" placeholder="24:00" value="{{ $concert->start }}">
            <small id="startHelp" class="form-text text-muted">Enter a time like above.</small>
            @error('start')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="price_advance">Elővételes jegyek</label>
            <input type="text" class="form-control @error('price_advance') is-invalid @enderror"" name="price_advance" aria-describedby="price_advanceHelp" placeholder="2999" value="{{ $concert->price_advance }}">
            <small id="price_advanceHelp" class="form-text text-muted">Enter price like above.</small>
            @error('price_advance')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="price_onsite">Utánvételes jegyek</label>
            <input type="text" class="form-control @error('price_onsite') is-invalid @enderror"" name="price_onsite" aria-describedby="price_onsiteHelp" placeholder="2999" value="{{ $concert->price_onsite }}">
            <small id="price_onsiteHelp" class="form-text text-muted">Enter price like above.</small>
            @error('price_onsite')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">További Információk</label>
            <input type="text" class="form-control @error('more_info') is-invalid @enderror"" name="more_info" aria-describedby="more-infoHelp" placeholder="https://www.facebook.com/Fetish-section-216667235599340/" value="{{ $concert->more_info }}">
            <small id="more-infoHelp" class="form-text text-muted">Enter a link where the users can find more info.</small>
            @error('more_info')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endsection
</x-admin-master>
