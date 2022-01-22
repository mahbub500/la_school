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
					 <form method="post" action=" {{route('user.store')}} " >
					 @csrf
				 <div class="form-group">
								<h5>User Role <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="UserRole" id="select"  value="{{old('UserRole')}}" class="form-control" aria-invalid="false">
										<option value="">Your Role</option>
						<option  value="Admin"  >Admin </option>
						<option  value="User"  >User </option>
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
					<input type="text" name="name" value="{{old('name')}}"  class="form-control" > </div>
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
						<input type="text" name="email" value="{{old('email')}}" class="form-control" > </div>
					@error('email')
						<div class="text-danger"> {{$message}} </div>
					@enderror
				</div>
				 </div>
				 <div class="col-md-6">
				 <div class="form-group">
					<h5>Password<span class="text-danger">*</span></h5>
					<div class="controls">
					<input type="password" name="password" class="form-control" > <div class="help-block"></div></div>
					@error('password')
						<div class="text-danger"> {{$message}} </div>
					@enderror
				</div>
				 </div>
			 </div>
			 <input type="submit" value="Sumbit" class="btn btn-primary">
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