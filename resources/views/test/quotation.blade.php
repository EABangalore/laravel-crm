@extends('main-layout.main')

  @section('css')

  <style type="text/css">
  	th{background-color:#f5f5fa;}

	td{background-color:white;}

	textarea{
		overflow: hidden;
	}

  </style>
  @endsection

  @section('content')
    
    <div class="row">
		     <form method="POST" action="{{URL::to('quotation')}}">


		        <div class="row">
                    

		        	 <div class="col-md-5">
		        	 	 <label>Customer Id</label>
		        	 	 <input type="text" id="customerIdd" name="customer_id" class="form-control">
		        	 </div>

		        	 <div class="col-md-3">
		        	 	<input type="submit" id="getCustomer" value="Get Customer" class="btn btn-primary" style="margin-top:25px;">
		        	 </div>
		        </div>

		        <br/>

		        <div class="row" id="maintableForQuotation" style="display: none;">

		        	<div class="alert alert-success alert-dismissible col-md-8" role="alert" id="hash_customerId">
						 <i class="fa fa-check-circle"></i> You Have Searched for - <span></span>
					 </div>
		        	  
		        </div>

		        <div class="">
		        	 
		        	 <div class="row">
		        	 	 <div class="col-md-5">
			        	 	  <label>Customer Name</label>
			        	 	  <input type="text" id="customer_name" name="customer_name" class="form-control">
		        	 	 </div>

		        	 	  <div class="col-md-5">
			        	 	  <label>Company Name</label>
			        	 	  <input type="text" id="company_name" name="company_name" class="form-control">
		        	 	 </div>
		        	 </div>

		        	 <br>

		        	 <div class="row">
		        	 	 <div class="col-md-4">
			        	 	  <label>Email Id</label>
			        	 	  <input type="text" id="email" name="email" class="form-control">
		        	 	 </div>

		        	 	  <div class="col-md-3">
			        	 	  <label>Phone Number</label>
			        	 	  <input type="text" id="phone" name="phone" class="form-control">
		        	 	 </div>

		        	 	 <div class="col-md-5">
			        	 	  <label>Product Name</label>
			        	 	  <input type="text" id="product_name" name="product_name" class="form-control">
		        	 	 </div>

		        	 </div>


		        	  <div class="row">
		        	 	 
                           <br/>
		        	 	  <div class="col-md-5">
			        	 	  <label>Product Description</label>
			        	 	  <textarea name="product_description" id="product_description" class="form-control"></textarea>
		        	 	 </div>

		        	 	 <div class="col-md-5">
			        	 	  <label>Address</label>
			        	 	  <textarea name="address" id="address" class="form-control"></textarea>
		        	 	 </div>

		        	 </div>

		        	 <br/>

		        	<div class="row">
		        	 	 
		        	 </div>

		        </div>

		        <hr>
		        <!-- table for quotation -->
		        <div class="row">
		        	  <h2 style="text-align: center;">Quotation</h2>

	                 <div class="col-md-5"> 


						<select name="customer_id" id="productIdentifier" class="form-control selectpicker" data-live-search="true">

						   @foreach($data as $dat)

							   <option  value="{{$dat->product_name}}" title="{{$dat->product_name}}" data-price="{{$dat->price}}">{{$dat->product_name}}</option>

							 @endforeach
					    </select>

				       </div>

				       <div class="col-md-2	">
				       	   <input type="number" id="count" class="form-control">
				       </div>

				       <div class="col-md-2">
				       	  <div class="input-group">

    				<input type="number" class="form-control" />
      					<span class="input-group-addon">%</span>
							</div>
				       </div>

				       <div class="col-md-1">
				       	   <button class="btn btn-primary btn-block" style="background-color: #00bcd4;padding:5px 4px  !important;" id="addCount">+Add</button>
				       </div>

		        </div>

		        <div class="row">


		        	<div class="col-md-10" id="example-table">
		        	
			        	 <table class="table table-bordered" id="showQuotation" style="margin-top: 40px;">
	                    	<thead>
	                    		<th>Product Name</th>
	                    		<th>Price</th> 
	                    		<th>Quantity</th>
	                    		<th>Amount</th> 
	                    		<th>Discount</th>
	                    		<th id="actionColumn">Action</th> 
	                    	</thead>

	                    	<tbody>
	                    		 
	                    	</tbody>
	                    </table>

                   </div>

		        </div>

		        <div class="row">

			        	<div class="col-md-10">
			        	     <button class="btn btn-success btn-block" id="convert-table" style="height: 32px !important;"><img src="{{asset('image/save.png')}}" height="25"/> Save   </button>
			           </div>
		        </div>

<!-- 
		        <table class="table table-bordered" id="showQuotation" style="margin-top: 40px;">
	                    	<thead>
	                    		<tr><th>Product Name</th>
	                    		<th>Price</th> 
	                    		<th>Quantity</th>
	                    		<th>Amount</th> 
	                    		<th>Discount</th>
	                    		<th>Action</th> 
	                    	</tr></thead>

	                    	<tbody>
	                    		 
	                    	<tr class="allTheQuotationRow"><td>cigratte flake</td><td contenteditable="" class="priceChangeField">999</td><td contenteditable="" class="quantityChangeField"></td><td>0</td><td>Discount</td><td>Action</td></tr><tr class="allTheQuotationRow"><td>cigratte flake</td><td contenteditable="" class="priceChangeField">999</td><td contenteditable="" class="quantityChangeField"></td><td>0</td><td>Discount</td><td>Action</td></tr><tr class="allTheQuotationRow"><td>arjun web</td><td contenteditable="" class="priceChangeField">999</td><td contenteditable="" class="quantityChangeField">1</td><td>999</td><td>Discount</td><td>Action</td></tr><tr id="lastTotalRow"><td></td><td></td><td></td><td>999</td></tr></tbody>
	                    </table> -->

		    </form>
   </div>

  @endsection


 @section('js')

     <script src="{!! asset('/js/common-alert.js') !!}"></script>

       <script type="text/javascript">



       	          function showTotalAtBottom(){

          	  //var grandTotal = 0;

               var arr = $('.allTheQuotationRow').map(function(){

            		console.log($(this).find('tr td').eq(3).text());

            		var lastTotal = Number($(this).find('td').eq(3).text());


            		return lastTotal;

            		// var overAllTotal = 0;

            		// var overAllTotal = lastTotal + overAllTotal;

            		// grandTotal = overAllTotal;

            	});

               console.log(arr);

               return arr;  
            }

       	   $(document).ready(function(){
               $('form').submit(function(e){
               	   e.preventDefault();

               	  var customer_id = $('#customerIdd').val().trim();  


               	     var baseUrlMain = $('#allTheBaseUrl999987').val();

				     var goUrl = baseUrlMain+'/quotation/';

		             $.ajax({
		                url:goUrl,
		                type:'POST',
		                data:{_token:$('meta[name="csrf-token"]').attr('content'),customer_id:customer_id},
		                dataType:'json',
		                success:function(data){

		                	console.log(data);

		                	$('#showCustomerDetail tbody').html('');

		                	$('#hash_customerId span').html('');

		                    var dat = data;                   
		                    var tableBody = '<tr><td>'+dat.data.customer_hash_id+'</td><td>'+dat.data.company_name+'</td><td>'+dat.data.contact_name+'</td><td>'+dat.data.email+'</td><td>'+dat.data.phone+'</td><td>'+dat.data.	product_name+'</td><td>'+dat.data.combined_address+'</td></tr>';


                    		console.log(tableBody);

                    		$('#hash_customerId span').append(dat.data.customer_hash_id);

                    		$('#showCustomerDetail tbody').append(tableBody);

                    		$('#maintableForQuotation').show();

                    		$('#customer_name').val(dat.data.contact_name);
                    		$('#company_name').val(dat.data.company_name);
                    		$('#email').val(dat.data.email);
                    		$('#phone').val(dat.data.phone);
                    		$('#product_name').val(dat.data.product_name);
                    		$('#product_description').val(dat.data.product_description);
                    		$('#address').val(dat.data.street +' ' +dat.data.another_street+' '+dat.data.city + '  '+ dat.data.state + ' - '+dat.data.zip);
		                 }
		              });
               });


              $('#addCount').on('click',function(e){

              	 e.preventDefault();
                
                  var quantity = $('#count').val();

                  console.log(count);

                  var productName = $('#productIdentifier').val();

                  console.log($('#productIdentifier option:selected').data('price'));

                  var price = $('#productIdentifier option:selected').data('price');

                  var amount = Number(price * quantity);   

                 var tableBody = '<tr class="allTheQuotationRow"><td>'+productName+'</td><td contenteditable class="priceChangeField">'+price+'</td><td contenteditable class="quantityChangeField">'+quantity+'</td><td>'+amount+'</td><td>100</td><td><span class="label label-warning" style="width:20px;">canel</span></td></tr>';

                 console.log(tableBody);

                 $('#showQuotation').append(tableBody);

                 var totalPrice = showTotalAtBottom();

                 console.log('grand',totalPrice);

                 totalPrice = totalPrice.toArray();

                  var sum =0;

                 for(var ii =0; ii<totalPrice.length;ii++){

                 	  sum = sum + totalPrice[ii];
                 }

                 $('#lastTotalRow').remove();

                 $('#lastTotalRow3333').remove();  

                 $('#showQuotation').append('<tr id="lastTotalRow3333"><td></td><td></td><td></td><th>Total Amount</th><th>Discount Amount</th><td></td></tr>');

                 $('#showQuotation').append('<tr id="lastTotalRow"><td></td><td></td><td></td><td>'+sum+'</td><td>200</td><td></td></tr>');

              });

              $(document).on('keyup','.priceChangeField',function(){

              	 var td = $(this).closest('tr');

              	 var priceChanged = Number(td.find('td').eq(1).text());

              	 var quantityChanged = Number(td.find('td').eq(2).text());

              	 console.log(quantityChanged,priceChanged);
 

               $(td).find('td').eq(3).text(Number(quantityChanged * priceChanged));

              	 // for total price calculation

              	 var totalPrice = showTotalAtBottom();

                 console.log('grand',totalPrice);

                 totalPrice = totalPrice.toArray();

                  var sum =0;

                 for(var ii =0; ii<totalPrice.length;ii++){

                 	  sum = sum + totalPrice[ii];
                 }

                 $('#lastTotalRow').remove();

                 $('#showQuotation').append('<tr id="lastTotalRow"><td></td><td></td><td></td><td>'+sum+'</td></tr>');
              });

              $(document).on('keyup','.quantityChangeField',function(){


              	  var td = $(this).closest('tr');

              	 var priceChanged = Number(td.find('td').eq(1).text());

              	 var quantityChanged = Number(td.find('td').eq(2).text());

              	 console.log(quantityChanged,priceChanged);

               $(td).find('td').eq(3).text(Number(quantityChanged * priceChanged));

              	 // for total price calculation

              	 var totalPrice = showTotalAtBottom();

                 console.log('grand',totalPrice);

                 totalPrice = totalPrice.toArray();

                  var sum =0;

                 for(var ii =0; ii<totalPrice.length;ii++){

                 	  sum = sum + totalPrice[ii];
                 }

                 $('#lastTotalRow').remove();

                 $('#showQuotation').append('<tr id="lastTotalRow"><td></td><td></td><td></td><td>'+sum+'</td></tr>');  
              });


              $('#convert-table').click(function() {
				  var table = $('#example-table table').tableToJSON();
				  var result = table.reduce(function(acc, item) {
				    var key = item["Product Name"].replace(/ /g, "_");
				    if (!acc[key]) {
				      acc[key] = []
				    }
				    acc[key].push({
				      Price: item.Price,
				      Quantity: item.Quantity,
				      Amount: item.Amount
				    })
				    return acc;
				  }, {});
				  console.log(result);
			 });

       	   });


    //       function showTotalAtBottom(){

    //       	  //var grandTotal = 0;

    //            var arr = $('.allTheQuotationRow').map(function(){

    //         		console.log($(this).find('tr td').eq(3).text());

    //         		var lastTotal = Number($(this).find('td').eq(3).text());


    //         		return lastTotal;

    //         		// var overAllTotal = 0;

    //         		// var overAllTotal = lastTotal + overAllTotal;

    //         		// grandTotal = overAllTotal;

    //         	});

    //            console.log(arr);

    //            return arr;  
    //         }

    //    	   $(document).ready(function(){
    //            $('form').submit(function(e){
    //            	   e.preventDefault();

    //            	  var customer_id = $('#customerIdd').val().trim();  


    //            	     var baseUrlMain = $('#allTheBaseUrl999987').val();

				//      var goUrl = baseUrlMain+'/quotation/';

		  //            $.ajax({
		  //               url:goUrl,
		  //               type:'POST',
		  //               data:{_token:$('meta[name="csrf-token"]').attr('content'),customer_id:customer_id},
		  //               dataType:'json',
		  //               success:function(data){

		  //               	console.log(data);

		  //               	$('#showCustomerDetail tbody').html('');

		  //               	$('#hash_customerId span').html('');

		  //                   var dat = data;                   
		  //                   var tableBody = '<tr><td>'+dat.data.customer_hash_id+'</td><td>'+dat.data.company_name+'</td><td>'+dat.data.contact_name+'</td><td>'+dat.data.email+'</td><td>'+dat.data.phone+'</td><td>'+dat.data.	product_name+'</td><td>'+dat.data.combined_address+'</td></tr>';


    //                 		console.log(tableBody);

    //                 		$('#hash_customerId span').append(dat.data.customer_hash_id);

    //                 		$('#showCustomerDetail tbody').append(tableBody);

    //                 		$('#maintableForQuotation').show();

    //                 		$('#customer_name').val(dat.data.contact_name);
    //                 		$('#company_name').val(dat.data.company_name);
    //                 		$('#email').val(dat.data.email);
    //                 		$('#phone').val(dat.data.phone);
    //                 		$('#product_name').val(dat.data.product_name);
    //                 		$('#product_description').val(dat.data.product_description);
    //                 		$('#address').val(dat.data.street +' ' +dat.data.another_street+' '+dat.data.city + '  '+ dat.data.state + ' - '+dat.data.zip);
		  //                }
		  //             });
    //            });


    //           $('#addCount').on('click',function(e){

    //           	 e.preventDefault();
                
    //               var quantity = $('#count').val();

    //               console.log(count);

    //               var productName = $('#productIdentifier').val();

    //               console.log($('#productIdentifier option:selected').data('price'));

    //               var price = $('#productIdentifier option:selected').data('price');

    //               var amount = Number(price * quantity);   

    //              var tableBody = '<tr class="allTheQuotationRow"><td>'+productName+'</td><td contenteditable class="priceChangeField">'+price+'</td><td contenteditable class="quantityChangeField">'+quantity+'</td><td>'+amount+'</td><td>100</td><td><span class="label label-warning" style="width:20px;">canel</span></td></tr>';

    //              console.log(tableBody);

    //              $('#showQuotation').append(tableBody);

    //              var totalPrice = showTotalAtBottom();

    //              console.log('grand',totalPrice);

    //              totalPrice = totalPrice.toArray();

    //               var sum =0;

    //              for(var ii =0; ii<totalPrice.length;ii++){

    //              	  sum = sum + totalPrice[ii];
    //              }

    //              $('#lastTotalRow').remove();

    //              $('#lastTotalRow3333').remove();  

    //              $('#showQuotation').append('<tr id="lastTotalRow3333"><td></td><td></td><td></td><th>Total Amount</th><th>Discount Amount</th><td></td></tr>');

    //              $('#showQuotation').append('<tr id="lastTotalRow"><td></td><td></td><td></td><td>'+sum+'</td><td>200</td><td></td></tr>');

    //           });

    //           $(document).on('keyup','.priceChangeField',function(){

    //           	 var td = $(this).closest('tr');

    //           	 var priceChanged = Number(td.find('td').eq(1).text());

    //           	 var quantityChanged = Number(td.find('td').eq(2).text());

    //           	 console.log(quantityChanged,priceChanged);
 

    //            $(td).find('td').eq(3).text(Number(quantityChanged * priceChanged));

    //           	 // for total price calculation

    //           	 var totalPrice = showTotalAtBottom();

    //              console.log('grand',totalPrice);

    //              totalPrice = totalPrice.toArray();

    //               var sum =0;

    //              for(var ii =0; ii<totalPrice.length;ii++){

    //              	  sum = sum + totalPrice[ii];
    //              }

    //              $('#lastTotalRow').remove();

    //              $('#showQuotation').append('<tr id="lastTotalRow"><td></td><td></td><td></td><td>'+sum+'</td></tr>');
    //           });

    //           $(document).on('keyup','.quantityChangeField',function(){


    //           	  var td = $(this).closest('tr');

    //           	 var priceChanged = Number(td.find('td').eq(1).text());

    //           	 var quantityChanged = Number(td.find('td').eq(2).text());

    //           	 console.log(quantityChanged,priceChanged);

    //            $(td).find('td').eq(3).text(Number(quantityChanged * priceChanged));

    //           	 // for total price calculation

    //           	 var totalPrice = showTotalAtBottom();

    //              console.log('grand',totalPrice);

    //              totalPrice = totalPrice.toArray();

    //               var sum =0;

    //              for(var ii =0; ii<totalPrice.length;ii++){

    //              	  sum = sum + totalPrice[ii];
    //              }

    //              $('#lastTotalRow').remove();

    //              $('#showQuotation').append('<tr id="lastTotalRow"><td></td><td></td><td></td><td>'+sum+'</td></tr>');  
    //           });


    //           $('#convert-table').click(function() {
				//   var table = $('#example-table table').tableToJSON();
				//   var result = table.reduce(function(acc, item) {
				//     var key = item["Product Name"].replace(/ /g, "_");
				//     if (!acc[key]) {
				//       acc[key] = []
				//     }
				//     acc[key].push({
				//       Price: item.Price,
				//       Quantity: item.Quantity,
				//       Amount: item.Amount
				//     })
				//     return acc;
				//   }, {});
				//   console.log(result);
			 // });

    //    	   });

       </script>
@endsection