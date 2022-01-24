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
					 <form method="post" action=" {{route('class.store')}} " >
					 @csrf
                     <div class="form-group">
					<h5>Class Name <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="name" value="{{old('name')}}" class="form-control" > </div>
					@error('name')
						<div class="text-danger">{{$message}}</div>
					@enderror
				</div>
                <input type="submit" Value="Add Calss" class="btn btn-primary" >
				 
				 
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