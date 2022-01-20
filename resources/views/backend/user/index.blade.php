@extends('backend.body.dashboard')
@section('content')
<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
    

      <!-- Main content -->
      <section class="content">
        <div class="row">
             <div class="col-md-12 col-sm-6">
                 <!-- /.box -->
        <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">User Data Table</h3>
                {{-- <h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> --}}
                <a href="{{route('user.add')}}"  type="button" class="btn btn-rounded btn-sm btn-success mb-5"> Add User</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                      <thead>
                        <tr>
                              <th>SL</th>
                              <th>Role</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($AllDatas as $key => $AllData)
                              
                          @endforeach
                           <tr>
                              <td>{{$key+1}} </td>
                              <td>{{$AllData->usertype}} </td>
                              <td>{{$AllData->name}} </td>
                              <td>{{$AllData->email}} </td>
                              <td>
                                  <a href="#" class="btn btn-sm btn-info">Edit</a>
                                  <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                  
                            </td>
                              
                              
                          </tr>
                      </tbody>				  
                      
                  </table>
                  </div>              
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->          
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
</div>
@endsection