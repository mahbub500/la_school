<section class="sidebar">
  <div class="user-profile">
			<div class="ulogo">
				 <a href="index.html">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="../images/logo-dark.png" alt="">
						  <h3><b>Sunny</b> Admin</h3>
					 </div>
				</a>
			</div>
        </div>
        <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
@php
$prefix = Request::route()->getPrefix();
$route = Request::route()->getName();
// dd($prefix1);
@endphp
		  
		<li class="{{ ($route == 'admin')?'active':''}}">
          <a href="{{route('admin')}}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>  
		
        <li class="treeview {{ ($prefix == '/user')?'active':'' }}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Manage User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('user.view')}}"><i class="ti-more"></i>View User</a></li>
            <li><a href="{{route('user.add')}}"><i class="ti-more"></i>Add User</a></li>
          </ul>
        </li> 
		  
        <li class="treeview {{ ($prefix == '/profile')?'active':'' }}">
          <a href="# ">
            <i data-feather="mail"></i> <span>Manage Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('Profile.view')}}"><i class="ti-more"></i>Your Profile</a></li>
            <li><a href="{{route('Password.Store')}}"><i class="ti-more"></i>Change Password</a></li>
           
          </ul>
        </li>
        <li class="treeview {{ ($prefix == '/setups')?'active':'' }}">
          <a href="# ">
            <i data-feather="mail"></i> <span>Setup Mangement</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('student.class.view')}}"><i class="ti-more"></i>Student Class</a></li>
            <li><a href="{{route('student.year.view')}}"><i class="ti-more"></i>Student Year</a></li>
            <li><a href="{{route('student.group.view')}}"><i class="ti-more"></i>Student Group</a></li>
            <li><a href="{{route('student.Shift.view')}}"><i class="ti-more"></i>Student Shift</a></li>
            <li><a href="{{route('student.FeeCategory.view')}}"><i class="ti-more"></i>Student Fee Category</a></li>
           
           
          </ul>
        </li>
        <li class="header nav-small-cap">User Interface</li>
        <li class="treeview">
          <a href="#">
            <i data-feather="grid"></i>
            <span>Components</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
            <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
            
          </ul>
        </li>	

      </ul>
    </section>