@extends('main-layout.main')

  @section('content')
       
       <div class="container">


        	<form action="create_supplier" method="POST">



                <div class="col-md-10">
                    
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

				</div>

        		 {{csrf_field()}}

                   <div class="col-md-8">

                   	        <label>Project Name /Company Name</label>
                   	
{{-- 	                   	   	<select name="customer_id" class="form-control selectpicker checkForChange" data-live-search="true">

							   @foreach($data as $dat)

								   <option  value="{{$dat->id}}" title="{{$dat->email}}">{{$dat->company_name}}</option>

								 @endforeach
						  </select> --}}
                   </div>

		            <div class="col-md-8">
		            	<br/>
		              	<label>Supplier Name</label>
		                <input type="text" name="supplier_name" class="form-control" placeholder="text field">
		                <br/>
		            </div>
		            <div class="col-md-8">
		              	<label>Supplier Address</label>
		                <input type="text" name="supplier_address" class="form-control" placeholder="text field">
		                <br/>
		            </div>



		            <div class="col-md-8">
		              	<label>Contact Person</label>
		                <input type="text" name="contact_person" class="form-control" placeholder="text field">
		                <br/>
		            </div>

		             <br/>
		            <div class="col-md-8">
		              	<label>Contact Number</label>
		                <input type="text" name="contact_number" class="form-control" placeholder="text field">
		                <br/>
		            </div>

		           <div class="col-md-8">
		           	  <label>Note</label>
		           	   <textarea class="form-control" name="note" placeholder="textarea" rows="4"></textarea>
		           	   <br/>
		           </div>


		           <div class="col-md-8">
		           	   <input type="submit" class="btn btn-primary" value="Add Supplier">
		           </div>

		         </form>
         </div>

  @endsection