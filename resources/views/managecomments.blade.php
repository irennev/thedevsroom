@extends('layouts.adminDashboard')

@section('content')

    <head>
    <title>Manage comments</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

    
    <link href="{{ asset('css/manage.css') }}" rel="stylesheet">

    <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        var actions = $("table td:last-child").html();
    });
    </script>
</head>

            <body>
            <div class="container-lg">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-8"><h2>Manage <b>Comments</b></h2></div>
                                <div class="col-sm-4">
                                    <div class="search-box">
                                        <input type="text" class="form-control" placeholder="Search&hellip;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table id="example" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Post</th>
                                    <th>Parent</th>
                                    <th>Body</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>

                            @foreach($comments as $comment)
                                <tr>
                                    <td>{{ $comment->user_id }}</td>
                                    <td>{{ $comment->post_id }}</td>
                                    <td>{{ $comment->parent_id }}</td>
                                    <td>{{ $comment->body }}</td>
                                    <td>
                                        <a href ="#modal-edit-{{ $comment->id }}" class="edit" title="Edit" data-toggle="modal"><i class="material-icons">&#xE254;</i></a>
                                        <a href="#modal-delete-{{ $comment->id }}" class="delete" title="Delete" data-toggle="modal"><i class="material-icons">&#xE872;</i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            @foreach($comments as $comment)
            <!-- Edit Modal HTML -->
            <div id="modal-edit-{{ $comment->id }}" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('comments.update', $comment->id) }}" method="post">
                            @csrf @method('PUT')
                            <div class="modal-header">						
                                <h4 class="modal-title">Edit Comment</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <input name="id" id="id" type="hidden" value ="{{$comments}}" required>					
                                <div class="form-group">
                                    <label>User</label>
                                    <input name="user_id" id="user_id" type="text" class="form-control" value ="{{$comment->user_id}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Post</label>
                                    <input name="post_id" id="post_id" type="text" class="form-control" value ="{{$comment->post_id}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Parent</label>
                                    <input name="parent_id"  id="parent_id" type="text" class="form-control" value ="{{$comment->parent_id}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Body</label>
                                    <input name="body"  id="body" type="text" class="form-control" value ="{{$comment->body}}" required>
                                </div>					
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                <input type="submit" class="btn btn-info" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Delete Modal HTML -->
            <div id="modal-delete-{{ $comment->id }}" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
                            @csrf @method('DELETE')
                            <div class="modal-header">						
                                <h4 class="modal-title">Delete Comment</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">					
                                <p>Are you sure you want to delete "{{$comment->body}}" of user "{{$comment->user_id}}"?</p>
                                <p class="text-warning"><small>This action cannot be undone.</small></p>
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </div>
                        </form>
                    </div>
                </div>
            </div>             
            @endforeach
            
            </body>
@endsection
