@extends('main-layout.main')

  @section('css')
      <style>
      	 .red{color:red;}

      	 .floatRight{float:right;}

      	 .classForCenter{ margin: 0px 0px 0px 300px;}

      	 .overflowScrolll{width:100%;height:300px;overflow: scroll;}

		tr#lastTotalRow {
		    background-color: darkseagreen;
		}
      </style>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/jquery.datetimepicker.min.css"/>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.css">

  @endsection


  @section('js')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.js"></script>

  <script type="text/javascript">


  	      function showTotalAtBottom(index,class2){

              //var grandTotal = 0;

               var arr = $('.'+class2).map(function(){

                console.log($(this).find('tr td').eq(index).text());

                var lastTotal = Number($(this).find('td').eq(index).text());


                return lastTotal;

                // var overAllTotal = 0;

                // var overAllTotal = lastTotal + overAllTotal;

                // grandTotal = overAllTotal;

              }); 

               console.log(arr);

               return arr;  
            }

    function  makeSingleTable(){
    
	      $('[id]').each(function () {
	          $('[id="' + this.id + '"]').find('#lastTotalRow').remove();
	      });


	      $('[id]').each(function () {
	          $('[id="' + this.id + '"]:gt(0)').attr('id','').addClass('secondTable').addClass('table').addClass('table-bordered');
	      });


	      $('.secondTable').each(function(){
	         var cloned = $(this).find('tbody').clone();
	         $('#showQuotation').append(cloned);
	      });


	      $('.secondTable').each(function(){
	        $(this).remove();
	      });


	       var totalPrice = showTotalAtBottom(3,'allTheQuotationRow');

	       console.log('grand',totalPrice);

	       totalPrice = totalPrice.toArray();

	        var sum =0;

	       for(var ii =0; ii<totalPrice.length;ii++){

	          sum = sum + totalPrice[ii];
	       }

	       $('#lastTotalRow').remove();

	       $('#showQuotation tbody:last').append('<tr id="lastTotalRow"><td>total</td><td></td><td></td><td>'+sum+'</td></tr>');

	       $('#showQuotation').addClass('table-bordered');


	       $('#showQuotation').find('td').each(function(){
	            $(this).prop('contenteditable', false);  
	      });


     }


    $(function(){



     setTimeout(function(){
           
           $("#customer_id").val($("#customer_id option:first").val());

           $('#customer_id').selectpicker('refresh').change();

     },300);



      //$('#customer_id').selectpicker('refresh');


    	$('#previewTableScrollId').hide();

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
										<option value="fax">fax</option>
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


		$('#customer_id').change(function(){

		    var customerId = $(this).val();

		     var baseUrlMain = $('#allTheBaseUrl999987').val();

             var goUrl = baseUrlMain+'/get_contact_name/';

		    //var type = $(this).val();

		    //var tableName = $(this).data('table');

		    /* remove hasid */
                  
              $('#po_number436643').val('');

		    /* remove hashid */

		    $.ajax({
		    	url:goUrl,
		    	type:'POST',
		    	data:{_token:$('meta[name="csrf-token"]').attr('content'),customer_id:customerId},
		    	dataType:'json',
		    	success:function(data){

		    		console.log(data.data);

		    $('input[name="billing_address"]').val(data.data.street + data.data.another_street+' , '+ data.data.city + ' , '+data.data.state);  


		     $('input[name="shipping_address"]').val(data.data.street + data.data.another_street+' , '+ data.data.city + ' , '+data.data.state);

		    $('input[name="installing_address"]').val(data.data.street + data.data.another_street+' , '+ data.data.city + ' , '+data.data.state);

		    $('textarea[name="design"]').val(data.data.product_description);


		    $('textarea#productDescription86585').val(data.data.product_description);


		    		//var allProductSpecification = JSON.parse(data.json); 

		    		//console.log('all products ',allProductSpecification);


		    		//allProductSpecification.shift();	

		    		//delete  allProductSpecification[0];


		    		//console.log('all products  after ',allProductSpecification);

		    		var keys = [];

		    		var forShowingQuanity = [];

		    		var sss ='';

		    	   const allProductSpecification = JSON.parse(data.json, (key, value) => (value === {}.toString() ? undefined : value));


		    		for(var k in allProductSpecification){

		    			console.log('im here',allProductSpecification[k][0]);

			    	 allProductSpecification[k].map(function(v){
	                       forShowingQuanity.push({name:k,quantity:v.Quantity,price:v.Price,amount:v.Amount});

	                     if(k != 'total'){
                              sss += k +' => '+ v.Quantity+ ' ';
	                      }
			    	 });


			    	 console.log(sss);



		    			console.log('all Quantity',allProductSpecification[k].Quantity);
		    		}

		    	   console.log('art ',forShowingQuanity); 


                    for(var k in allProductSpecification) keys.push(k); keys.splice(-1,1);

                    console.log(keys.toString());  

                    keys = keys.map(function(el){

                    	  console.log(el);
                          
                          return el.replace(/\_+/g,' ');
                    });

                    var productName455 = keys.toString().replace(/gst/g,'');; 

		    		$('#previewTableScrollId').html('');


		    		console.log(data.data.product_description); 


		    		$('#productDescription1344').val(productName455);

		    		$('input[type="text"][name="quantity"]').val(sss); 

		    		$('#contact_name7547547').html('');

		    		$('#workflow326635').html('');

		    		var option = '';

		    		console.log(data);

		    		var workflow = '';


		    		var div = '';


		    		$.each(data.table,function(i,v){
                  
                         div +='<div>'+v.generated_table+'</div>';

		    		});


		    		$('#previewTableScrollId').append(div);



		    		// $.each(data,function(i,v){

		    		// 	// console.log(' i ',i);

		    		// 	// console.log(' v ', v);
		    		
		    		//     option += '<option value="'+v.contact_name+'" title="'+v.email+'">'+v.contact_name+'</option>';


		    		//     workflow += '<option value="'+v.contact_name+'" title="'+v.email+'">'+v.product_name+'</option>';



                         
		    		// 	//console.log(' v ',v.name);
		    		// });

		    		console.log(option);

                   $('#contact_name7547547').val(data.data.contact_name);

                   //$('#contact_name7547547').selectpicker('render');

                    //$('#contact_name7547547').selectpicker('refresh');

                    $('#company_name12356').val(data.data.company_name);

                   // $('#workflow326635').append(workflow);

                   makeSingleTable();

		    	},
		    });
		});


	 // $('#generateAutomatically').click(function(){

  //     	    console.log('im here');

  //         	 var baseUrlMain = $('#allTheBaseUrl999987').val();

  //            var goUrl = baseUrlMain+'/encode_sent_id/';    

  //            var customer_id22 = $('#customer_id').val();

  //            		   $.ajax({
		// 		    	url:goUrl,
		// 		    	type:'POST',
		// 		    	data:{_token:$('meta[name="csrf-token"]').attr('content'),customer_id:customer_id22},
		// 		    	dataType:'json',
		// 		    	success:function(data){

		// 		    		console.log(data);

		// 		    		$('#po_number436643').val(data.encoded);

		// 		        }

		//     		 });
		//       });


	     $('#fillManually').click(function(){
          
             $('#po_number436643').val('');

	     });


	     $('#showThePreview').change(function(){

            $('#showQuotation tr:not(#lastTotalRow)').find('th:last-child, td:last-child').remove();
	     	  if($(this).val() == '' || undefined){
	     	  	   $('#previewTableScrollId').hide();
	     	  }else{
	     	  	$('#previewTableScrollId').show(); 
	     	  }
	     });


	    $('#add_supplierForm').submit(function(e){

		   $.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});
	    	
	    	e.preventDefault();

	    	console.log($(this).serialize());

	    	   var baseUrlMain = $('#allTheBaseUrl999987').val();

	             var goUrl = baseUrlMain+'/add_supplier/'; 


		       	  $.ajax({
		       	   	  url:goUrl,
		       	   	  type:'POST',
		       	   	  data:$(this).serialize(), 
		       	   	  dataType:'json',
		       	   	  success:function(data){

	                    console.log(data); 


	                   if(!data.error){
	                    	$('#successDivAlert').show();
	                    }else{
	                       $('#dangerDivAlert').show();
	                    } 

		       	   	  },

		       	   	 complete:function(){
                          

		                var baseUrlMain = $('#allTheBaseUrl999987').val();

			             var goUrl = baseUrlMain+'/repopulate_supplier/'; 


				       	  $.ajax({
				       	   	  url:goUrl,
				       	   	  type:'POST',
				       	   	  data:{_token:$('meta[name="csrf-token"]').attr('content')}, 
				       	   	  dataType:'json',
				       	   	  success:function(data){
                                console.log(data); 
                                var options = '';

                                $.each(data.data,function(i,val){
                                    
                                    console.log(i);
                                  
                                    console.log(val);


                                   options += '<option  value="'+val.id+'">'+val.supplier_name+'</option>';
                                });

                                console.log(options);

                               $('select[name="supplier_id"]').html(options);

                              // $('#supplier_id12343').selectpicker();    

                               $('#supplier_id12343').selectpicker('refresh');

				       	   	 }

				       });

				     }

		       });  


	    });


	     $('#datetimepicker1,#datetimepicker2,#datetimepicker3').datetimepicker({'minDate':0});


     });
 
     	
   </script>
  @endsection

  @section('content')
     		        <div class="panel">
						 <div class="panel-heading">
							 <h3 class="panel-title">New Job</h3>
						  </div>
					     <div class="panel-body">

