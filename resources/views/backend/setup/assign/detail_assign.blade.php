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
                <h3 class="box-title">Student Assign Subject Details</h3>
                {{-- <h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> --}}
                <!-- <a href="{{route('fee.amount.add')}}"  type="button" class="btn btn-rounded btn-sm btn-success mb-5">Add New Fee Ammount</a> -->
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <h4><strong>Fee Category : </strong> {{$AllDatas['0']->student_class->name}}  </h4>
                  <div class="table-responsive">
                    <table  id="example"  class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                      <thead class="thead-light">
                        <tr>
                              <th width="10%" >SL</th>
                              <th>Class Name</th>
                              <th >Full Mark</th>
                              <th >Pass Mark</th>
                              <th >Subjective Mark</th>
                             
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($AllDatas as $key => $AllData)
                          <tr>
                              <td>{{$key+1}} </td>
                              <td>{{$AllData->student_subject->Subject}} </td>
                              <td>{{$AllData->full_mark}} </td>
                              <td>{{$AllData->pass_mark}} </td>
                              <td>{{$AllData->subjective_mark}} </td>
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