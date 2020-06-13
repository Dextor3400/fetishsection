<x-admin-master>
    @section('title', 'Edit Media Page')
    @section('content')
        <div class="col-sm-6">
            
            <form action="{{ route('admin.media.update',$media->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="about_text">About Text</label>
                    <textarea type="text" name="about_text" class="form-control @error('about_text') is-invalid @enderror" aria-describedby="about_textHelp" placeholder="Enter about text" value=>{{ $media->about_text }}</textarea>
                    <small id="about_textHelp" class="form-text text-muted">Edit your about text</small>
                    @error('about_text')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="mb-3">
                        <img width="200px" src="{{ $media->about_image }}" alt="about-image">
                    </div>
                    <input type="file" name="about_image" class="file-control @error('about_image') is-invalid @enderror" aria-describedby="about_imageHelp">
                    <small id="about_imageHelp" class="form-text text-muted">You can upload another photo</small>
                    @error('about_image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">Video Left</label>
                    <div class="col-12 col-md-6 mb-3">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/kuaVIwe28Jk" allowfullscreen></iframe>
                        </div>
                    </div>
                    <input type="text" class="form-control @error('video_one') is-invalid @enderror"" name="video_one" aria-describedby="video_oneHelp" placeholder="https://www.youtube.com/embed/kuaVIwe28Jk" value="{{ $media->video_one }}">
                    <small id="more-video_oneHelp" class="form-text text-muted">Enter a link where the users can find more info.</small>
                    @error('video_one')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>
                <div class="form-group">Video right</label>
                    <div class="col-12 col-md-6 mb-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/43lsrH8VA2k" allowfullscreen></iframe>
                    </div>
                </div>
                    <input type="text" class="form-control @error('video_two') is-invalid @enderror"" name="video_two" aria-describedby="video_twoHelp" placeholder="https://www.youtube.com/embed/kuaVIwe28Jk" value="{{ $media->video_two }}">
                    <small id="more-video_oneHelp" class="form-text text-muted">Enter a link where the users can find more info.</small>
                    @error('video_two')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="mb-3">
                        <img width="200px" src="{{ $media->photo_one }}" alt="photo-one">
                    </div>
                    <input type="file" name="photo_one" class="file-control @error('photo_one') is-invalid @enderror" aria-describedby="photo_oneHelp">
                    <small id="photo_oneHelp" class="form-text text-muted">You can upload another photo</small>
                    @error('photo_one')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="mb-3">
                        <img width="200px" src="{{ $media->photo_two }}" alt="photo-two">
                    </div>
                    <input type="file" name="photo_two" class="file-control @error('photo_two') is-invalid @enderror" aria-describedby="photo_twoHelp">
                    <small id="photo_twoHelp" class="form-text text-muted">You can upload another photo</small>
                    @error('photo_two')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="mb-3">
                        <img width="200px" src="{{ $media->photo_three }}" alt="photo-three">
                    </div>
                    <input type="file" name="photo_three" class="file-control @error('photo_three') is-invalid @enderror" aria-describedby="photo_threeHelp">
                    <small id="photo_threeHelp" class="form-text text-muted">You can upload another photo</small>
                    @error('photo_three')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    @endsection
</x-admin-master>
