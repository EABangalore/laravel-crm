@extends('main-layout.main')

  @section('css')
      <style>
      	 .red{color:red;}

      	 .floatRight{float:right;}

      	 .classForCenter{ margin: 0px 0px 0px 300px;}
      </style>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/jquery.datetimepicker.min.css"/>
  @endsection


  @section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js"></script>

  <script type="text/javascript">

  	   $(function(){
          $('#datetimepicker1,#datetimepicker2').datetimepicker({'minDate':0});
  	   });
     	
   </script>
  @endsection

  @section('content')
     		        <div class="panel">
						 <div class="panel-heading">
							 <h3 class="panel-title">New Job</h3>
						  </div>
					     <div class="panel-body">


					@if(session()->has('message'))  	

					   <div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						 <i class="fa fa-check-circle"></i> {{ session()->get('message') }}
					 </div>

					 @endif

					@if(session()->has('error'))  	

					   <div class="alert alert-danger alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						 <i class="fa fa-check-circle"></i> {{ session()->get('error') }}
					 </div>

					 @endif
						
						   <form action="original_job_post" method="POST">	

						     {{csrf_field()}}	  

							<div class="row">
								  	<div class="col-md-6 col-sm-12">
									<label>Workflow&nbsp;<sup class="red">*</sup></label>
									
									<select name="workflow" class="form-control">
										<option value="other" selected>other</option>
										<option value="primar">Primary</option>
										<option value="billing">Billing</option>
										<option value="shipping">Shipping</option>
										<option value="install">Install</option>
										<option value="drop_ship_to">Drop Ship to</option>
									</select>

								    </div>


								 <div class="col-md-6">

                                     <label>Reviewers&nbsp;<sup class="red">*</sup></label>
								    <input type="text" name="reviewer" class="form-control" placeholder="text field">

								    <br/>

								</div>

							</div>


							<br/>




							<div class="row">
								  	<div class="col-md-6 col-sm-12">
									<label>Customer name&nbsp;<sup class="red">*</sup></label>
									
									<select name="customer_name" class="form-control">
										<option value="other" selected>other</option>
										<option value="primar">Primary</option>
										<option value="billing">Billing</option>
										<option value="shipping">Shipping</option>
										<option value="install">Install</option>
										<option value="drop_ship_to">Drop Ship to</option>
									</select>

								    </div>

								    <br/>


								 <div class="col-md-6">

                                     <label>Contact name&nbsp;<sup class="red">*</sup></label>
								    <input type="text" name="contact_name" class="form-control" placeholder="text field">

								</div>

							</div>

                            <hr/>

                           <br/>

                       <div class="row">

                       	 <label>Name&nbsp;<sup class="red">*</sup></label>

                          <input type="text" name="name" class="form-control" placeholder="text field">
								 
						</div>

						<br/>


				     <div class="row">

				     	 <label>Description&nbsp;<sup class="red">*</sup></label>

						 <textarea class="form-control" name="description" placeholder="textarea" rows="4"></textarea>

				    </div>


			      <hr>	

			      <div class="row">
                      <div class="col-md-3">
                      	<label>Order#&nbsp;<sup class="red">*</sup></label>
                        <input type="text" name="order_number" class="form-control" placeholder="text field">
                      </div>

                      <div class="col-md-3">
                      	<label>Line#&nbsp;<sup class="red">*</sup></label>
                        <input type="text" name="line_number" class="form-control" placeholder="text field">
                      </div>

                      <div class="col-md-3">
                      	<label>PO#&nbsp;<sup class="red">*</sup></label>
                        <input type="text" name="po_number" class="form-control" placeholder="text field">
                      </div>

                      <div class="col-md-3">
                      	<label>Quantity&nbsp;<sup class="red">*</sup></label>
                        <input type="text" name="quantity" class="form-control" placeholder="text field">
                      </div>

			      </div>

			      <br/>

			      <div class="row">
			      	{{--  <div class="col-md-3">
			      	    <label>Due date&nbsp;<sup class="red">*</sup></label>
                        <input type="text" name="due_date" class="form-control" placeholder="text field">
                      </div> --}}

                      	  <div class= "col-md-3">
				        	<label>Due date&nbsp;<sup class="red">*</sup></label>
		
				            <div class="form-group">
				                <div class='input-group date' >
				                    
     			                    <input type='text' name="due_date" class="form-control" id="datetimepicker1"/>
				                    <span class="input-group-addon">
				                        <span class="glyphicon glyphicon-calendar"></span>
				                    </span>
				                </div>
				            </div>
				        </div>


			      </div>

			      <br/>

			     <div class="row">
			      	 <div class="col-md-4">
			      	    <label>Billing Address&nbsp;<sup class="red">*</sup></label>
                        <input type="text" name="billing_address" class="form-control" placeholder="text field">
                      </div>

                      <div class="col-md-4">
			      	    <label>Shipping Address&nbsp;<sup class="red">*</sup></label>
                        <input type="text" name="shipping_address" class="form-control" placeholder="text field">
                      </div>

                      <div class="col-md-4">
			      	    <label>Installing Address&nbsp;<sup class="red">*</sup></label>
                        <input type="text" name="installing_address" class="form-control" placeholder="text field">
                      </div>
			      </div>

			      <br/>

			     <hr/>

                 <h4>Details</h4>
			    <div class="row">
			    	
				       <div class="col-md-3">
				       	    <label>Design&nbsp;<sup class="red">*</sup></label>

							 <textarea class="form-control" name="design" placeholder="textarea" rows="4"></textarea>
				       </div>

				       <div class="col-md-3">
				       	    <label>Production&nbsp;<sup class="red">*</sup></label>
							 <textarea class="form-control" name="production" placeholder="textarea" rows="4"></textarea>
				       </div>

				       <div class="col-md-3">
				       	    <label>Shipping&nbsp;<sup class="red">*</sup></label>
							 <textarea class="form-control" name="shipping" placeholder="textarea" rows="4"></textarea>
				       </div>

				        <div class="col-md-3">
				       	    <label>Install&nbsp;<sup class="red">*</sup></label>
							 <textarea class="form-control" name="install" placeholder="textarea" rows="4"></textarea>
				       </div>

			    </div>

			    <hr/>

			    <div class="row">
			    	 
                     {{--  <input type="text" class="form-control" placeholder="text field"> --}}
				        <div class= "col-md-3">
				        	<label>Ship Date&nbsp;<sup class="red">*</sup></label>
		
				            <div class="form-group">
				                <div class='input-group date' >
				                    
				                    <input type='text' name="shipping_date" class="form-control" id="datetimepicker2"/>
				                    <span class="input-group-addon">
				                        <span class="glyphicon glyphicon-calendar"></span>
				                    </span>
				                </div>
				            </div>
				        </div>

                     <br/>
			    </div>

			    <hr/>

			    <br/>

			    <div class="row">

			        <div class="col-md-4">
			      	    <label>Production Manager&nbsp;<sup class="red">*</sup></label>
                        <input type="text" name="production_manager" class="form-control" placeholder="text field">
                      </div>

                      <div class="col-md-4">
			      	    <label>Project Manager&nbsp;<sup class="red">*</sup></label>
                        <input type="text" name="project_manager" class="form-control" placeholder="text field">
                      </div>

                      <div class="col-md-4">
			      	    <label>Sales Rep&nbsp;<sup class="red">*</sup></label>
                        <input type="text" name="sales_representative" class="form-control" placeholder="text field">
                      </div>
			    	
			    </div>

			    <br/>

			    <div class="row">
			       <div class="col-md-4">
				    	 <label>Shipping Method&nbsp;<sup class="red">*</sup></label>
	                      <input type="text" name="shipping_method" class="form-control" placeholder="text field">
                    </div>
			    </div>

			    <hr/>

			    <br/>

			    <div class="row">


			        <label class="fancy-checkbox">
						<input type="checkbox" name="rush">
						<span>Rush</span>
				    </label>

                    <div class="col-md-3">
                          <label>Priority&nbsp;<sup class="red">*</sup></label>
	                      <input type="text" name="priority" class="form-control" placeholder="text field">
                    </div>

                     <div class="col-md-9">
                          <label>Local file&nbsp;<sup class="red">*</sup></label>
	                      <input type="text" name="local_file" class="form-control" placeholder="text field">
                    </div>
			    	
			    </div>

			    <br/>

			    <input style="float:right;" type="submit" value="Save" class="btn btn-success">

			   </form>
			
			</div>
		
		</div>

  @endsection

