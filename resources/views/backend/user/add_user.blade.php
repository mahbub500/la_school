@extends('backend.body.dashboard')
@section('content')
  
 <div class="content-wrapper">    
<div class="container-full">
		<!-- Content Header (Page header) -->
        <!-- Main content -->
		<section class="content">
         <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">User Registration</h4>
			  {{-- <h6 class="box-subtitle">Bootstrap Form Validation check the <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">official website </a></h6> --}}
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form  method="post" action="{{route('user.store')}} ">
						@csrf
					  <div class="row">
						<div class="col-12">
						<div class="row" >
						<div class="col-md-6" >
							<div class="form-group">
								<h5>Basic Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="userType" id="userType" required="" class="form-control" >
										<option value="">User Role</option>
										<option value="1">Admin</option>
										<option value="2">User</option>
										
									</select>
								</div>
							</div>

						</div>
						<div class="col-md-6" >
							<div class="form-group">
								<h5>Your Name <span class="text-danger">*</span></h5>
							<div class="controls">
								<input type="text" name="name" class="form-control" required=""> </div>
								{{-- <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div> --}}
						</div>

						</div>
						</div>

						<div class="row" >
							<div class="col-md-6" >
							
								<div class="form-group">
									<h5>Your Email <span class="text-danger">*</span></h5>
								<div class="controls">
										<input type="email" name="email" class="form-control" required=""> </div>
									{{-- <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div> --}}
							</div>
							</div>
							<div class="col-md-6" >
								<div class="form-group">
									<h5>Password Input Field <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="password" name="password" class="form-control" required=""> </div>
								</div>
	
							</div>
							</div>
							<div class="text-xs-right">
							<button type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">Submit</button>
						</div>
                            
					  </div>
						
									
						
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
	  </div>
      </div>
  
@endsection