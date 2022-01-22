@extends('backend.body.dashboard')
@section('content')
<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <!-- Main content -->
      <section class="content">
        <div class="row">
             <div class="col-md-12 ">
                 <!-- /.box -->

                 {{-- Profile Section --}}
                 <div class="box box-widget widget-user">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header bg-black" style="background: url('../images/gallery/full/10.jpg') center center;">
                    <h3 class="widget-user-username">User Name : {{$user->name}} </h3>
                    <a href="" style="float: right" class="btn btn-rounded btn-success mb-5">Edit Profile</a>
                    <h6 class="widget-user-desc">User Type : {{$user->usertype}}</h6>
                    <h6 class="widget-user-desc">User Email : {{$user->email}}</h6>
                  </div>
                  <div class="widget-user-image">
                    <img class="rounded-circle" src="{{ (!empty($user->image))? url('storage/profile-photos'.$user->iamge):url('backend/images/no_image.jpg') }}" alt="User Avatar">
                    
                  </div>
                  <div class="box-footer">
                    <div class="row">
                    <div class="col-sm-4">
                      <div class="description-block">
                      <h5 class="description-header">Mobile No</h5>
                      <span class="description-text">{{$user->phone}}</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 br-1 bl-1">
                      <div class="description-block">
                      <h5 class="description-header">Address</h5>
                      <span class="description-text">{{$user->address}}</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4">
                      <div class="description-block">
                      <h5 class="description-header">Gender</h5>
                      <span class="description-text">{{$user->gender}}</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </div>
                  </div>
        
        <!-- /.row -->
              </div>
      </div>
      </section>
      <!-- /.content -->
    
    </div>
</div>
@endsection