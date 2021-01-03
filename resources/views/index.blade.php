@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Articles</h1>

            <a href="{{ route('posts.create') }}" class="btn btn-success" style="float: right">Create Post</a>
            <table class="table">
                <tbody>
                @foreach($posts as $post)
                <tr>
                    <td><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></td>
                </tr>

                @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>

@endsection