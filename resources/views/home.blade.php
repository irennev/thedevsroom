@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg">
            <div class="card">
                    @if(auth()->user()->is_admin == 1)

                    <section class="slice py-7">
                    <div class="container">
                        <div class="row row-grid align-items-center">
                            <div class="col-12 col-md-5 col-lg-6 order-md-2 text-center">
                                <figure class="w-100"><img alt="Image placeholder" src="{{ asset('assets/images/admin-settings-male.png') }}" class="img-fluid mw-md-120"></figure>
                            </div>
                            <div class="col-12 col-md-7 col-lg-6 order-md-1 pr-md-5">
                                <h1 class="display-4 text-center text-md-left mb-3">Hello, <strong class="text-primary">{{ Auth::user()->name }}</strong></h1>
                                <div class="text-center text-md-left mt-5">
                                <a href="{{route('admin.home')}}" class="btn btn-primary btn-icon">
                                    <span class="btn-inner--text">Go to Dashboard</span> 
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    </section>
                    <br><br>

                    @else

                    <div class="container">
                        <br>
                        <div class="row justify-content-center">
                            
                            <div class="col-md-8">
                            <br>
                                <h1>Articles</h1>
                                <a href="{{ route('posts.create') }}" class="btn btn-success" style="float: right">Create Article</a>
                                <br><br><br>
                                <div class="list-group">
                                    @foreach($posts as $post)

                                    <a href="{{ route('posts.show', $post->id) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <h5 class="mb-1">{{ $post->title }}</h5>
                                    @inject('provider', 'App\Http\Controllers\ServiceProvider')
                                    <small><i>Written by:</i> {{ $provider::getUser($post->user_id) }}</small>
                                    <br>
                                    <small><i>{{ $post->visits}} views</i></small>
                                    <br><br>
                                    <h6>{{ substr($post->body, 0, 80) }}...</h6>
                                    @foreach($post->tags as $tag)
                                        <span class="badge badge-primary">{{ $tag->name }}</span>
                                     @endforeach
                                    </a>
                                    
                                    @endforeach
                                </div>
                            </div>
                            
                            
                            <div lass="col-sm" >
                            </div>
                            <br>
                            <div class="col-sm-4 justify-content-center">
                                <br>
                                <h1>Categories</h1>
                                <br><br><br>


                                <div id="accordion">
                                    @foreach($categories as $category)
                                    <div class="card">
                                        <div class="card-header" id="heading-{{ $category->id}}">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#category-{{ $category->id}}" aria-expanded="false" aria-controls="category-{{ $category->id}}">
                                            {{ $category->name}}
                                            </button>
                                            <br>
                                        </h5>
                                        @inject('provider', 'App\Http\Controllers\ServiceProvider')
                                        <p class="text-right"><i>[{{ $provider::categoryPosts($category->id) }} posts]</i></p>
                                        </div>

                                        <div id="category-{{ $category->id}}" class="collapse" aria-labelledby="heading-{{ $category->id}}" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="list-group">
                                                @foreach($category->posts->sortByDesc('visits')->take(3) as $post)

                                                <a href="{{ route('posts.show', $post->id) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                                <h5 class="mb-1">{{ $post->title }}</h5>
                                                <small><i>{{ $post->visits}} views</i></small>
                                                </a>
                                                @endforeach
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                                <h1 class="pt-4">Tags</h1>

                                <div class="justify-content-center pt-2">
                                @foreach($tags as $tag)
                                <a href="{{ route('tag', $tag) }}" class="badge badge-primary" style="font-size:1rem;">{{ $tag }}</a>
                                @endforeach
                                </div>

                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="pl-3">
                    {{ $posts->render("pagination::bootstrap-4") }}
                    </div>
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection
