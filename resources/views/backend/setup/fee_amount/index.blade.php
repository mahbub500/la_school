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
                <h3 class="box-title">Student Fee Ammount List</h3>
                {{-- <h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> --}}
                <a href="{{route('fee.amount.add')}}"  type="button" class="btn btn-rounded btn-sm btn-success mb-5">Add New Fee Ammount</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                      <thead>
                        <tr>
                              <th width="10%" >SL</th>
                              <th>Fee Category</th>
                              <th width="25%">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($AllFees as $key => $AllFee)
                          <tr>
                              <td>{{$key+1}} </td>
                              <td>{{$AllFees->FeeCategory}} </td>
                              <td>
                                <a href="{{route('student.FeeCategory.edit',$AllFees->id)}} " class="btn btn-sm btn-info">Edit</a>
                                <a href="{{route('student.FeeCategory.delete',$AllFees->id)}}" class="btn btn-sm btn-danger" id="delete" >Delete</a>
                                </td>
                          </tr>
                          @endforeach
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