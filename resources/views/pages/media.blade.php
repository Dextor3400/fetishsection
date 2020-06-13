<x-user-master>
    @section('title', 'Media')
    @section('content')
        <!-------------------------------------CONTENT------------------------------------->
        <!------ABOUT US------>
        <section class="py-5 border-bottom border-dark">
            <div class="row">
                <div class="col-12 col-md-6 d-flex justify-content-center align-items-center flex-column">
                    <h1 class="h1">About us</h1>
                    <p>{!! $data->about_text !!}</p>
                </div>
                <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                    <img src="{{ $data->about_image }}" alt="band photo" class="img-fluid">
                </div>
            </div>
        </section>
        <!------VIDEOS------>
        <section class="py-5 border-bottom border-dark">
            <h4 class="display-4 mb-4">Latest Videos</h4>
            <div class="row">
                <div class="col-12 col-md-6 mb-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="{{ $data->video_one }}"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="{{ $data->video_two }}"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
        </section>
        <!------PHOTOS------>
        <section>
            <h4 class="display-4 py-4">Photos</h4>
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ $data->photo_one }}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ $data->photo_two }}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ $data->photo_three }}" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>
    @endsection
</x-user-master>
