<x-admin-master>
    @section('title', 'Create Post')
    @section('content')
        <h1 class="h1">Create Post</h1>
        <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" aria-describedby="titleHelp" placeholder="Enter title" ">
                <small id="titleHelp" class="form-text text-muted">Enter your title</small>
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <input type="file" name="post_image" class="file-control @error('post_image') is-invalid @enderror" aria-describedby="photoHelp">
                <small id="photoHelp" class="form-text text-muted">You can upload photos</small>
                @error('post_image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>>
                @enderror
            </div>
            <div class="form-group">
                <textarea name="body" id="summary-ckeditor" class="form-control @error('body') is-invalid @enderror" cols="30" rows="10"></textarea>
                @error('body')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endsection
    @section('scripts')
        <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
        <script>
        CKEDITOR.replace( 'summary-ckeditor' );
        </script>
    @endsection
</x-admin-master>
