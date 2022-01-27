@extends('backend.body.dashboard')
@section('content')
  
 <div class="content-wrapper">    
	<div class="container-full">
	<section class="content">

<!-- Basic Forms -->
 <div class="box">
   <div class="box-header with-border">
	 <h4 class="box-title">Form Validation</h4>
	 
   </div>
   <!-- /.box-header -->
  
   <div class="box-body">
	   <div class="row">
		 <div class="col-md-12">
			 <div class="row">
				 <div class="col-md-6">
					 <form method="post" action=" {{route('Designation.update',$AllData->id)}} " >
					 @csrf
                     <div class="form-group">
					<h5>Designation <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="designation" value="{{$AllData->designation}} " class="form-control" > </div>
					@error('designation')
						<div class="text-danger">{{$message}}</div>
					@enderror
				</div>
                <input type="submit" Value="Update Designation" class="btn btn-primary" >
				 
				 
				 </div>
			 </div>
			 <!-- <input type="submit" value="Sumbit" class="btn btn-primary"> -->
		 </div>
		

		 </form>
		 
	  
	</div>
	  
	 <!-- /.row -->
   </div>
   <!-- /.box-body -->
 </div>
 <!-- /.box -->

</section>
		
	</div>
</div>
  
@endsection