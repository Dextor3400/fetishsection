<x-admin-master>
    @section('title', 'Edit Post')
    @section('content')
        <h1 class="h1">Edit Post</h1>
        @if(Session::has('postUpdatedMessage'))
            <div class="alert alert-success">
                {{ Session::get('postUpdatedMessage') }}
            </div>
        @endif
        <form method="POST" action="{{ route('admin.posts.update',$post->id) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" aria-describedby="titleHelp" placeholder="Enter title" value={{ $post->title }}>
                <small id="titleHelp" class="form-text text-muted">Edit your title</small>
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <div class="mb-3">
                    <img width="200px" src="{{ $post->post_image }}" alt="post-image">
                </div>
                <input type="file" name="post_image" class="file-control @error('post_image') is-invalid @enderror" aria-describedby="photoHelp">
                <small id="photoHelp" class="form-text text-muted">You can upload another photos</small>
                @error('post_image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <textarea name="body" class="form-control @error('body') is-invalid @enderror" cols="30" rows="10">{{ $post->body }}</textarea>
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
