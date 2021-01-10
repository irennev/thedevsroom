            
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
                     <div class="row">
              <div class="col-lg-4">
                <div class="card card-small mb-4 pt-3">
                  <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                      <img class="rounded-circle" src="images/avatars/0.jpg" alt="User Avatar" width="110">
                    </div>
                    <h4 class="mb-0">Sierra Brooks</h4>
                    <span class="text-muted d-block mb-2">Project Manager</span>
                    <button type="button" class="mb-2 btn btn-sm btn-pill btn-outline-primary mr-2"><i class="material-icons mr-1">person_add</i>Follow</button>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item px-4">
                      <div class="progress-wrapper">
                        <strong class="text-muted d-block mb-2">Workload</strong>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="74" aria-valuemin="0" aria-valuemax="100" style="width: 74%;">
                            <span class="progress-value">74%</span>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="list-group-item p-4">
                      <strong class="text-muted d-block mb-2">Description</strong>
                      <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio eaque, quidem, commodi soluta qui quae minima obcaecati quod dolorum sint alias, possimus illum assumenda eligendi cumque?</span>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Account Details</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                          <form>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feFirstName">First Name</label>
                                <input type="text" class="form-control" id="feFirstName" placeholder="First Name" value="Sierra">
                              </div>
                              <div class="form-group col-md-6">
                                <label for="feLastName">Last Name</label>
                                <input type="text" class="form-control" id="feLastName" placeholder="Last Name" value="Brooks">
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feEmailAddress">Email</label>
                                <input type="email" class="form-control" id="feEmailAddress" placeholder="Email" value="sierra@example.com">
                              </div>
                              <div class="form-group col-md-6">
                                <label for="fePassword">Password</label>
                                <input type="password" class="form-control" id="fePassword" placeholder="Password">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="feInputAddress">Address</label>
                              <input type="text" class="form-control" id="feInputAddress" placeholder="1234 Main St">
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feInputCity">City</label>
                                <input type="text" class="form-control" id="feInputCity">
                              </div>
                              <div class="form-group col-md-4">
                                <label for="feInputState">State</label>
                                <select id="feInputState" class="form-control">
                                  <option selected="">Choose...</option>
                                  <option>...</option>
                                </select>
                              </div>
                              <div class="form-group col-md-2">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" id="inputZip">
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="feDescription">Description</label>
                                <textarea class="form-control" name="feDescription" rows="5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio eaque, quidem, commodi soluta qui quae minima obcaecati quod dolorum sint alias, possimus illum assumenda eligendi cumque?</textarea>
                              </div>
                            </div>
                            <button type="submit" class="btn btn-accent">Update Account</button>
                          </form>
                        </div>
                      </div>
                    </li>
                  </ul>
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

            
            
            
            
            
            
            