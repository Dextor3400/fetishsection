<x-admin-master>
    @section('title', 'Edit Comment')
    @section('content')
        <h1 class="h1">Edit Post</h1>
        <form method="POST" action="{{ route('admin.comments.update',$comment->id) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="body">Body</label>
                <textarea type="text" name="body" class="form-control @error('body') is-invalid @enderror" aria-describedby="bodyHelp" placeholder="Enter body">{{ $comment->body }}</textarea>
                <small id="bodyHelp" class="form-text text-muted">Edit your body</small>
                @error('body')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endsection
</x-admin-master>
