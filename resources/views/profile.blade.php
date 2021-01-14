

@extends('layouts.app')
@section('content')

@if(auth()->user()->is_admin != 1)
            

            <div class="container">
               <div class="row">
                  <div class="col-lg-4 pt-3">
                     <div class="card card-small mb-4">
                        <div class="card-header border-bottom text-center">
                           <div class="mb-3 mx-auto">
                              <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:150px; height:150px; float:middle; border-radius:50%;">
                           </div>
                           <h4 class="pt-3">{{ Auth::user()->name}}</h4>
                           <form enctype="multipart/form-data" action="/profile" method="POST">
                              <input name="avatar" id="file-upload" type="file"/>
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <br>
                              <br>
                              <button type="submit" class="mb-2 btn btn-sm btn-pill btn-outline-primary mr-2"><i class="material-icons mr-1">Update Image</button>
                           </form>
                        </div>
                     </div>
                  </div>


                  <div class="col-lg-12 pt-3" style="width:720px">
                     <div class="card">
                        <div class="card-header border-bottom">
                           <h6 class="m-0">Account Details</h6>
                        </div>
                        <div class="card-body">
                          <form action="{{ route('users.update', Auth::user()->id) }}" method="post">
                          @csrf @method('PUT')
                              <div class="form-group">
                                  <label>Name</label>
                                  <input name="name" id="name" type="text" class="form-control" value ="{{Auth::user()->name}}" required>
                              </div>
                              <div class="form-group">
                                  <label>Email</label>
                                  <input name="email" id="email" type="text" class="form-control" value ="{{Auth::user()->email}}" required>
                              </div>
                              <button type="submit" class="mb-2 btn btn-sm btn-pill btn-outline-primary mr-2">Update Account</button>
                          </form>
                        </div>
                     </div>
                  </div>

               </div>
            </div>
@endif

@endsection