{{-- Project Name /Company Name email@gmail.com,email@gmail.com  --}}


			<!-- first modal -->


				 <!-- Modal -->
					  <div class="modal fade" id="myModal3447" role="dialog">
					    <div class="modal-dialog">
					    
					      <!-- Modal content-->
					      <div class="modal-content">
					        <div class="modal-header">
					          <button type="button" class="close" data-dismiss="modal">&times;</button>
					          <h4 class="modal-title">Add Supplier</h4> 
					        </div>
					        <div class="modal-body">
					           
					              <!-- content goes here -->

					      <div class="container">


					          <form id="add_supplierForm" action="add_supplier" method="POST">

                                 <div class="row">

					                <div class="col-md-6">
					                    

					                 <div style="display:none;" id="successDivAlert" class="alert alert-success alert-dismissible" role="alert">
					                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					                 <i class="fa fa-check-circle"></i>
					                 Data Has Been Saved Successfully !!!
					               </div>
  

					                 <div style="display:none;" id="dangerDivAlert" class="alert alert-danger alert-dismissible" role="alert">
					                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					                 <i class="fa fa-check-circle"></i> 

					                  Some Error Occured While Storing Data!!
					               </div>

					        </div>


					    </div>

					             {{csrf_field()}}



                      <div class="row">
							<div class="col-md-5">
						</div>

			       </div>



                         <div class="row">

	                 		  <div class="col-md-5">
					                  <br/>
					                    <label>Supplier Name</label>
					                    <input type="text" name="supplier_name" class="form-control" placeholder="text field">
					                    <br/>
					              </div>

					       </div>


					       <div class="row">
					                <div class="col-md-5">
					                    <label>Supplier Address</label>
					                    <input type="text" name="supplier_address" class="form-control" placeholder="text field">
					                    <br/>
					                </div>

					       </div>

                           <div class="row">     
				              <div class="col-md-5">
				                    <label>Contact Person</label>
				                    <input type="text" name="contact_person" class="form-control" placeholder="text field">
				                    <br/>
				                </div>
				            </div>

					          <br/>

					         <div class="row">
				                <div class="col-md-5">
				                    <label>Contact Number</label>
				                    <input type="text" name="contact_number" class="form-control" placeholder="text field">
				                    <br/>
				                </div>

				              </div>

				              <div class="row">

					               <div class="col-md-2-offset col-md-5"> 
					                  <label>Note</label>
					                   <textarea class="form-control" name="note" placeholder="textarea" rows="4"></textarea>
					                   <br/>
					               </div>
					           </div>

                            <div class="row">


				               <div class="col-md-5">
				                   <input type="submit" class="btn btn-primary" value="Add Supplier">
				               </div>

				              </div>

					          </form>
					      </div>

					                    
					     <!-- content ends here -->

					        </div>
					        <div class="modal-footer">
					          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        </div>
					      </div>
					      
					    </div>
					  </div>  <!-- end of modal -->






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
									<label>Customer ID&nbsp;<sup class="red">*</sup></label>

									<a href="#" data-toggle="tooltip" data-placement="right" title="In EBS, Customers are the companies or organizations you are selling to.

Be sure to add a Contact for the Customer - so you can send them proofs."><img src="image/info_ico.png" alt="no" style="width:20px;height:20px;">	</a>


 <img data-toggle="modal" data-target="#myModal" src="image/plus.png" alt="no" style="width:20px;height:20px;margin-left:300px;cursor: pointer;">

                       
							<select id="customer_id" name="customer_id" class="form-control selectpicker" data-live-search="true"">

								    @foreach($data as $dat)

									  <option  value="{{$dat->id}}" title="user email - {{$dat->email}}">{{encodeToBase64($dat->id)}}</option>

									@endforeach

									</select>


							   <br/>

						</div>

								  


						<div class="col-md-6">

                                     <label>Customer Name&nbsp;<sup class="red">*</sup></label>
                                     <a href="#" data-toggle="tooltip" data-placement="right" title="Contacts are the people at your Customers.

You need to create a Contact with an email address to send any proofs inside EBS."><img src="image/info_ico.png" alt="no" style="width:20px;height:20px;">	</a>


{{--                              	<select id="contact_name7547547" name="contact_name" class="form-control selectpicker" data-live-search="true"> 

							 <option value="ddsfhs" title="jjgfjj@gmail.com">ddsfhs</option>

									</select> --}}

						     <input type="text" name="contact_name" id="contact_name7547547" class="form-control">
                          <br/>
					</div>	  

							<div class="row">

                       

								 <div class="col-md-4 col-sm-12">
									<label>Company Name&nbsp;<sup class="red">*</sup></label>
									<a href="#" data-toggle="tooltip" data-placement="right" title="Workflow Templates are the blueprints for production. Select the one that most closely matches."><img src="image/info_ico.png" alt="no" style="width:20px;height:20px;">	</a>

                       
									
{{-- 									<select id="workflow326635" name="workflow" class="form-control">

									</select> --}}


									<input type="text" name="company_name" id="company_name12356" class="form-control">

								    </div>


								 <div class="col-md-4">

                                     <label>Project Name</label>
								    <input type="text" name="project_name" class="form-control" placeholder="Project Name">

								    <br/>

								</div>

							<div class="col-md-4">
									
									<label>Customer Products</label>
                                      

                                    <select id="showThePreview">
                                    	<option value="">Hide</option>
                                    	<option value="preview">Preview</option>
                                    </select>

								 <textarea class="form-control" id="productDescription1344" name="customer_products" placeholder="textarea" rows="4"></textarea>

							 </div>

							</div>


							<br/>

							</div>

						<div class="row">

						    <div class="col-md-2">
								Add Supplier<img data-toggle="modal" data-target="#myModal3447" src="image/plus.png" alt="no" style="width:20px;height:20;cursor: pointer;">

								<br/>
							 </div>

						 <div class="col-md-5">

                                 <label>Select Supplier</label>   	
                                 <select name="supplier_id" id="supplier_id12343" class="form-control selectpicker" data-live-search="true">

							   @foreach($allSuppliers as $dat)

								   <option  value="{{$dat->id}}">{{$dat->supplier_name}}</option>

								 @endforeach
						        </select>
						 </div>

					   <div class="col-md-3"></div>
				 </div>


							<div class="row">
								<div class="overflowScrolll" id="previewTableScrollId">
									  	
								</div>
							</div>

                            <hr/>

                           <br/>

{{--                        <div class="row">

                       	 <label>Name&nbsp;<sup class="red">*</sup></label>

    					<a href="#" data-toggle="tooltip" data-placement="right" title="Name of the Customer.In this case it is the Company/Organization name if it is a business if not it can be an individual name."><img src="image/info_ico.png" alt="no" style="width:20px;height:20px;">	</a>

                          <input type="text" name="name" class="form-control" placeholder="text field">
								 
						</div> --}}

						<br/>


				     <div class="row">

				     	 <label>Product Description&nbsp;<sup class="red">*</sup></label>
				     	 <a href="#" data-toggle="tooltip" data-placement="right" title="Some examples:

T-Shirts
Gildan 2000
Sm: 6
Md: 8
Lg: 10
Full Front - Black Ink - 1 Color
Full Back - Black, Red Ink - 2 Color

Sign Panel
32" x 72" Sign
3mm Dibond
3M IJ35C Vinyl
8508 Laminate"><img src="image/info_ico.png" alt="no" style="width:20px;height:20px;">	</a>

                     
						 <textarea class="form-control" id="productDescription86585" name="description" placeholder="textarea" rows="4"></textarea>

				    </div>


			      <hr>	

			      <div class="row">
                      <div class="col-md-3">
                      	<label>Order#&nbsp;<sup class="red">*</sup></label>
                        <input type="text" name="order_number" readonly="" value="{{$orderNumber}}" class="form-control" placeholder="text field">
                      </div>

{{--                       <div class="col-md-3">
                      	<label>Line#&nbsp;<sup class="red">*</sup></label>
                        <input type="text" name="line_number" class="form-control" placeholder="text field">
                      </div> --}}

                      <div class="col-md-3">


{{--                       	  <div>
                            
			                       <label class="fancy-checkbox">
											<input type="checkbox">
											<span id="generateAutomatically">Auto Generate</span>
									 </label>

									<label class="fancy-checkbox">
										<input type="checkbox" id="fillManually">
										<span>Fill Manually</span>
									</label>

					     </div> --}}



                      	<label>PO#&nbsp;<sup class="red">*</sup></label>
                      	<a href="#" data-toggle="tooltip" data-placement="right" title="Customer sent you a PO?

Enter that number here."><img src="image/info_ico.png" alt="no" style="width:20px;height:20px;">	</a>

                       
                        <input type="text" id="po_number436643" name="po_number" class="form-control" placeholder="text field">
                      </div>

                      <div class="col-md-5">
                      	<label>Quantity&nbsp;<sup class="red">*</sup></label>
                      	<a href="#" data-toggle="tooltip" data-placement="right" title="Enter the total quantity of signs, shirts, etc"><img src="image/info_ico.png" alt="no" style="width:20px;height:20px;">	</a>

                       
                        <input type="text" name="quantity" class="form-control" placeholder="text field">
                      </div>

			      </div>

			      <br/>

			      <div class="row">
			      	{{--  <div class="col-md-3">
			      	    <label>Due date&nbsp;<sup class="red">*</sup></label>
			      	    <a href="#" data-toggle="tooltip" data-placement="right" title="When does this Job need to completed?"><img src="image/info_ico.png" alt="no" style="width:20px;height:20px;">	</a>

                       
                        <input type="text" name="due_date" class="form-control" placeholder="text field">
                      </div> --}}

              
                   <div class= "col-md-3">
				        	<label>Start Date&nbsp;<sup class="red">*</sup></label>
				        	<a href="#" data-toggle="tooltip" data-placement="right" title="When do you need to ship this job?

Or what date was it shipped?"><img src="image/info_ico.png" alt="no" style="width:20px;height:20px;">	</a>

                       
		
				            <div class="form-group">
				                <div class='input-group date' >
				                    
				                    <input type='text' name="start_date" class="form-control" id="datetimepicker1"/>
				                    <span class="input-group-addon">
				                        <span class="glyphicon glyphicon-calendar"></span>
				                    </span>
				                </div>
				            </div>
				     </div>





                    <div class= "col-md-3">
				        	<label>Ship Date&nbsp;<sup class="red">*</sup></label>
				        	<a href="#" data-toggle="tooltip" data-placement="right" title="When do you need to ship this job?

Or what date was it shipped?"><img src="image/info_ico.png" alt="no" style="width:20px;height:20px;">	</a>

                       
		
				            <div class="form-group">
				                <div class='input-group date' >
				                    
				                    <input type='text' name="shipping_date" class="form-control" id="datetimepicker2"/>
				                    <span class="input-group-addon">
				                        <span class="glyphicon glyphicon-calendar"></span>
				                    </span>
				                </div>
				            </div>
				     </div>



                      	  <div class= "col-md-3">
				        	<label>Due date&nbsp;<sup class="red">*</sup></label>
				        	<a href="#" data-toggle="tooltip" data-placement="right" title="When does this Job need to completed?"><img src="image/info_ico.png" alt="no" style="width:20px;height:20px;">	</a>

                       
		
				            <div class="form-group">
				                <div class='input-group date' >
				                    
     			                    <input type='text' name="due_date" class="form-control" id="datetimepicker3"/>
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
			      	    <a href="#" data-toggle="tooltip" data-placement="right" title="What address are you billing your customer at?"><img src="image/info_ico.png" alt="no" style="width:20px;height:20px;">	</a>

                       
                        <input type="text" name="billing_address" class="form-control" placeholder="text field">
                      </div>

                      <div class="col-md-4">
			      	    <label>Shipping Address&nbsp;<sup class="red">*</sup></label>
			      	    <a href="#" data-toggle="tooltip" data-placement="right" title="What address are you shipping this to?"><img src="image/info_ico.png" alt="no" style="width:20px;height:20px;">	</a>

                       
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
				       	    <a href="#" data-toggle="tooltip" data-placement="right" title="Include any notes for your designers here.For Example:Customer wants a 4 x 8 banner with their logo and large text in Red that reads "For Sale""><img src="image/info_ico.png" alt="no" style="width:20px;height:20px;">	</a>

                       

							 <textarea class="form-control" name="design" placeholder="textarea" rows="4"></textarea>
				       </div>

				       <div class="col-md-3">
				       	    <label>Production&nbsp;<sup class="red">*</sup></label>
				       	    <a href="#" data-toggle="tooltip" data-placement="right" title="Include any notes for your production staff here.

For Example:

Make sure to HEM all 4 sides."><img src="image/info_ico.png" alt="no" style="width:20px;height:20px;">	</a>

                       
							 <textarea class="form-control" name="production" placeholder="textarea" rows="4"></textarea>
				       </div>

				       <div class="col-md-3">
				       	    <label>Shipping&nbsp;<sup class="red">*</sup></label>
				       	    <a href="#" data-toggle="tooltip" data-placement="right" title="Include any notes used for shipping here.

For Example:

Use customers UPS account - #434232

Call customer before shipment"><img src="image/info_ico.png" alt="no" style="width:20px;height:20px;">	</a>

                       
							 <textarea class="form-control" name="shipping" placeholder="textarea" rows="4"></textarea>
				       </div>

				        <div class="col-md-3">
				       	    <label>Install&nbsp;<sup class="red">*</sup></label>
				       	    <a href="#" data-toggle="tooltip" data-placement="right" title="Include any notes used for installation purposes here.

For Example:

Customer wants to have installed by the 15th.

Need to schedule the date ASAP"><img src="image/info_ico.png" alt="no" style="width:20px;height:20px;">	</a>

                       
							 <textarea class="form-control" name="install" placeholder="textarea" rows="4"></textarea>
				       </div>

			    </div>

			    <hr/>

			    <div class="row">
			    	 
                     {{--  <input type="text" class="form-control" placeholder="text field"> --}}
{{-- 				        <div class= "col-md-3">
				        	<label>Ship Date&nbsp;<sup class="red">*</sup></label>
				        	<a href="#" data-toggle="tooltip" data-placement="right" title="When do you need to ship this job?

Or what date was it shipped?"><img src="image/info_ico.png" alt="no" style="width:20px;height:20px;">	</a>

                       
		
				            <div class="form-group">
				                <div class='input-group date' >
				                    
				                    <input type='text' name="shipping_date" class="form-control" id="datetimepicker2"/>
				                    <span class="input-group-addon">
				                        <span class="glyphicon glyphicon-calendar"></span>
				                    </span>
				                </div>
				            </div>
				        </div> --}}

                     <br/>
			    </div>

			    <hr/>

			    <br/>

			    <div class="row">

			        <div class="col-md-4">
			      	    <label>Production Manager&nbsp;<sup class="red">*</sup></label>
			      	    <a href="#" data-toggle="tooltip" data-placement="right" title="Who is responsible for making sure this Job gets produced on time?"><img src="image/info_ico.png" alt="no" style="width:20px;height:20px;">	</a>

                       
                        <input type="text" name="production_manager" class="form-control" placeholder="text field">
                      </div>

                      <div class="col-md-4">
			      	    <label>Project Manager&nbsp;<sup class="red">*</sup></label>
			      	    <a href="#" data-toggle="tooltip" data-placement="right" title="Is this job a part of a larger project?

