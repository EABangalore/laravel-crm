@extends('main-layout.main')

  @section('css')
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
							  	<div class="col-md-6 col-sm-12">
								<label>Company Name&nbsp;<sup class="red">*</sup></label>
								<input type="text" name="company_name" class="form-control" placeholder="Name">
							    </div>

							    <div class="col-md-6 col-sm-12">
							         <label>Priority</label>

									<select name="priority" class="form-control">
										<option value="Low" selected>Low</option>
										<option value="Medium">Medium</option>
										<option value="High">High</option>
									</select>
							    </div>

							 </div>

                               <hr>


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


    <script>

    $(function(){

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

	                    <div class="col-md-2">
	                    	<button type="button" data-addressId="${addressii}" class="btn btn-danger btn_addressRemove"><i class="fa fa-trash-o"></i></button>
	                    </div>
                        <hr>
                    </div></td>

                    </tr><br>`);


                    addressii = 2;




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

	                    <div class="col-md-2">
	                    	<button type="button" data-addressId="${addressii}" class="btn btn-danger btn_addressRemove"><i class="fa fa-trash-o"></i></button>
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


    });

    </script>
  @endsection