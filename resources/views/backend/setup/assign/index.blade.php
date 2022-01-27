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
                <h3 class="box-title">Student Exam List</h3>
                {{-- <h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> --}}
                <a href="{{route('Assign.Subject.add')}}"  type="button" class="btn btn-rounded btn-sm btn-success mb-5">Add Assign Subject</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                      <thead>
                        <tr>
                              <th width="10%" >SL</th>
                              <th>Assign Class Name</th>
                              {{-- <th>Assign Subject Name</th> --}}
                              <th width="25%">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($AllDatas as $key => $AllData)
                          <tr>
                              <td>{{$key+1}} </td>
                              <td>{{$AllData->student_class->name}} </td>
                              {{-- <td>{{$AllData->student_subject->Subject}} </td> --}}
                              <td>
                                <a href="{{route('Assign.Subject.edit',$AllData->class_id)}}"  class="btn btn-sm btn-info">Edit</a>
                                <a href="{{route('Assign.Subject.detail',$AllData->class_id)}}"class="btn btn-sm btn-danger" >Detail</a>
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