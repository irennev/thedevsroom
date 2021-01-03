@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg">
            <div class="card">
                    @if(auth()->user()->is_admin == 1)
                    <a href="{{url('admin/routes')}}">Admin</a>
                    @else

                    <div class="container">

                        <div class="row justify-content-center">

                            <div class="col-md-8">
                            <br><br><br>
                                <h1>Articles</h1>
                                <a href="{{ route('posts.create') }}" class="btn btn-success" style="float: right">Create Article</a>
                                <br><br><br>
                                <div class="list-group">
                                    @foreach($posts as $post)

                                    <a href="{{ route('posts.show', $post->id) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <h5 class="mb-1">{{ $post->title }}</h5>
                                    <small><i>{{ $post->visits}} views</i></small>
                                    </a>
                                    
                                    @endforeach
                                </div>
                            </div>
                            
                            <div lass="col-sm" >
                            </div>

                            <div class="col-sm-4 justify-content-center">
                            <br><br><br>
                                <h1>Categories</h1>
                                <br><br><br>


                                <div id="accordion">
                                    @foreach($categories as $category)
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#{{ $category->name}}" aria-expanded="false" aria-controls="{{ $category->name}}">
                                            {{ $category->name}}
                                            </button>
                                        </h5>
                                        </div>

                                        <div id="{{ $category->name}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
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
                            </div>

                        </div>
                    </div>
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection
