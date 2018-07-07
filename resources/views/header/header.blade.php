	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">

			   MY BRAND
<!-- 				<a href="index.html"><img src="assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a> -->
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
			
				</div>


<img  id="login8"  src="{{asset('image/plus.png')}}" alt="no" style="width:20px;height:20px;position:absolute; margin-top: 30px;cursor: pointer;">				

 <div id="myForm" class="hide">
					 <!--<p><a class="textDecorationNone" href="{{URL::to('/')}}">New contact</a></p>-->
					 <p><a class="textDecorationNone" href="{{URL::to('/new_customer')}}">New customer</a></p>
					 <p><a class="textDecorationNone" href="{{URL::to('/new_job')}}">New job</a></p>

					 <p><a class="textDecorationNone" href="{{URL::to('/quotation')}}">Quotation</a></p>

					</div>
{{-- 					<div id="result"></div> --}}
				





<!-- 				<form class="navbar-form navbar-left">
					<div class="input-group">
						<input type="text" value="" class="form-control" placeholder="Search dashboard...">
						<span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
					</div>
				</form> -->
<!-- 				<div class="navbar-btn navbar-btn-right">
					<a class="btn btn-success update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
				</div> -->
				<div id="navbar-menu">

					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
								<i class="lnr lnr-alarm"></i>
								<span class="badge bg-danger">0</span>
							</a>
							<ul class="dropdown-menu notifications">
{{-- 								<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is almost full</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9 unfinished tasks</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly report is available</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>
								<li><a href="#" class="more">See all notifications</a></li> --}}
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#">Basic Use</a></li>
								<li><a href="#">Working With Data</a></li>
								<li><a href="#">Security</a></li>
								<li><a href="#">Troubleshooting</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('assets/img/user.png')}}" class="img-circle" alt="Avatar"> <span> @if(!Auth::guest()) {{ Auth::user()->name }} @endif </span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
								<li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
								<li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
                                 
		                       @if (Auth::guest())
		                            <li><a href="{{ route('login') }}">Login</a></li>
		                            <li><a href="{{ route('register') }}">Register</a></li>
		                        @else

								<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="lnr lnr-exit"></i> <span>Logout</span></a>
                                    
                                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                   </form>

                                 </li>

                                @endif

							</ul>
						</li>
						<!-- <li>
							<a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
						</li> -->
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>

					<ul class="nav">
						<li><a href="{{URL::to('/')}}" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
{{-- 						<li><a href="{{URL::to('/new_customer')}}" class=""><i class="lnr lnr-code"></i> <span>New Customer</span></a></li>
						<li><a href="{{URL::to('/new_job')}}" class=""><i class="lnr lnr-chart-bars"></i> <span>New Job</span></a></li> --}}


						<li><a href="{{URL::to('/sent_performa_invoice')}}" class=""><i class="lnr lnr-chart-bars"></i> <span>All Sent Invoice</span><span class="badge bg-danger">{{@$allSentInvoiceCount}}</span></a></li>


						<li><a href="{{URL::to('/pending_performa_invoice')}}" class=""><i class="lnr lnr-chart-bars"></i> <span>All Pending Invoice</span><span class="badge bg-danger">{{@$pending_invoice}}</span></a></li>


						<li><a href="{{URL::to('/show_all_todays_new_job')}}" class=""><i class="lnr lnr-chart-bars"></i> <span>Show All Today's Job</span><span class="badge bg-danger">{{@$todays_all_job}}</span></a></li>

                          
                        <li><a href="{{URL::to('/show_all_todays_customer')}}" class=""><i class="lnr lnr-chart-bars"></i> <span>Today's Customer</span><span class="badge bg-danger">{{@$allTodaysCustomers}}</span></a></li>


                        <li><a href="{{URL::to('/ready_for_quotation')}}" class=""><i class="lnr lnr-chart-bars"></i> <span>Ready For Quotation</span><span class="badge bg-danger">{{@$readyForQuotation9999}}</span></a></li>


						<li><a href="{{URL::to('/show_all_completed_jobs')}}" class=""><i class="lnr lnr-chart-bars"></i> <span>Show All Completed Jobs</span></a></li>      

						<li><a href="{{URL::to('/project_expenses')}}" class=""><i class="lnr lnr-chart-bars"></i> <span>Create Expenses</span></a></li>

						<li><a href="{{URL::to('/show_all_expenses')}}" class=""><i class="lnr lnr-chart-bars"></i> <span>Show All Expenses</span></a></li>

						<li><a href="{{URL::to('/add_supplier')}}" class=""><i class="lnr lnr-chart-bars"></i> <span>Add Supplier</span></a></li>

						<li><a href="{{URL::to('/show_all_customers')}}" class=""><i class="lnr lnr-chart-bars"></i> <span>Customer Management</span></a></li>

						<li><a href="{{URL::to('/show_all_supplier')}}" class=""><i class="lnr lnr-chart-bars"></i> <span>Show All Suplier</span></a></li>

						<li><a href="{{URL::to('/show_all_customers')}}" class=""><i class="lnr lnr-chart-bars"></i> <span>Show All Customers</span></a></li>


						<li><a href="{{URL::to('/all_quotation')}}" class=""><i class="lnr lnr-chart-bars"></i> <span>All Quotation</span></a></li> 

						<li><a href="{{URL::to('/product_crud')}}" class=""><i class="lnr lnr-chart-bars"></i> <span>Create Product</span></a></li> 

						<li><a href="{{URL::to('/user_management')}}" class=""><i class="lnr lnr-chart-bars"></i> <span>User Management</span></a></li> 

						<li><a href="{{URL::to('/customer_payment')}}" class=""><i class="lnr lnr-chart-bars"></i> <span>Customer Payment</span></a></li>  

						<li><a href="{{URL::to('/show_all_supplier_data')}}" class=""><i class="lnr lnr-chart-bars"></i> <span>Show All Supplier</span></a></li>

						<li><a href="{{URL::to('/create_invoice')}}" class=""><i class="lnr lnr-chart-bars"></i> <span>Create Performa Invoice</span></a></li>

						<li><a href="{{URL::to('/sales_report')}}" class=""><i class="lnr lnr-chart-bars"></i> <span>Sales Report</span></a></li>

						<li><a href="{{URL::to('/show_all_todays_new_job')}}" class=""><i class="lnr lnr-chart-bars"></i> <span>Customer Without Job</span><span class="badge bg-danger">{{@$not_started_job}}</span></a></li>


						<li><a href="{{URL::to('/revised_quotation')}}" class=""><i class="lnr lnr-chart-bars"></i> <span>Revised Quotation</span></a></li>

						<li><a href="{{URL::to('/ready_for_quotation')}}" class=""><i class="lnr lnr-chart-bars"></i> <span>Ready For Quotation</span></a></li>


						<li><a href="{{URL::to('/supplier_for_a_project')}}" class=""><i class="lnr lnr-chart-bars"></i> <span>Supplier For A Project</span></a></li>


						<li><a href="{{URL::to('/create_invoice')}}" class=""><i class="lnr lnr-chart-bars"></i> <span>Delivery Note</span></a></li>

{{-- 						<li><a href="{{URL::to('/advanced_search')}}" class=""><i class="lnr lnr-chart-bars"></i> <span>Advanced Search</span></a></li> --}}

					{{-- 	<li><a href="panels.html" class=""><i class="lnr lnr-cog"></i> <span>Panels</span></a></li>
						<li><a href="notifications.html" class=""><i class="lnr lnr-alarm"></i> <span>Notifications</span></a></li>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Pages</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="page-profile.html" class="">Profile</a></li>
									<li><a href="page-login.html" class="">Login</a></li>
									<li><a href="page-lockscreen.html" class="">Lockscreen</a></li>
								</ul>
							</div>
						</li>
						<li><a href="tables.html" class=""><i class="lnr lnr-dice"></i> <span>Tables</span></a></li>
						<li><a href="typography.html" class=""><i class="lnr lnr-text-format"></i> <span>Typography</span></a></li>
						<li><a href="icons.html" class=""><i class="lnr lnr-linearicons"></i> <span>Icons</span></a></li> --}}
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">