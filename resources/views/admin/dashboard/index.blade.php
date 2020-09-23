@extends('layouts.admin.master')

@section('title')
  Dashboard
@endsection
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="row">
        <div class="col-12">
          <div class="card card-stats" style="border:#000080 1px solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-left ml-2">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="numbers">
                            <p class="card-category" style="color:#447DF7"><b>Company Details</b></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
              <hr>
              <div class="stats">
                Sharon's FYP:
                <h4 class="card-title">
                  Tourism Personalization System 
                </h4>
              </div>
            </div>
          </div>

          <div class="card card-stats" style="border:#000080 1px solid">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-left ml-2">
                          <i class="fa fa-clock-o" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="numbers">
                            <p class="card-category" style="color:#447DF7"><b>System Monitoring</b></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
              <hr>
              <div class="stats">
                New user in the system today!~
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12 col-md-4">
              <div class="card card-stats" style="border:#000080 1px solid">
                  <div class="card-body ">
                      <div class="row">
                          <div class="col-5">
                              <div class="icon-big text-left ml-2 icon-warning">
                                <i class="fa fa-tasks" aria-hidden="true"></i>
                              </div>
                          </div>
                          <div class="col-7">
                              <div class="numbers">
                                  <p class="card-category" style="color:#447DF7"><b>Plans</b></p>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="card-footer ">
                      <hr>
                      <div class="stats">
                        Plans
                        <h4 class="card-title">
                            {{$plans}}
                        </h4>
                      </div>
                  </div>
              </div>
            </div>

            <div class="col-12 col-md-4">
              <div class="card card-stats" style="border:#000080 1px solid">
                  <div class="card-body ">
                      <div class="row">
                          <div class="col-5">
                              <div class="icon-big text-left ml-2 icon-warning">
                                <i class="fa fa-tag" aria-hidden="true"></i>
                              </div>
                          </div>
                          <div class="col-7">
                              <div class="numbers">
                                  <p class="card-category" style="color:#447DF7"><b>Categories</b></p>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="card-footer ">
                      <hr>
                      <div class="stats">
                      Categories
                        <h4 class="card-title">
                         {{ $categories }} 
                        </h4>
                      </div>
                  </div>
              </div>
            </div>

            <div class="col-12 col-md-4">
              <div class="card card-stats" style="border:#000080 1px solid">
                  <div class="card-body ">
                      <div class="row">
                          <div class="col-5">
                              <div class="icon-big text-left ml-2 icon-warning">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                              </div>
                          </div>
                          <div class="col-7">
                              <div class="numbers">
                                  <p class="card-category" style="color:#447DF7"><b>Destinations</b></p>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="card-footer ">
                      <hr>
                      <div class="stats">
                        Destinations
                        <h4 class="card-title">
                          {{$destinations}}
                        </h4>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
