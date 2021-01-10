@extends('layouts.app')

@section('content')

<script>
function showPosts() {
    var x = document.getElementById("postsResults");
    var y = document.getElementById("accordion");

    x.style.display = "block";
    y.style.display = "none";
}

function showCategories() {
    var x = document.getElementById("postsResults");
    var y = document.getElementById("accordion");

    y.style.display = "block";
    x.style.display = "none";
}
</script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg">
            <div class="card">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <br>
                                <h5>Results in:</h5>
                                    <button onclick="showPosts()" class="btn btn-sm btn-outline-success mr-2" type="submit">Posts</button>
                                    <button onclick="showCategories()" class="btn btn-sm btn-outline-success mr-2" type="submit">Categories</button>
                                <br>
                                <br>
                                @if(count($posts)>0 && $search!="")
                                <h5> The Search results for your query <b> {{ $search }} </b> are :</h5>
                                <br>

                            
                                <div id="postsResults" class="list-group">
                                    @foreach($posts as $post)

                                    <a href="{{ route('posts.show', $post->id) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <h5 class="mb-1">{{ $post->title }}</h5>
                                    <small><i>{{ $post->visits}} views</i></small>
                                    <br><br>
                                    <h6>{{ substr($post->body, 0, 80) }}...</h6>
                                    </a>
                                    
                                    @endforeach
                                </div>

                                
                                <div id="accordion" style ="display: none">
                                
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
                                                @foreach($category->posts as $post)

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

                                @else
                                <h5> No results found for <b> {{ $search }} </b>.</h5>
                                @endif
                            </div>
                        </div>
                        <br>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection
