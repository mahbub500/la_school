@extends('backend.body.dashboard')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <div class="content-wrapper">    
	<div class="container-full">
	<section class="content">

<!-- Basic Forms -->
 <div class="box">
   <div class="box-header with-border">
	 <h4 class="box-title">Edit {{$user->name}} Prfile </h4>
	    </div>
   <!-- /.box-header -->
   <div class="box-body">
       <form action="#" method="post" >
	   <div class="row">
       <div class="col-md-12">
			 <div class="row">
                     @csrf
				 <div class="col-md-6">
				     <div class="form-group">
                        <h5>User name <span class="text-danger">*</span></h5>
                        <div class="controls">
                        <input type="text" name="name" value="{{$user->name}}"  class="form-control" >
                        </div>
                        @error('name')
                            <div class="text-danger"> {{$message}} </div>
                        @enderror
					
				    </div>
                    
				 </div>
                 <div class="col-md-6">
                 <div class="form-group">
                        <h5>Gender <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="gender" id="select"  value="{{old('gender')}}" class="form-control" aria-invalid="false">
                                <
                            <option  value="Male" {{$user->usertype == "Male" ? "selected": ""}} >Male </option>
						    <option  value="Female" {{$user->usertype == "Female" ? "selected": ""}} >Female </option>
                            </select>
                            @error('gender')
                            <div class="text-danger"> {{$message}} </div>
                            @enderror
                            </div>
                        </div>
				    </div>
                </div>
            </div>
        </div>
		 </div>
		 <div class="col-md-12">
			 <div class="row">
				 <div class="col-md-6">
				     <div class="form-group">
                        <h5>User Email <span class="text-danger">*</span></h5>
                        <div class="controls">
                        <input type="text" name="email" value="{{$user->email}}"  class="form-control" >
                        </div>
                        @error('email')
                            <div class="text-danger"> {{$message}} </div>
                        @enderror
					
				    </div>
                    
				 </div>
                 <div class="col-md-6">
				     <div class="form-group">
                        <h5>User Mobile <span class="text-danger">*</span></h5>
                        <div class="controls">
                        <input type="text" name="mobile" value="{{$user->phone}}"  class="form-control" >
                        </div>
                        @error('mobile')
                            <div class="text-danger"> {{$message}} </div>
                        @enderror
					
				    </div>
                    
				 </div>
			
			 </div>
			
		 </div>
         <div class="col-md-12">
			 <div class="row">
				 <div class="col-md-6">
				     <div class="form-group">
                        <h5>User Adress <span class="text-danger">*</span></h5>
                        <div class="controls">
                        <input type="text" name="Adress" value="{{$user->Adress}}"  class="form-control" >
                        </div>
                        @error('Adress')
                            <div class="text-danger"> {{$message}} </div>
                        @enderror
					
				    </div>
                    
				 </div>
                 <div class="col-md-6">
				     <div class="form-group">
                        <h5>User Image <span class="text-danger">*</span></h5>
                        <div class="controls">
                        <input type="file" name="image" value="{{$user->image}}"  id="image" class="form-control" >
                        </div>
                        @error('image')
                            <div class="text-danger"> {{$message}} </div>
                        @enderror
					
				    </div>
                    <div id="ShowImage" class="form-group">
                        <img src="{{ (!empty($user->image))? url('storage/profile-photos'.$user->iamge):url('backend/images/no_image.jpg') }}" style="width: 100px; height: 100px; border: 1px solid #00000;" alt="ShowImage">
                    </div>

                </div>
                
            </div>
            <input type="submit" value="Update" class="btn btn-primary mb-2">
			
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

<script type="text/javascript">
    $(document).ready(function(){
    $('#image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#ShowImage').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    });
});
</script>
  
@endsection