@extends('main-layout.main')

  @section('css')
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/jquery.datetimepicker.min.css"/>
  @endsection

   @section('content')
        <div class="container">


        	<form action="relate_supplier" method="POST">



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


        		  <div class="row">
        		  	  <div class="col-md-4">

        		  	  	  <div class="form-group">
        		  	  	  	<label>Start Date</label>
				                <div class="input-group date">
				                    <input type="text" name="from_date" class="form-control" id="datetimepicker1"/>
				                    <span class="input-group-addon">
				                        <span class="glyphicon glyphicon-calendar"></span>
				                    </span>
				                </div>
				            </div>
        		  	  </div>


        		  	  <div class="col-md-4">
        		  	  	  
        		  	  	     <div class="form-group">
        		  	  	     	<label>End Date</label>
				                <div class="input-group date">
				                    <input type="text" name="to_date" class="form-control" id="datetimepicker2"/>
				                    <span class="input-group-addon">
				                        <span class="glyphicon glyphicon-calendar"></span>
				                    </span>
				                </div>
				            </div>

        		  	  </div>

        		  </div>

                   <div class="col-md-8">

                   	        <label>Project Name /Company Name</label>
                   	
	                   	   	<select name="customer_id" class="form-control selectpicker checkForChange" data-live-search="true">

							   @foreach($data as $dat)

								   <option  value="{{$dat->id}}" title="{{$dat->email}}">{{$dat->company_name}}</option>

								 @endforeach
						  </select>
						  <br/>
                   </div>


                   <div class="col-md-8">

                   	        <label>All Suppliers</label>  
                   	
	                   	   	<select name="supplier_id" id="supplier_id" class="form-control selectpicker allSuppliers" data-live-search="true">

	                   	        <option value="" title="">-- Please Select --</option>

							   @foreach($allSuppliers as $dat)

								   <option  value="{{$dat->id}}" title="{{$dat->supplier_name}}">{{$dat->supplier_name}}</option>

								 @endforeach  
						  </select>
						  <br/>
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


     @section('js')
         <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.js"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js"></script>


         <script type="text/javascript">
         

         $(function(){


         	$('#supplier_id').change(function(){
              
	            var baseUrlMain = $('#allTheBaseUrl999987').val();

	             var goUrl = baseUrlMain+'/get_supplier_data/';    

	            var supplierId = $('#supplier_id').val();
 

		       	  $.ajax({
		       	   	  url:goUrl,
		       	   	  type:'POST',
		       	   	  data:{_token:$('meta[name="csrf-token"]').attr('content'),supplier_id:supplierId},
		       	   	  dataType:'json',
		       	   	  success:function(data){

	                    console.log(data);


	                    $('input[name="supplier_name"]').val(data.data.supplier_name);

	                    $('input[name="supplier_address"]').val(data.data.supplier_address);

	                    $('input[name="contact_person"]').val(data.data.contact_person);


	                    $('input[name="contact_number"]').val(data.data.contact_number);


	                    $('textarea[name="note"]').val(data.data.note);   
	      

		       	   	  }
		       	   }); 
	         	});


         $('#datetimepicker1,#datetimepicker2').datetimepicker({'minDate':0});  

       });  

       </script>
  @endsection