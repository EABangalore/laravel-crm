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
                   

            @php 

              if(@$_GET['ull'] != ''){

                  $insertId =  @$_GET['ull'];

              } else{
                $insertId = '';
              }

             @endphp

		        	 <div class="col-md-5">
		        	 	 <label>Customer Id</label>
		        	 	 <input type="text" id="customerIdd" value="{{$insertId}}" name="customer_id" class="form-control">
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

	                 <div class="col-md-4"> 


						<select name="customer_id" id="productIdentifier" class="form-control selectpicker" data-live-search="true">

						   @foreach($data as $dat)

							   <option  value="{{$dat->product_name}}" title="{{$dat->product_name}}" data-price="{{$dat->price}}">{{$dat->product_name}}</option>

							 @endforeach
					    </select>

				       </div>

				       <div class="col-md-2">
				       	   <input type="number" placeholder="Quantity" id="count" class="form-control">
				       </div>



				       <div class="col-md-2">
    				       	  <div class="input-group">

        				     <input type="number" placeholder="disc" id="discountToUser" class="form-control" />
          					<span class="input-group-addon">%</span>
							   </div>
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
		        	
			        	 <table class="table table-bordered" style="margin-top: 40px;" id="showQuotation">
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

			        	<div class="col-md-8">
			        	     <button class="btn btn-success" id="convert-table">UPDATE</button>
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



          function showTotalDiscountAtBottom(){

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

                 var totalDiscount = showTotalDiscountAtBottom();

                 totalDiscount = totalDiscount.toArray(); 

                 var discountValue = 0;

               // discountValue = discountValue + totalDiscount[ii];

                 console.log('grand',totalPrice);

                 totalPrice = totalPrice.toArray();

                  var sum =0;

                 for(var ii =0; ii<totalPrice.length;ii++){

                    sum = sum + totalPrice[ii];

                      discountValue = discountValue + totalDiscount[ii];
                 }

                 var sumWithGst = (parseInt($('#gstPercentageForUser').val(),10)/100)*sum;
                  
                  console.log('original sum', sum);

                  console.log(' gst',sumWithGst);

                  var calculatedSum = sumWithGst + sum;

               $('#lastTotalRow').remove();

               $('#showQuotation').append('<tr id="lastTotalRow"><td>total</td><td></td><td></td><td>'+sum+'</td><td>'+discountValue+'</td><td></td></tr>');

               $('#gstShowingRow').remove();
               $('#showQuotation').append('<tr id="gstShowingRow"><td>gst</td><td></td><td></td><td>'+calculatedSum.toFixed(2)+'</td><td></td><td></td></tr>');
           }



       	$(document).ready(function(){


               $('form').submit(function(e){
               	   
                   e.preventDefault();

                   //alert('i was clicked');

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

                    		var bodyContent = $(tableHtml).find('tbody').html();

                    		$('#showQuotation tbody').html('');  

                        $('#showQuotation tbody').html(bodyContent);

                      if($('.discountPriceColm').length <= 0){
                            

                            $('#showQuotation tr').find('td:last-child').remove();


                            $('#showQuotation tr:not("tr:first"):not("#lastTotalRow3333"):not("#lastTotalRow")').each(function(){       
                                $(this).append('<td class="discountPriceColm" data-discount="0">0</td><td><span class="label removeRow label-warning" style="width:20px;cursor:pointer;">canel</span></td>');
                            });

                           
                           $('#lastTotalRow3333').append('<td></td><td></td>');

                            var totalDiscount = showTotalDiscountAtBottom();

                             totalDiscount = totalDiscount.toArray(); 

                             var discountValue = 0;

                             for(var ii =0; ii<totalDiscount.length;ii++){

                                  discountValue = discountValue + totalDiscount[ii];
                              }



                          $('#lastTotalRow').append('<td>'+discountValue+'</td><td></td>');

                           //calculateGstWithPredefinedValue();
                        }
                      
                       calculateGstWithPredefinedValue();

		                 }
		              });
               });



           /* submit the form if filled */

              if($('#customerIdd').val() != ''){
                   $('form').submit();   
               }

         /* submit the form if filled */

              $('#addCount').on('click',function(e){

              	 e.preventDefault();
                
                  var quantity = $('#count').val();

                  console.log(count);

                  var productName = $('#productIdentifier').val();

                  console.log($('#productIdentifier option:selected').data('price'));

                  var price = $('#productIdentifier option:selected').data('price');

                  var amount = Number(price * quantity); 

                  var discount = $('#discountToUser').val() || 0; 

                  var discountPrice = 0;

                  if(amount > 0)
                   var discountPrice = (amount / 100) * discount;

                    discountPrice = discountPrice.toFixed(2);
                  

                 var tableBody = '<tr class="allTheQuotationRow"><td>'+productName+'</td><td contenteditable class="priceChangeField">'+price+'</td><td contenteditable class="quantityChangeField">'+quantity+'</td><td>'+amount+'</td><td class="discountPriceColm" data-discount="'+discount+'">'+discountPrice+'</td><td><span class="label removeRow label-warning" style="width:20px;cursor:pointer;">canel</span></td></tr>';

                 console.log(tableBody);

                 $('#showQuotation').append(tableBody);

                 var totalPrice = showTotalAtBottom();

                 var totalDiscount = showTotalDiscountAtBottom();

                 totalDiscount = totalDiscount.toArray(); 

                 var discountValue = 0;

                 //discountValue = discountValue + totalDiscount[ii];

                 console.log('grand',totalPrice);

                 totalPrice = totalPrice.toArray();

                  var sum =0;

                 for(var ii =0; ii<totalPrice.length;ii++){

                 	  sum = sum + totalPrice[ii];

                      discountValue = discountValue + totalDiscount[ii];
                 }



             var sumWithGst = (parseInt($('#gstPercentageForUser').val(),10)/100)*sum;
              
              console.log('original sum', sum);

              console.log(' gst',sumWithGst);

              var calculatedSum = sumWithGst + sum;

                 // $('#lastTotalRow').remove();

                 // $('#showQuotation').append('<tr id="lastTotalRow"><td>total</td><td></td><td></td><td>'+sum+'</td></tr>');


                 $('#lastTotalRow').remove();

                 $('#lastTotalRow3333').remove();  

                 $('#showQuotation').append('<tr id="lastTotalRow3333"><td></td><td></td><td></td><th>Total Amount</th><th>Discount Amount</th><td></td></tr>');

                 $('#showQuotation').append('<tr id="lastTotalRow"><td>total</td><td></td><td></td><td>'+sum+'</td><td>'+discountValue+'</td><td></td></tr>');

                $('#gstShowingRow').remove();
                $('#showQuotation').append('<tr id="gstShowingRow"><td>gst</td><td></td><td></td><td>'+calculatedSum.toFixed(2)+'</td><td></td><td></td></tr>');

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



   var discountPercentage = Number($(td).find('.discountPriceColm').data('discount')) || 0;

               var qtyPriceMul = Number(quantityChanged * priceChanged) || 0;

               var disCountVal = 0;

               if(qtyPriceMul > 0)
                   
                 disCountVal = (qtyPriceMul/100) * discountPercentage;


               //$(td).find('td').eq(4).text();


               //$(td).find('.discountPriceColm').text(discountPercentage);

               $(td).find('td').eq(4).text(Number(disCountVal));  // discount price




                 var totalDiscount = showTotalDiscountAtBottom();

                 totalDiscount = totalDiscount.toArray(); 

                 var discountValue = 0;

                 //discountValue = discountValue + totalDiscount[ii];

                  var sum =0;

                 for(var ii =0; ii<totalPrice.length;ii++){

                 	  sum = sum + totalPrice[ii];

                 	  discountValue = discountValue + totalDiscount[ii];
                 }

                 
              var sumWithGst = (parseInt($('#gstPercentageForUser').val(),10)/100)*sum;
              
              console.log('original sum', sum);

              console.log(' gst',sumWithGst);

              var calculatedSum = sumWithGst + sum;
                 


                 $('#lastTotalRow').remove();  

                 $('#showQuotation').append('<tr id="lastTotalRow"><td>total</td><td></td><td></td><td>'+sum+'</td><td>'+discountValue+'</td><td></td></tr>');

                   $('#gstShowingRow').remove();
                   $('#showQuotation').append('<tr id="gstShowingRow"><td>gst</td><td></td><td></td><td>'+calculatedSum.toFixed(2)+'</td><td></td><td></td></tr>');
              });

              $(document).on('keyup','.quantityChangeField',function(){


              	  var td = $(this).closest('tr');

              	 var priceChanged = Number(td.find('td').eq(1).text());

              	 var quantityChanged = Number(td.find('td').eq(2).text());

              	 console.log(quantityChanged,priceChanged);

               $(td).find('td').eq(3).text(Number(quantityChanged * priceChanged));


   var discountPercentage = Number($(td).find('.discountPriceColm').data('discount')) || 0;

               var qtyPriceMul = Number(quantityChanged * priceChanged) || 0;

               var disCountVal = 0;

               if(qtyPriceMul > 0)
                   
                 disCountVal = (qtyPriceMul/100) * discountPercentage;


               //$(td).find('td').eq(4).text();


               //$(td).find('.discountPriceColm').text(discountPercentage);

               $(td).find('td').eq(4).text(Number(disCountVal));  // discount price

              	 // for total price calculation

              	 var totalPrice = showTotalAtBottom();

                 console.log('grand',totalPrice);

                 totalPrice = totalPrice.toArray();


                var totalDiscount = showTotalDiscountAtBottom();

                 totalDiscount = totalDiscount.toArray(); 

                 var discountValue = 0;

                 //discountValue = discountValue + totalDiscount[ii];

                  var sum =0;

                 for(var ii =0; ii<totalPrice.length;ii++){

                 	  sum = sum + totalPrice[ii];

                 	  discountValue = discountValue + totalDiscount[ii];
                 }

                   
              var sumWithGst = (parseInt($('#gstPercentageForUser').val(),10)/100)*sum;
              
              console.log('original sum', sum);

              console.log(' gst',sumWithGst);

              var calculatedSum = sumWithGst + sum;                 


                 $('#lastTotalRow').remove();

                 $('#showQuotation').append('<tr id="lastTotalRow"><td>total</td><td></td><td></td><td>'+sum+'</td><td>'+discountValue+'</td><td></td></tr>');  

                $('#gstShowingRow').remove();
                $('#showQuotation').append('<tr id="gstShowingRow"><td>gst</td><td></td><td></td><td>'+calculatedSum.toFixed(2)+'</td><td></td><td></td></tr>');
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
            				  console.log('revised quotation table ',result);


                      //return false;  

                   var baseUrlMain = $('#allTheBaseUrl999987').val();

		            var goUrl = baseUrlMain+'/save_revised_quotation/';

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


               if($('#gstPercentageForUser').val() == ''){
                  alert('Please Enter Gst Percentage!!');

                  return false;
               }

		            //return false;   

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

		            		  var mesg = {message:'Error Has Occured !!!',status:'warning'};
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

                 var totalDiscount = showTotalDiscountAtBottom();

                 totalDiscount = totalDiscount.toArray(); 

                 var discountValue = 0;

               // discountValue = discountValue + totalDiscount[ii];

                 console.log('grand',totalPrice);

                 totalPrice = totalPrice.toArray();

                  var sum =0;

                 for(var ii =0; ii<totalPrice.length;ii++){

                    sum = sum + totalPrice[ii];

                      discountValue = discountValue + totalDiscount[ii];
                 }

              var sumWithGst = (parseInt($(this).val(),10)/100)*sum;
              
              console.log('original sum', sum);

              console.log(' gst',sumWithGst);

              var calculatedSum = sumWithGst + sum;

           $('#lastTotalRow').remove();

           $('#showQuotation').append('<tr id="lastTotalRow"><td>total</td><td></td><td></td><td>'+sum+'</td><td>'+discountValue+'</td><td></td></tr>');


            $('#gstShowingRow').remove();
            $('#showQuotation').append('<tr id="gstShowingRow"><td>gst</td><td></td><td></td><td>'+calculatedSum.toFixed(2)+'</td><td></td><td></td></tr>');

      });

    });

    
    </script>
@endsection  