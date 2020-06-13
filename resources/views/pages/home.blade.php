<x-user-master>
    @section('title', 'Home')
    @section('content')
        <div class="row">
            <!----------------------LEFT SIDE---------------------->
            <main class="col-12 col-md-12 col-lg-8">
                <!------VIDEO------>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/kuaVIwe28Jk"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
                <!------NEWS TOP------>
                <div>
                    <h1 class="h1 text-center text-lg-left border-top border-bottom border-light my-3 py-1">Latest News</h1>
                </div>
                <!------ARTICLES------>
                @foreach ($posts as $post)
                    <article class="row my-4 pb-4 text-center text-lg-left d-flex align-items-center border-bottom border-light">
                    <div class="col-12 col-lg-6 col-xl-5">
                        <a href="{{ route('singlepost',$post) }}">
                            <img class="img-fluid" src="{{ $post->post_image }}" alt="post-image">
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

            </main>
            <!----------------------RIGHT SIDE---------------------->
            <aside class="d-none d-md-block col-lg-4 mx-auto">
                @if(Auth::check())
                <!------LOGGED IN ------>
                <div class="row card ml-auto mr-1">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between" f>
                            <div>Logged in as <a href="{{ route('profile',auth()->user()) }}">{{ auth()->user()->name }}</a></div>
                            <form class="pull-right" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-outline-success" type="submit">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!------MUSIC PLAYER------>
                <div class=" card ml-auto mr-1 mt-3 text-center">
                    <div class="card">
                        <div class="card-header">Newest Album</div>
                        <div class="card-body col-12">
                            <iframe style="border: 0; width: 300px; height: 420px;"
                                src="https://bandcamp.com/EmbeddedPlayer/album=3380422105/size=large/bgcol=333333/linkcol=e32c14/tracklist=false/transparent=true/"
                                seamless><a href="http://fetishsection1.bandcamp.com/album/fetish-section-ep">
                                Fetish Section EP by Fetish Section</a>
                            </iframe>
                        </div>
                    </div>
                </div>
                @else
                <!------LOGIN/REGISTER------>
                <div class="row card ml-auto mr-1 mt-3">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" type="email" type="email" name="email">
                                <small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" type="password" name="password">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                            <button class="btn btn-success" type="submit">Login</button>
                            <a class="btn btn-success" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </form>
                    </div>
                </div>
                @endif
            </aside>
        </div>
    @endsection
</x-user-master>
