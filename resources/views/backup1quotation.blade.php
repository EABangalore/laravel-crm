@extends('main-layout.main')

  @section('css')
       <link rel="stylesheet" href="http://akquinet.github.io/jquery-toastmessage-plugin/demo/css/jquery.toastmessage-min.css">
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
		        	 	<input type="submit" id="getCustomer" value="Get Customer" class="btn btn-primary">
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

		        		<input type="hidden" id="hiddenCustomerId">
		        	 	 
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

				       <div class="col-md-2">
				       	   <input type="number" id="count" placeholder="Quantity" class="form-control">
				       </div>   

				       <div class="col-md-2">
				       	   <button class="btn btn-primary" id="addCount">+Add</button>
				       </div>

		        </div>


		         </form>

		         <div id="hfhdf"></div>

		        <div class="row">


		        	<div class="col-md-10" id="example-table">
		        	
			        	 <table class="table" id="showQuotation">
	                    	<thead>
	                    		<th>Product Name</th>
	                    		<th>Price</th> 
	                    		<th>Quantity</th>
	                    		<th>Amount</th> 
	                    	</thead>

	                    	<tbody>
	                    		 
	                    	</tbody>
	                    </table>

                   </div>

		        </div>

		        <div class="row">

			        	<div class="col-md-8">
			        	     <button class="btn btn-success" id="convert-table">Save</button>
			           </div>
		        </div>

   </div>

  @endsection


 @section('js')

     <script src="{!! asset('/js/tableToJson.js') !!}"></script>  

     <script src="http://akquinet.github.io/jquery-toastmessage-plugin/demo/jquery.toastmessage-min.js"></script>   

       <script type="text/javascript">


      function showToastMessage(msg){

		  var yourText = 'Success Dialog which is NOT sticky',
		        toastMessageSettings = {
		            text: msg.message,//yourText,
		            sticky: false,
		            position: 'top-right',
		            type: msg.success,//'success',
		            closeText: '',
		            close: function() {
		                console.log("toast is closed ...");
		            }
		        };

		       var myToast = $().toastmessage('showToast', toastMessageSettings);
		}


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

		                    $('#hfhdf').html('<h1>'+dat.data.seema+'</h1>');

		                    $('#hiddenCustomerId').val(dat.data.id);  


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

                 var tableBody = '<tr class="allTheQuotationRow"><td>'+productName+'</td><td contenteditable class="priceChangeField">'+price+'</td><td contenteditable class="quantityChangeField">'+quantity+'</td><td>'+amount+'</td></tr>';

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

                 $('#showQuotation').append('<tr id="lastTotalRow"><td>total</td><td></td><td></td><td>'+sum+'</td></tr>');

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

                 $('#showQuotation').append('<tr id="lastTotalRow"><td>total</td><td></td><td></td><td>'+sum+'</td></tr>');
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

                 $('#showQuotation').append('<tr id="lastTotalRow"><td>total</td><td></td><td></td><td>'+sum+'</td></tr>');  
              });


              $('#convert-table').click(function(e) {
              	   e.preventDefault();   
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

                   var baseUrlMain = $('#allTheBaseUrl999987').val();

		            var goUrl = baseUrlMain+'/save_quotation/';

		            console.log(goUrl);

		            var customerid = $('#hiddenCustomerId').val();


		           var htmlTable =  $('#example-table').html();

		           // var allData = $('form').serializeArray();

		           //  allData.push({_token:$('meta[name="csrf-token"]').attr('content'),customer_id:customerid,generated_table:htmlTable,quotation_data:result});

		           //  console.log(allData);

		           //  return false;  

		            if($('#hiddenCustomerId').val() == ''){
		            	alert('Please search for customer with id');

		            	return false;
		            }

		            //return false;   

		            $.ajax({
		            	url:goUrl,
		            	type:'POST',
		            	data:{_token:$('meta[name="csrf-token"]').attr('content'),customer_id:customerid,generated_table:htmlTable,quotation_data:result,customer_name:$('#customer_name').val(),company_name:$('#company_name').val(),email:$('#email').val(),phone:$('#phone').val(),product_name:$('#product_name').val(),product_description:$('#product_description').val(),address:$('#address').val()},
		            	dataType:'json',
		            	success:function(data){
		            		console.log(data);

		                var mesg = {message:data.message,status:data.success};
                        showToastMessage(mesg);

                    	},
		            	error:function(data){
		            		console.log(data);
		            		  var mesg = {message:'ejaz Anwar',status:'success'};
                              showToastMessage(mesg);
		            		alert('error occured here');
		            	}
		            });


			 });

       	   });

       </script>
@endsection