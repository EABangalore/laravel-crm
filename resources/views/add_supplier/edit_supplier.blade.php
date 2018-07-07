@extends('main-layout.main')
   
   @section('content')
             <div class="container">

            <h2>Update Customer</h2>


        	<form action="{{URL::to('show_all_supplier_update/'.$data->id)}}" method="POST">



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
                   	
{{-- 	                   	   	<select name="customer_id" class="form-control selectpicker checkForChange" data-live-search="true">

							   @foreach($data as $dat)

								   <option  value="{{$dat->id}}" title="{{$dat->email}}">{{$dat->company_name}}</option>

								 @endforeach
						  </select> --}}
						  <br/>
                   </div>

		            <div class="col-md-8">
		            	<br/>
		              	<label>Supplier Name</label>
		                <input type="text" name="supplier_name" value="{{$data->supplier_name}}" class="form-control" placeholder="text field">
		                <br/>
		            </div>
		            <div class="col-md-8">
		              	<label>Supplier Address</label>
		                <input type="text" name="supplier_address" value="{{$data->supplier_address}}" class="form-control" placeholder="text field">
		                <br/>
		            </div>



		            <div class="col-md-8">
		              	<label>Contact Person</label>
		                <input type="text" name="contact_person" value="{{$data->contact_person}}" class="form-control" placeholder="text field">
		                <br/>
		            </div>

		             <br/>
		            <div class="col-md-8">
		              	<label>Contact Number</label>
		                <input type="text" name="contact_number" value="{{$data->contact_number}}" class="form-control" placeholder="text field">
		                <br/>
		            </div>

		           <div class="col-md-8">
		           	  <label>Note</label>
		           	   <textarea class="form-control" name="note" placeholder="textarea" rows="4">{{$data->note}}</textarea>
		           	   <br/>
		           </div>


		           <div class="col-md-8">
		           	   <input type="submit" class="btn btn-primary" value="Update Supplier">
		           </div>

		         </form>
   @endsection