
@extends('layouts.adminDashboard')

@section('content')

    <head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    
    <link href="{{ asset('css/manage.css') }}" rel="stylesheet">


</head>


<div class="card-deck pt-3 pb-3">
    <div class="card">
    <div class="card-body">
      <h5 class="card-title">Total Users</h5>
      <p class="card-text">{{ $users->count()}}</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Last updated 4 mins ago</small>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Total Articles</h5>
      <p class="card-text">{{ $posts->count()}}</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Last updated 3 mins ago</small>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Total Comments</h5>
      <p class="card-text">{{ $comments->count()}}</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Last updated 5 mins ago</small>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Total Categories</h5>
      <p class="card-text">{{ $categories->count()}}</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Last updated 1 mins ago</small>
    </div>
  </div>
</div>

<div class="card-deck pt-3 pb-3">

    <div class="card">
        <br>
        <div class="card-header">
        Most Popular Articles
    </div>
                <div class="list-group list-group-flush">
                    @foreach($posts->sortByDesc('visits')->take(5) as $post)

                    <a href="{{ route('posts.show', $post->id) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                    <h5 class="mb-1">{{ $post->title }}</h5>
                    @inject('provider', 'App\Http\Controllers\ServiceProvider')
                    <small><i>Written by:</i> {{ $provider::getUser($post->user_id) }}</small>
                    <br>
                    <small><i>{{ $post->visits}} views</i></small>
                    <br><br>
                    <h6>{{ substr($post->body, 0, 20) }}...</h6>
                    </a>
                    
                    @endforeach
                </div>
            </div>
    </div>

    <div class="card">
        <br>
        <div class="card-header">
        Most Popular Categories
    </div>
                <div class="list-group list-group-flush">
                    @inject('provider', 'App\Http\Controllers\ServiceProvider')
                    
                    @foreach($categories as $category)

                    <a class="list-group-item list-group-item-action flex-column align-items-start">
                    <h5 class="mb-1">{{ $category->name }}</h5>
                    @inject('provider', 'App\Http\Controllers\ServiceProvider')
                    <small><i>[{{ $provider::categoryPosts($category->id) }} posts]</i></small>
                    </a>
                    
                    @endforeach
                </div>
            </div>
    </div>
        
</div>
</div>

</body>
@endsection






