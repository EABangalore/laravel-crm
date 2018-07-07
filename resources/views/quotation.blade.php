@extends('main-layout.main')

  @section('css')
       <link rel="stylesheet" href="http://akquinet.github.io/jquery-toastmessage-plugin/demo/css/jquery.toastmessage-min.css">

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.css">

       <link rel="stylesheet" href="{{asset('/css/jquery-loader.css')}}"> 

       <style>
       	
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

							   <option  value="{{$dat->product_name}}" title="{{$dat->product_name}}" data-price="{{$dat->price}}" data-productdescription="{{$dat->project_description}}">{{$dat->product_name}}</option>

							 @endforeach
					    </select>

				       </div>

				       <div class="col-md-2">
				       	   <input type="number" placeholder="Quantity" id="count" class="form-control">
				       </div>

				    <div class="col-md-2">
		                      <div class="input-group">

		                     <input type="number" placeholder="GST % For All" id="gstPercentageForUser" value="18" class="form-control" />
		                    <span class="input-group-addon">%</span>
		                 </div>
		               </div>

				       <div class="col-md-2">
				       	   <button class="btn btn-primary" id="addCount">+Add</button>
				       </div>

		        </div>


		         </form>

		         <div id="hfhdf"></div>

		        <div class="row">


		        	<div class="col-md-10" id="example-table">
		        	
			        	 <table class="table table-bordered" id="showQuotation" style="margin-top: 40px;">
	                    	<thead>
	                    		<th>Product Name</th>
	                    		<th>Product Description</th>  
	                    		<th>Price</th> 
	                    		<th>Quantity</th>
	                    		<th>Amount</th> 
	                    		<th>Action</th> 
	                    	</thead>

	                    	<tbody>
	                    		 
	                    	</tbody>
	                    </table>

                   </div>

		        </div>

		        <div class="row">

			        	<div class="col-md-4">
			        	     <button class="btn btn-success" id="convert-table">Save</button>
			           </div>


			           <div class="col-md-4">
			        	     <button class="btn btn-success" id="convert-table-notify">Save & Notify Customer</button>
			           </div>
		        </div>

   </div>

  @endsection


 @section('js')

     <script src="{!! asset('/js/tableToJson.js') !!}"></script>  

      <script src="{!! asset('/js/jquery-loader.js') !!}"></script>  

     <script src="http://akquinet.github.io/jquery-toastmessage-plugin/demo/jquery.toastmessage-min.js"></script>   

     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.js"></script>

       <script type="text/javascript">


    //    	          function showTotalAtBottom(){

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

                 // var tableBody = '<tr class="allTheQuotationRow"><td>'+productName+'</td><td contenteditable class="priceChangeField">'+price+'</td><td contenteditable class="quantityChangeField">'+quantity+'</td><td>'+amount+'</td><td>100</td><td><span class="label label-warning" style="width:20px;">canel</span></td></tr>';

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

                 // $('#showQuotation').append('<tr id="lastTotalRow3333"><td></td><td></td><td></td><th>Total Amount</th><th>Discount Amount</th><td></td></tr>');

                 // $('#showQuotation').append('<tr id="lastTotalRow"><td></td><td></td><td></td><td>'+sum+'</td><td>200</td><td></td></tr>');

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

            		console.log($(this).find('tr td').eq(4).text());

            		var lastTotal = Number($(this).find('td').eq(4).text());


            		return lastTotal;  

            		// var overAllTotal = 0;

            		// var overAllTotal = lastTotal + overAllTotal;

            		// grandTotal = overAllTotal;

            	});

               console.log(arr);

               return arr;  
            }



           function calculateGstWithPredefinedValue(){

                var totalPrice = showTotalAtBottom();

                 // var totalDiscount = showTotalDiscountAtBottom();

                 // totalDiscount = totalDiscount.toArray(); 

                 // var discountValue = 0;

               // discountValue = discountValue + totalDiscount[ii];

                 console.log('grand',totalPrice);

                 totalPrice = totalPrice.toArray();

                  var sum =0;

                 for(var ii =0; ii<totalPrice.length;ii++){

                    sum = sum + totalPrice[ii];

                      //discountValue = discountValue + totalDiscount[ii];
                 }

                 var lastGstAmount = $('#showQuotation').data('gst') || $('#gstPercentageForUser').val(); 

                 var sumWithGst = (parseInt(lastGstAmount,10)/100)*sum; 
                  
                  console.log('original sum', sum);

                  console.log(' gst',sumWithGst);

                  var calculatedSum = sumWithGst + sum;

               $('#lastTotalRow').remove();

               $('#showQuotation').append('<tr id="lastTotalRow"><td>total</td><td></td><td></td><td>'+sum+'</td><td></td></tr>');

               $('#gstShowingRow').remove();
               $('#showQuotation').append('<tr id="gstShowingRow"><td>gst</td><td></td><td></td><td>'+calculatedSum.toFixed(2)+'</td><td></td></tr>'); 
           }

       	   $(document).ready(function(){
               $('form').submit(function(e){
               	   e.preventDefault();

               	  var customer_id = $('#customerIdd').val().trim();  


               	     var baseUrlMain = $('#allTheBaseUrl999987').val();

				     var goUrl = baseUrlMain+'/update_revised_quotation/'; 

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
		                    var tableBody = '<tr><td>'+dat.data.customer_hash_id+'</td><td>'+dat.data.company_name+'</td><td>'+dat.data.contact_name+'</td><td>'+dat.data.email+'</td><td>'+dat.data.phone+'</td><td>'+dat.data.product_name+'</td><td>'+dat.data.combined_address+'</td></tr>';


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

                    		var tableHtml = dat.data.quotationTable;


                    		console.log(tableHtml);  

                    		var urlRedirect = "{{URL::to('revised_quotation?ull=')}}";

                    		//console.log(urlRedirect);

                    		var bodyContent = $(tableHtml).find('tbody').html();

                    		var lastGst = $(tableHtml).data('gst');

                    	  if(lastGst != ''){
                              $('#gstPercentageForUser').val(parseInt(lastGst,10)); 
                            }   

                    		//return false;

                    		if($(tableHtml).find('.discountPriceColm').length > 0){
                    			window.location.href = urlRedirect+customer_id;
                    		}

                            $('#showQuotation tbody').html(bodyContent);

                            $('#lastTotalRow td:first').text('total'); // add total

                             calculateGstWithPredefinedValue();
		                 }
		              });
               });  


              $('#addCount').on('click',function(e){

              	 e.preventDefault();
                
                  var quantity = $('#count').val();

                  console.log(count);

                  var productName = $('#productIdentifier').val();

                  var productDescription = $('#productIdentifier option:selected').data('productdescription');   

                  console.log($('#productIdentifier option:selected').data('price'));

                  var price = $('#productIdentifier option:selected').data('price');

                  var amount = Number(price * quantity);   

                 // var tableBody = '<tr class="allTheQuotationRow"><td>'+productName+'</td><td contenteditable class="priceChangeField">'+price+'</td><td contenteditable class="quantityChangeField">'+quantity+'</td><td>'+amount+'</td></tr>';

                 var tableBody = '<tr class="allTheQuotationRow"><td>'+productName+'</td><td contenteditable>'+productDescription+'</td><td contenteditable class="priceChangeField">'+price+'</td><td contenteditable class="quantityChangeField">'+quantity+'</td><td>'+amount+'</td><td><span class="label label-warning removeRow" style="width:20px;cursor:pointer;">cancel</span></td></tr>';

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


                 var lastGstAmount = $('#showQuotation').data('gst') || $('#gstPercentageForUser').val(); 

                 var sumWithGst = (parseInt(lastGstAmount,10)/100)*sum; 
                  
                  console.log('original sum', sum);

                  console.log(' gst',sumWithGst);

                  var calculatedSum = sumWithGst + sum;

                 // $('#showQuotation').append('<tr id="lastTotalRow"><td>total</td><td></td><td></td><td>'+sum+'</td></tr>');


                $('#showQuotation').append('<tr id="lastTotalRow3333"><td></td><td></td><td></td><td></td><th>Total Amount</th><td></td></tr>');

                 $('#showQuotation').append('<tr id="lastTotalRow"><td>total</td><td></td><td></td><td></td><td>'+sum+'</td><td></td></tr>');
                   
                 $('#gstShowingRow').remove(); 
                 $('#showQuotation').append('<tr id="gstShowingRow"><td>gst</td><td></td><td></td><td></td><td>'+calculatedSum.toFixed(2)+'</td><td></td></tr>');

              });

              $(document).on('keyup','.priceChangeField',function(){

              	 var td = $(this).closest('tr');

              	 var priceChanged = Number(td.find('td').eq(2).text());

              	 var quantityChanged = Number(td.find('td').eq(3).text());  

              	 console.log(quantityChanged,priceChanged);
 

               $(td).find('td').eq(4).text(Number(quantityChanged * priceChanged));

              	 // for total price calculation

              	 var totalPrice = showTotalAtBottom();

                 console.log('grand',totalPrice);

                 totalPrice = totalPrice.toArray();

                  var sum =0;

                 for(var ii =0; ii<totalPrice.length;ii++){

                 	  sum = sum + totalPrice[ii];
                 }


	              var sumWithGst = (parseInt($('#gstPercentageForUser').val(),10)/100)*sum;
	              
	              console.log('original sum', sum);

	              console.log(' gst',sumWithGst);

	              var calculatedSum = sumWithGst + sum;


               $('#gstShowingRow').remove();

               $('#showQuotation').append('<tr id="gstShowingRow"><td>gst</td><td></td><td></td><td></td><td>'+calculatedSum.toFixed(2)+'</td><td></td></tr>');

                 $('#lastTotalRow').remove();

                 $('#showQuotation').append('<tr id="lastTotalRow"><td>total</td><td></td><td></td><td></td><td>'+sum+'</td><td></td></tr>');
              });

              $(document).on('keyup','.quantityChangeField',function(){


              	  var td = $(this).closest('tr');

              	 var priceChanged = Number(td.find('td').eq(2).text());

              	 var quantityChanged = Number(td.find('td').eq(3).text());

              	 console.log(quantityChanged,priceChanged);

               $(td).find('td').eq(4).text(Number(quantityChanged * priceChanged));

              	 // for total price calculation

              	 var totalPrice = showTotalAtBottom();

                 console.log('grand',totalPrice);

                 totalPrice = totalPrice.toArray();

                  var sum =0;

                 for(var ii =0; ii<totalPrice.length;ii++){

                 	  sum = sum + totalPrice[ii];
                 }


                 var sumWithGst = (parseInt($('#gstPercentageForUser').val(),10)/100)*sum;
	              
	              console.log('original sum', sum);

	              console.log(' gst',sumWithGst);

	              var calculatedSum = sumWithGst + sum;


               $('#gstShowingRow').remove();

               $('#showQuotation').append('<tr id="gstShowingRow"><td>gst</td><td></td><td></td><td></td><td>'+calculatedSum.toFixed(2)+'</td><td></td></tr>');

                 $('#lastTotalRow').remove();

                 $('#showQuotation').append('<tr id="lastTotalRow"><td>total</td><td></td><td></td><td></td><td>'+sum+'</td><td></td></tr>');  
              });


              $('#convert-table').click(function(e) {
              	   e.preventDefault();   

                $('body').loading({  message: 'Please Wait...',theme:'dark'}); 

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
				  console.log('first result table',result);

                   var baseUrlMain = $('#allTheBaseUrl999987').val();

		            var goUrl = baseUrlMain+'/save_revised_quotation/';

		            console.log(goUrl);

		            var customerid = $('#hiddenCustomerId').val();


		           // var allData = $('form').serializeArray();

		           //  allData.push({_token:$('meta[name="csrf-token"]').attr('content'),customer_id:customerid,generated_table:htmlTable,quotation_data:result});

		           //  console.log(allData);

		           //  return false;  


		           if($('#gstPercentageForUser').val() == ''){
		           	  alert('Please Enter Gst Percentage!!');
		           	  return false;
		           }

		            if($('#hiddenCustomerId').val() == ''){
		            	alert('Please search for customer with id');

		            	return false;
		            }

		            $('#showQuotation').attr('data-gst',parseInt($('#gstPercentageForUser').val(),10));      

		            var htmlTable =  $('#example-table').html();     

		            $.ajax({
		            	url:goUrl,
		            	type:'POST',
		            	data:{_token:$('meta[name="csrf-token"]').attr('content'),customer_id:customerid,generated_table:htmlTable,quotation_data:result,customer_name:$('#customer_name').val(),company_name:$('#company_name').val(),email:$('#email').val(),phone:$('#phone').val(),product_name:$('#product_name').val(),product_description:$('#product_description').val(),address:$('#address').val(),gst_percentage:$('#gstPercentageForUser').val()},
		            	dataType:'json',
		            	success:function(data){
		            		console.log(data);

		            	  $('body').loading('toggle');     

		                var mesg = {message:data.message,status:data.success};
                        showToastMessage(mesg);

                    	},
		            	error:function(data){
		            		console.log(data);
                           
                             $('body').loading('toggle');

		            		  var mesg = {message:'ejaz Anwar',status:'success'};
                              showToastMessage(mesg);
		            		alert('error occured here');
		            	}
		            });


			 });


             //convert-table-notify


             $('#convert-table-notify').click(function(e) {
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
				  console.log('second result table ',result);

				 // return false;

                   var baseUrlMain = $('#allTheBaseUrl999987').val();

		            var goUrl = baseUrlMain+'/save_revised_quotation_notify/';

		            console.log(goUrl);

		            var customerid = $('#hiddenCustomerId').val();


		          // var htmlTable =  $('#example-table').html();

		           // var allData = $('form').serializeArray();

		           //  allData.push({_token:$('meta[name="csrf-token"]').attr('content'),customer_id:customerid,generated_table:htmlTable,quotation_data:result});

		           //  console.log(allData);

		           //  return false;  

		           if($('#gstPercentageForUser').val() == ''){
		           	  alert('Please Enter Gst Percentage!!');
		           	  return false;
		           }

		            if($('#hiddenCustomerId').val() == ''){
		            	alert('Please search for customer with id');

		            	return false;
		            }

		            $('#showQuotation').attr('data-gst',parseInt($('#gstPercentageForUser').val(),10));      

		            var htmlTable =  $('#example-table').html(); 

		            //return false;   

		            $.ajax({
		            	url:goUrl,
		            	type:'POST',
		            	data:{_token:$('meta[name="csrf-token"]').attr('content'),customer_id:customerid,generated_table:htmlTable,quotation_data:result,customer_name:$('#customer_name').val(),company_name:$('#company_name').val(),email:$('#email').val(),phone:$('#phone').val(),product_name:$('#product_name').val(),product_description:$('#product_description').val(),address:$('#address').val(),gst_percentage:$('#gstPercentageForUser').val()},
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


			 /* to remove row from table */

			 $(document).on('click','.removeRow',function(){

			 	 $(this).closest('tr').remove(); 

			 	 $('.quantityChangeField').keyup();   
			 });



      /* for gst calculation */

      $('#gstPercentageForUser').on('keyup',function(){
        

                var totalPrice = showTotalAtBottom();

                 //var totalDiscount = showTotalDiscountAtBottom();

                 //totalDiscount = totalDiscount.toArray(); 

                 //var discountValue = 0;

               // discountValue = discountValue + totalDiscount[ii];

                 console.log('grand',totalPrice);

                 totalPrice = totalPrice.toArray();

                  var sum =0;

                 for(var ii =0; ii<totalPrice.length;ii++){

                    sum = sum + totalPrice[ii];

                     // discountValue = discountValue + totalDiscount[ii];
                 }

              var sumWithGst = (parseInt($(this).val(),10)/100)*sum;
              
              console.log('original sum', sum);

              console.log(' gst',sumWithGst);

              var calculatedSum = sumWithGst + sum;

           $('#lastTotalRow').remove();

           $('#showQuotation').append('<tr id="lastTotalRow"><td>total</td><td></td><td></td><td>'+sum+'</td><td></td></tr>');


            $('#gstShowingRow').remove();
            $('#showQuotation').append('<tr id="gstShowingRow"><td>gst</td><td></td><td></td><td>'+calculatedSum.toFixed(2)+'</td><td></td></tr>');

      });

     }); 

      

       </script>
@endsection    