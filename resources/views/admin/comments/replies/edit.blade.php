<x-admin-master>
    @section('title', 'Edit Reply')
    @section('content')
        <h1 class="h1">Edit Reply</h1>

        @if (Session::has('replyDeletedMessage'))
            <div class="alert alert-danger">{{ Session::get('replyDeletedMessage') }}</div>
        @elseif(Session::has('replyUpdatedMessage'))
            <div class="alert alert-success">{{ Session::get('replyUpdatedMessage') }}</div>
        @endif

        <form method="POST" action="{{ route('admin.replies.update',$comment_reply->id) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="body">Body</label>
                <textarea type="text" name="body" class="form-control @error('body') is-invalid @enderror" aria-describedby="bodyHelp" placeholder="Enter body">{{ $comment_reply->body }}</textarea>
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
