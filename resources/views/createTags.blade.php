@extends('layouts.adminDashboard')


@section('content')
<div class="container pt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Tag</div>
                <div class="card-body">
                    <form method="post" action="{{ route('tags.store') }}">
                        <div class="form-group">
                            @csrf
                            <label class="label">Tag Name: </label>
                            <input type="text" name="name" class="form-control" required/>
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