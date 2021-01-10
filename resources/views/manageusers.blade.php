@extends('layouts.adminDashboard')

@section('content')

    <head>
    <title>Manage users</title>
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
                                <div class="col-sm-8"><h2>Manage <b>Users</b></h2></div>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Is Admin</th>
                                    <th>No. Posts</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>

                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->is_admin }}</td>
                                     @inject('provider', 'App\Http\Controllers\ServiceProvider')
                                    <td>{{ $provider::userPosts($user->id) }}</td>
                                    <td>
                                        <a href ="#modal-edit-{{ $user->id }}" class="edit" title="Edit" data-toggle="modal"><i class="material-icons">&#xE254;</i></a>
                                        <a href="#modal-delete-{{ $user->id }}" class="delete" title="Delete" data-toggle="modal"><i class="material-icons">&#xE872;</i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            @foreach($users as $user)
            <!-- Edit Modal HTML -->
            <div id="modal-edit-{{ $user->id }}" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('users.update', $user->id) }}" method="post">
                            @csrf @method('PUT')
                            <div class="modal-header">						
                                <h4 class="modal-title">Edit User</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <input name="id" id="id" type="hidden" value ="{{$users}}" required>					
                                <div class="form-group">
                                    <label>Name</label>
                                    <input name="name" id="name" type="text" class="form-control" value ="{{$user->name}}" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" id="email" type="text" class="form-control" value ="{{$user->email}}" required>
                                </div>
                                <div class="form-group">
                                    <label>Is Admin</label>
                                    <input name="is_admin"  id="is_admin" type="text" class="form-control" value ="{{$user->is_admin}}" required>
                                </div>
                                <div class="form-group">
                                    <label>No. Posts</label>
                                    @inject('provider', 'App\Http\Controllers\ServiceProvider')
                                    <input name="nr_posts" type="text" class="form-control" value ="{{ $provider::userPosts($user->id) }}" disabled>
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
            <div id="modal-delete-{{ $user->id }}" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                            @csrf @method('DELETE')
                            <div class="modal-header">						
                                <h4 class="modal-title">Delete User</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">					
                                <p>Are you sure you want to delete "{{$user->name}}" user?</p>
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