If so, who is the person responsible for the project"><img src="image/info_ico.png" alt="no" style="width:20px;height:20px;">	</a>

                       
{{--                         <input type="text" name="project_manager" class="form-control" placeholder="text field"> --}}

                 <select class="selectpicker" name="project_manager">

                 	<option value="Hemanth Raj">Hemanth Raj</option>
                 	<option value="Tanveer">Tanveer</option>
                 	<option value="Murthy Kumar">Murthy Kumar</option>
                 	<option value="Madan Kumar">Madan Kumar</option>

                 </select>

                      </div>

                      <div class="col-md-4">
			      	    <label>Sales Rep&nbsp;<sup class="red">*</sup></label>
			      	    <a href="#" data-toggle="tooltip" data-placement="right" title="Who sold this job?

Or if you don't have traditional "Sales Reps" - just choose the person who took the order from your customer.

That way - you're team will know who to ask for any questions/issues"><img src="image/info_ico.png" alt="no" style="width:20px;height:20px;">	</a>

                       
                        <input type="text" name="sales_representative" class="form-control" placeholder="text field">
                      </div>
			    	
			    </div>

			    <br/>

			    <div class="row">
			       <div class="col-md-4">
				    	 <label>Shipping Method&nbsp;<sup class="red">*</sup></label>
				    	 <a href="#" data-toggle="tooltip" data-placement="right" title="How are you shipping this job?"><img src="image/info_ico.png" alt="no" style="width:20px;height:20px;">	</a>

                       
	                      <input type="text" name="shipping_method" class="form-control" placeholder="text field">
                    </div>
			    </div>

			    <hr/>

			    <br/>

{{-- 			    <div class="row">


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
                          <a href="#" data-toggle="tooltip" data-placement="right" title="Do you have an artwork server?

Copy and paste the link to the Job folder or artwork files here."><img src="image/info_ico.png" alt="no" style="width:20px;height:20px;">	</a>

                       
	                      <input type="text" name="local_file" class="form-control" placeholder="text field">
                    </div>
			    	
			    </div> --}}

			    <br/>

			    <input style="float:right;" type="submit" value="Save" class="btn btn-success">

			   </form>
			
			</div>
		
		</div>



<!--modal starts here -->
		<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
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
								<label>Name&nbsp;<sup class="red">*</sup></label>
								<input type="text" name="name" class="form-control" placeholder="Name">
							    </div>

							 </div>

                               <hr>


                                  <h3>Primary Contacts</h3>

                          <div class="row">
								  	<div class="col-md-6 col-sm-12">
									<label>Name&nbsp;<sup class="red">*</sup></label>
									<input type="text" name="primary_name" class="form-control" placeholder="Name">
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
		                       </div>


                         <table class="table" id="phoneTableBody">
                              
						</table>

					</hr>

					
					<button type="button" id="addPhoneButton" class="btn btn-default" style="margin-left:88px;"><i class="fa fa-plus-square"></i>Add another phone</button>

		                         
						  


		   	   <hr>	
                   <h3>Addresses</h3>


                   <table class="table" id="addressTableBody67891">


{{--                     <div class="row">
                       
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

						       <input type="text" name="attention_to" placeholder="Attention to" class="form-control">
		                               
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
	                    	<button type="button" class="btn btn-danger btn_phoneRemove"><i class="fa fa-trash-o"></i></button>
	                    </div>
                        <hr>
                    </div>

                    <br> --}}

            </table>


                   <button type="button" id="addAddressButton" class="btn btn-default classForCenter btn_addressRemove"><i class="fa fa-plus-square"></i>Add another address</button>
				<hr>


				<input style="float:right;" type="submit" value="Save" class="btn btn-success"/> 

		     </form>								

				</div>
		</div>





        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<!--modal ends here -->






<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>

  @endsection

