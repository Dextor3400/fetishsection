<x-user-master>
    @section('title', 'News')
    @section('content')
        <!-------------------------------------NEWS ARTICLES START------------------------------------->
        <!------NEWS TOP------>
        <div>
            <h1 class="h1 text-center text-lg-left border-top border-bottom border-light my-3 py-1">News</h1>
        </div>
        <!------ARTICLES------>
        @foreach ($posts as $post)
            <article class="row my-4 pb-4 text-center text-lg-left d-flex align-items-center border-bottom border-light">
                <div class="col-12 col-lg-6 col-xl-5">
                    <a href="{{ route('singlepost',$post) }}">
                        @if(!$post->post_image === null)
                            <img class="img-fluid" src="{{ $post->post_image }}" alt="post-image">
                        @else
                            <img src="https://picsum.photos/500/300" class="img-fluid" alt="post-image">
                        @endif
                    </a>
                </div>
                <div class="col-12 col-lg-6 col-xl-7">
                    <h4 class="h4"><a href="{{ route('singlepost',$post) }}">{{ $post->title }}</a></h4>
                    <small>{{ $post->created_at->diffForHumans() }}</small>
                    <p>{!! Str::limit($post->body, '120','...') !!}</p>
                    <a class="btn btn-primary float-lg-right" href="{{ route('singlepost',$post) }}">More////</a>
                </div>
            </article>
        @endforeach
        <!------PAGINATION------>
        <div class="d-flex">
            <div class="mx-auto">
                {{ $posts->links() }}
            </div>
        </div>
        <!-------------------------------------NEWS ARTICLES END------------------------------------->
    @endsection
</x-user-master>
