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
      <div class="row justify-content-start">
      <div class="col-md-6">
          <form action="{{ route('password.update') }}" method="post">
              @csrf
         
          <div class="box-body">
          <div class="form-group">
              <h5>Current Password <span class="text-danger">*</span></h5>
              <div class="controls">
                  <input id="OldPassword" name="OldPassword" type="password"   class="form-control" > </div>
                  @error('OldPassword')
                  <div class="text-danger"> {{$message}} </div>
                  @enderror
                </div>
            <div class="form-group">
                <h5>New Password<span class="text-danger">*</span></h5>
                <div class="controls">
                    <input id="password" name="password" type="password" class="form-control" > </div>
                    @error('password')
						<div class="text-danger"> {{$message}} </div>
					@enderror
				
				 </div>
            <div class="form-group">
                <h5>Confirm Password<span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" > </div>
                    @error('password_confirmation')
						<div class="text-danger"> {{$message}} </div>
					@enderror
				
			 </div>
                 <input type="submit" value="Submit" class="btn btn-primary">
			 </div>
		 </div>

		 </form>
		 
	  
	
	  
	 <!-- /.row -->
   </div>
   </div>
   </div>
   <!-- /.box-body -->
 </div>
 <!-- /.box -->

</section>
		
	</div>
</div>
  
@endsection