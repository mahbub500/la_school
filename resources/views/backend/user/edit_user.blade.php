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
					 <form method="post" action=" {{route('user.update',$AllData->id)}} " >
					 @csrf
				 <div class="form-group">
                        <h5>User Role <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="UserRole" id="select"  value="{{old('UserRole')}}" class="form-control" aria-invalid="false">
                                <
                                <option  value="Admin" {{$AllData->usertype == "Admin" ? "selected": ""}} >Admin </option>
						<option  value="User" {{$AllData->usertype == "User" ? "selected": ""}} >User </option>
                                
                                
                            </select>
                            @error('UserRole')
                            <div class="text-danger"> {{$message}} </div>
                            @enderror
                        <div class="help-block"></div></div>
                    </div>
				 </div>
				 <div class="col-md-6">
				 <div class="form-group">
					<h5>User name <span class="text-danger">*</span></h5>
					<div class="controls">
					<input type="text" name="name" value="{{$AllData->name}}"  class="form-control" > </div>
					@error('name')
						<div class="text-danger"> {{$message}} </div>
					@enderror
					
				</div>
				 </div>
			 </div>
			 <!-- <input type="submit" value="Sumbit" class="btn btn-primary"> -->
		 </div>
		 <div class="col-md-12">
			 <div class="row">
				 <div class="col-md-6">
				 <div class="form-group">
					<h5>User Email <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="email" value="{{$AllData->email}}" class="form-control" > </div>
					@error('email')
						<div class="text-danger"> {{$message}} </div>
					@enderror
				</div>
				 </div>
			
			 </div>
			 <input type="submit" value="Update" class="btn btn-primary">
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