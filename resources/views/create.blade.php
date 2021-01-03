@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Article</div>
                <div class="card-body">
                    <form method="post" action="{{ route('posts.store') }}">
                        <div class="form-group">
                            @csrf
                            <label class="label">Article Title: </label>
                            <input type="text" name="title" class="form-control" required/>
                        </div>

                        <div class="form-group">
                            <label class="label">Article Body: </label>
                            <textarea name="body" rows="10" cols="30" class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <label class="label">Article Category: </label>

                            <select name="category_id" class="form-control" required>

                                @foreach($categories as $category)

                                <option value ="{{ $category->id }}" >{{ $category->name }}</option>

                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-success" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection