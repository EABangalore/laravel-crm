@extends('main-layout.main')

  @section('css')

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/jquery.datetimepicker.min.css"/>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
  
      <style>
      	 .red{color:red;}

      	 .floatRight{float:right;}

      	 .classForCenter{ margin: 0px 0px 0px 300px;}
      </style>
  @endsection

  @section('content')
     		      <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">New Customer</h3>
								</div>
					<div class="panel-body">

               @if(session()->has('message'))
					<div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<i class="fa fa-check-circle"></i> {{ session()->get('message') }}
					</div>

				@endif

					    <form action="create-newjob" method="POST">

					    	{{csrf_field()}}

							 <div class="row">
							  	<div class="col-md-4 col-sm-12">
								<label>Company Name&nbsp;<sup class="red">*</sup></label>
								<input type="text" name="company_name" class="form-control" placeholder="Name">
							    </div>

							    <div class="col-md-3 col-sm-12">
							         <label>Priority</label>

									<select name="priority" class="form-control holdFor">

										<option value="" selected>-- Please Select -- </option>
										<option value="readyForQuotation" data-attr="rdq">Ready For Quotation</option>
										<option value="holdFor" data-attr="hf">Hold For</option>
										<!--<option value="High">High</option>-->
									</select>
							    </div>


							   <div id="holdForDiv" style="display:none;"> 

							    <div class="col-md-2">
							      <label>From</label>
								  <input type="text" name="hold_from" id="datetimepicker111" class="form-control" placeholder="From Date">
							    </div>


							   <div class="col-md-2">
							      <label>To</label>
								  <input type="text" name="hold_to" id="datetimepicker222" class="form-control" placeholder="To Date">
								  <br/>
							    </div>

							 </div>


							    <div class="col-md-2">

							    	<label class="fancy-radio">
										<input name="lead" value="Marketing" type="radio" data-table="marketing_team">
										<span><i></i>Marketing</span>
									</label>
									<label class="fancy-radio">
										<input name="lead" value="Website" type="radio" data-table="website_team">
										<span><i></i>Website</span>
									</label>

									<label class="fancy-radio">
										<input name="lead" value="Internal_Reference" type="radio" data-table="internal_refrer">
										<span><i></i>Internal Reference</span>
									</label>
							    </div>

							    <div class="col-md-4" id="mainDivRefrer">
							    	
							      <select name="refrer_name" class="form-control" id="refrerIdentifier" style="display:none;">
									</select>

							    </div>

							 </div>

                               <hr>

                     <div class="row">
                                	
                            <div class="col-md-6 col-sm-12">
								<label>Product Name</label>
									<select name="product_name[]" multiple="multiple" id="allProductsName" class="form-control">


							          @foreach($data as $dat)
                                          <option value="{{$dat->product_name}}">{{$dat->product_name}}</option>
							          @endforeach

									</select>

                            </div>

                          <div class="col-md-6">
                            <label>Product Description</label>
                            <textarea class="form-control" name="product_description" placeholder="textarea" rows="4"></textarea>
                            	
                           </div>

                      </div>


                               <hr/>


                                  <h3>Primary Contacts</h3>

                          <div class="row">
								  	<div class="col-md-6 col-sm-12">
									<label>Contact Name&nbsp;<sup class="red">*</sup></label>
									<input type="text" name="contact_name" class="form-control" placeholder="Name">
								  </div>
								 <div class="col-md-6 col-sm-12">
								     <label>E-mail&nbsp;<sup class="red">*</sup></label>
									<input type="email" class="form-control" placeholder="Enter your E-mail" name="email[]">
                                    
                                    <br>
                                    
                          			 <table class="table" id="emailTableBody">
		
									</table>

									<button id="addEmailButton" type="button" class="btn btn-default"><i class="fa fa-plus-square"></i>Add another e-mail</button>


								  </div>

								  <hr>


                             <br/>

                           <div class="row">
		                            <div class="col-md-4 col-sm-12">
		                              <label>Phone&nbsp;<sup class="red">*</sup></label>
									  <input type="text" name="phone[]" class="form-control">

		                           </div>

		                           <div class="col-md-2 col-sm-12">
		                              <label>Ext&nbsp;<sup class="red">*</sup></label>
									  <input type="text" name="ext[]" class="form-control">
		                               
		                               <br>
		                           </div>

		                           <br>

                                 <div class="col-md-2"><select name="phone_group[]" class="form-control">
										<option value="Home">Home</option>
										<option value="Mobile">Mobile</option>
										<option value="Work">Work</option>
										<option value="Toll Free Number">Toll Free Number</option>
										{{-- <option value="fax">fax</option> --}}
									</select>
								 </div>
		                     
		                     </div>

                         <table class="table" id="phoneTableBody">
                              
						</table>

					</hr>

					
					<button type="button" id="addPhoneButton" class="btn btn-default" style="margin-left:88px;"><i class="fa fa-plus-square"></i>Add another phone</button>

		                         
						  


		   	   <hr>	
                   <h3>Addresses</h3>


                   <table class="table" id="addressTableBody67891"></table>


{{--                    <button type="button" id="addAddressButton" class="btn btn-default classForCenter btn_addressRemove"><i class="fa fa-plus-square"></i>Add another address</button> --}}
				<hr>


				<input style="float:right;" type="submit" value="Save" class="btn btn-success"/> 

		     </form>								

				</div>
		</div>


  @endsection

  @section('js')

  <!-- cdn here -->

 <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>


    <script>

    $(function(){


          var products = $('select#allProductsName option').map(function() {return $(this).val();}).get();


	          $('#allProductsName').select2({
				data: products, //["Clare","Cork","South Dublin"],
			    tags: true,
			    tokenSeparators: [','], 
			    placeholder: "Add your tags here"
	         });


			     var emailii=1;  
			      $('#addEmailButton').click(function(){  
			           emailii++;   

			             $('#emailTableBody').append(`<tr id="email${emailii}">
							<td><input type="email" class="form-control" placeholder="Enter your E-mail" name="email[]"></td>
							<td><button type="button" data-emailId="${emailii}" class="btn btn-danger btn_emailRemove"><i class="fa fa-trash-o"></i></button></td></tr>`);

			      });  
			      $(document).on('click', '.btn_emailRemove', function(){  
			           var button_id = $(this).attr("data-emailId");

			           console.log(button_id);

			           $('#email'+button_id+'').remove();  
			      }); 


         /**
          *   code for phone numbers
          */


			   var phoneii = 1;

			   $('#addPhoneButton').click(function(){
                    phoneii++;

                    $('#phoneTableBody').append(` <tr id="phone${phoneii}"><td> <div class="row">
		                             <div class="col-md-6 col-sm-12">
		                              <label>Phone&nbsp;<sup class="red">*</sup></label>
									  <input type="text" name="phone[]" class="form-control">
		                           </div>
		                           <div class="col-md-2 col-sm-12">
			                              <label>Ext&nbsp;<sup class="red">*</sup></label>
										  <input type="text" name="ext[]" class="form-control">

			                       </div>

			                       <td><div class="col-md-8"><select name="phone_group[]" class="form-control">
										<option value="Home">Home</option>
										<option value="Mobile">Mobile</option>
										<option value="Work">Work</option>
										<option value="Toll Free Number">Toll Free Number</option>
									</select></div></td>
		                       </td></div>
		                       <div class="col-md-2 col-sm-12"><td><button type="button" data-phoneId="${phoneii}" class="btn btn-danger btn_phoneRemove"><i class="fa fa-trash-o"></i></button></td></div>
                              </tr>`);

			   }); 


			   	$(document).on('click', '.btn_phoneRemove', function(){  
			           var button_id = $(this).attr("data-phoneId");

			           console.log(button_id);

			           $('#phone'+button_id+'').remove();  
			      });


	     /**
          *  end of code for phone numbers
          */

          /*  -------------------------------------------------------   */

        /**    
         *   code for addresses 
         */



        


          
          	 var addressii = 1;


                    $('#addressTableBody67891').append(`<tr id="address${addressii}"><td><div class="row">
                       
                         <div class="col-md-4 col-sm-12">
									  
									<select name="addresstype[]" class="form-control">
										<option value="other" selected>other</option>
										<option value="primar">Primary</option>
										<option value="billing">Billing</option>
										<option value="shipping">Shipping</option>
										<option value="install">Install</option>
										<option value="drop_ship_to">Drop Ship to</option>
									</select>
		                               
		                               <br>
		                   </div>

		                    <div class="col-md-4 col-sm-12">

							  <input type="text" placeholder="Address Name" class="form-control" address_name[]><br>

		                   </div>

		                        <div class="col-md-4 col-sm-12">

						       <input type="text" name="attention_to[]" placeholder="Attention to" class="form-control">
		                               
		                               <br>
		                   </div>	

                    </div>

                    <div class="row">
                    	
                    	 <div class="col-md-8 col-sm-12">

							  <input type="text" placeholder="Street Name" class="form-control" name="street[]"><br>

		                   </div>

		                 <div class="col-md-4 col-sm-12">

							  <input type="text" placeholder="Another Street" class="form-control" name="another_street[]"><br>

		                   </div>

                    </div>

                    <div class="row">
                    	<div class="col-md-4">
                    	 <input type="text" placeholder="Suburb" class="form-control" name="another_street[]">
                    	</div>
                    </div>

                    <br>



                   <div class="row">
                       
                         <div class="col-md-4 col-sm-12">
									  
                           <input type="text" placeholder="City" class="form-control" name="city[]">
		                               
		                               <br>
		                   </div>

		                    <div class="col-md-4 col-sm-12">

							  <input type="text" placeholder="State" name="state[]" class="form-control" ><br>

		                   </div>

		                        <div class="col-md-4 col-sm-12">

						       <input type="text" name="zip[]" placeholder="Zip" class="form-control">
		                               
		                               <br>
		                   </div>	

                    </div>

                    <div class="row">
	                    <div class="col-md-12">
	                    	<input type="text" name="country[]" placeholder="Country" class="form-control">
	                    </div>
                    </div>

                    <br/>

                     <div class="row">
	                    <div class="col-md-8">
	                        <hr>
	                    </div>



                        <hr>
                    </div></td>

                    </tr><br>`);


                    addressii = 2;


                    /* 
                      
                      removed from above first hr, place on top of hr

                      
	                    <div class="col-md-2">
	                    	<button type="button" data-addressId="${addressii}" class="btn btn-danger btn_addressRemove"><i class="fa fa-trash-o"></i></button>
	                    </div>
                       
                    */




			   $('#addAddressButton').click(function(){


			   	    console.log('clicked');

                    addressii++;

                    $('#addressTableBody67891').append(`<tr id="address${addressii}"><td><div class="row">
                       
                         <div class="col-md-4 col-sm-12">
									  
									<select name="addresstype[]" class="form-control">
										<option value="other" selected>other</option>
										<option value="primar">Primary</option>
										<option value="billing">Billing</option>
										<option value="shipping">Shipping</option>
										<option value="install">Install</option>
										<option value="drop_ship_to">Drop Ship to</option>
									</select>
		                               
		                               <br>
		                   </div>

		                    <div class="col-md-4 col-sm-12">

							  <input type="text" placeholder="Address Name" class="form-control" address_name[]><br>

		                   </div>

		                        <div class="col-md-4 col-sm-12">

						       <input type="text" name="attention_to[]" placeholder="Attention to" class="form-control">
		                               
		                               <br>
		                   </div>	

                    </div>

                    <div class="row">
                    	
                    	 <div class="col-md-8 col-sm-12">

							  <input type="text" placeholder="Street Name" class="form-control" name="street[]"><br>

		                   </div>

		                 <div class="col-md-4 col-sm-12">

							  <input type="text" placeholder="Another Street" class="form-control" name="another_street[]"><br>

		                   </div>

                    </div>

                    <div class="row">
                    	<div class="col-md-4">
                    	 <input type="text" placeholder="Suburb" class="form-control" name="another_street[]">
                    	</div>
                    </div>

                    <br>



                   <div class="row">
                       
                         <div class="col-md-4 col-sm-12">
									  
                           <input type="text" placeholder="City" class="form-control" name="city[]">
		                               
		                               <br>
		                   </div>

		                    <div class="col-md-4 col-sm-12">

							  <input type="text" placeholder="State" name="state[]" class="form-control" ><br>

		                   </div>

		                        <div class="col-md-4 col-sm-12">

						       <input type="text" name="zip[]" placeholder="Zip" class="form-control">
		                               
		                               <br>
		                   </div>	

                    </div>

                    <div class="row">
	                    <div class="col-md-12">
	                    	<input type="text" name="country[]" placeholder="Country" class="form-control">
	                    </div>
                    </div>

                    <br/>

                     <div class="row">
	                    <div class="col-md-8">
	                        <hr>
	                    </div>

                        <hr>
                    </div></td>

                    </tr><br>`);

			   }); 


			   	$(document).on('click', '.btn_addressRemove', function(){  
			           var button_id = $(this).attr("data-addressId");

			           console.log(button_id);

			           $('#address'+button_id+'').remove();  
			      });

        /**    
         *   code for addresses 
         */

       
		$('input[type="radio"]').click(function(){

           

	       	 var baseUrlMain = $('#allTheBaseUrl999987').val();

             var goUrl = baseUrlMain+'/get_team_name/';

		    var type = $(this).val();

			   if(type == 'Website'){

			   	 console.log('website');


			   	 $('#refrerIdentifier').remove();


                  $('#mainDivRefrer').html('');

			   	 $('#mainDivRefrer').append(`<select name="refrer_name" class="form-control" id="refrerIdentifier" style="display:none;">
									</select><label>Website Name</label><input type="text" name="refrer_name" class="form-control">`);

			   	 return false;

			   }else if(type == 'Internal_Reference'){
                  console.log('Internal_Reference');

                   $('#refrerIdentifier').remove();

                   $('#mainDivRefrer').html('');

                   $('#mainDivRefrer').append(`							      <select name="refrer_name" class="form-control" id="refrerIdentifier" style="display:none;">
									</select><label>Internal Refrer</label><input type="text" name="refrer_name" class="form-control">`);

                  return false;
			   }

		    var tableName = $(this).data('table');

		    $.ajax({
		    	url:goUrl,
		    	type:'POST',
		    	data:{_token:$('meta[name="csrf-token"]').attr('content'),table_name:tableName},
		    	dataType:'json',
		    	success:function(data){
		    		var option = '';
		    		$('#refrerIdentifier').html('');

		    		$('#mainDivRefrer').find('input[type="text"]').remove();
		    		$('#mainDivRefrer').find('label').remove();
		    		console.log(data);
		    		$.each(data.data,function(i,v){
		    		
		    		    option += '<option value="'+v.name+'">'+v.name+'</option>';
                         
		    			//console.log(' v ',v.name);
		    		});

		    		$('#refrerIdentifier').append(option).show();

		    	},
		    });
		});
       
      $('.holdFor').on('change',function(){

      	  console.log($(this).val());

      	  console.log($(this).data('attr'));
           
          if($(this).val() == 'readyForQuotation'){
              
             $('#holdForDiv').hide(); 

              return false;
           }


          $('#holdForDiv').show();

      	     
      });

      $('#datetimepicker111,#datetimepicker222').datetimepicker({'minDate':0});
    });

    </script>
  @endsection