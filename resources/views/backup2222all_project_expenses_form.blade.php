@extends('main-layout.main')

  
  @section('css')
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.css">
  @endsection


  @section('content')


        <form method="POST" action="project_expenses_create">


{{--         	<div class="btn btn-primary" style="width:60;height:40;float: right;">
        		Total Price : <span id="totalPriceAfterCalculation"></span>
        	</div> --}}

        	<a href="#" class="btn btn-primary" id="exportExcel76326">Export</a> 

        	<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal" style="margin-left: 220px;">Generate Expenses</button>     

        	{{csrf_field()}}



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
<br><br>
			<div class="row">
				  	<div class="col-md-6 col-sm-12">
					<label>Customer Name&nbsp;<sup class="red">*</sup></label>
					<a href="#" data-toggle="tooltip" data-placement="right" title="Workflow Templates are the blueprints for production. Select the one that most closely matches."><img src="image/info_ico.png" alt="no" style="width:20px;height:20px;">	</a>

				<select name="customer_id" class="form-control selectpicker checkForChange" data-live-search="true">

						   @foreach($data as $dat)

							   <option  value="{{$dat->id}}" title="{{$dat->email}}" data-companyname="{{$dat->company_name}}" data-customername="{{$dat->contact_name}}" data-email="{{$dat->email}}">{{$dat->company_name}}</option>

							 @endforeach
					</select>

				 </div>

		</div>

		<br>
{{-- 
		<div class="row">


			
				 <div class="col-md-5">

                     <label>Product/Bought&nbsp;<sup class="red">*</sup></label>
				    <input type="text" name="product_name[]" class="form-control boughtProduct" placeholder="text field">

				    <br/>

				</div>


		       <div class="col-md-3">

                     <label>Quantity&nbsp;<sup class="red">*</sup></label>
				    <input type="number" name="quantity[]" class="form-control calculateQuantity" placeholder="text field">

				    <br/>

				</div>

			  <div class="col-md-2">

                     <label>Price&nbsp;<sup class="red">*</sup></label>
				    <input type="text" name="price[]" class="form-control calulatePrice" placeholder="text field">

				    <br/>

				</div>
              
                <br/>

		       <div class="col-md-2">
		       	  <button id="addEmailButton" type="button" class="btn btn-default"><i class="fa fa-plus-square"></i>Add</button>
		       </div>

		       <hr>

		</div> --}}


{{-- 	 <div class="appendData">
		       	
     </div> --}}


	

      <div>
      	
      	   <input type="hidden" id="companyNameHidden">

      	   <input type="hidden" id="customerNameHidden">

      	   <input type="hidden" id="emailIdHidden">
      	   <br><br>

      	   <div class="container">
				      <!-- Trigger the modal with a button -->
				      <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

				      <!-- Modal -->
				      <div class="modal fade" id="myModal" role="dialog">
				        <div class="modal-dialog">
				        
				          <!-- Modal content-->
				          <div class="modal-content">
				            <div class="modal-header">
				              <button type="button" class="close" data-dismiss="modal">&times;</button>
				              <h4 class="modal-title">Add Product</h4>
				            </div>
				            <div class="modal-body">

				              <div class="form-group col-md-4">
				              	   <label>Company Name</label>
				              	   <input type="text" id="companyNameField" name="customer_name" class="form-control">
				              </div>

				              <div class="form-group col-md-4">
				              	   <label>Customer Name</label>
				              	   <input type="text" id="customerNameField" name="customer_name" class="form-control">
				              </div>


				             <div class="form-group col-md-4">
				              	   <label>Email Id</label>
				              	   <input type="text" id="emailIdField" name="email" class="form-control">
				              </div>


				              {{-- code for product addition --}}

                                
						<div class="row">


							
								 <div class="col-md-5">

				                     <label>Product/Bought&nbsp;<sup class="red">*</sup></label>
								    <input type="text" name="product_name[]" class="form-control boughtProduct" placeholder="">

								    <br/>

								</div>


						       <div class="col-md-3">

				                     <label>Quantity&nbsp;<sup class="red">*</sup></label>
								    <input type="number" name="quantity[]" class="form-control calculateQuantity" placeholder="">

								    <br/>

								</div>

							  <div class="col-md-2">

				                     <label>Price&nbsp;<sup class="red">*</sup></label>
								    <input type="text" name="price[]" class="form-control calulatePrice" placeholder="">

								    <br/>

								</div>
				              
				                <br/>

						       <div class="col-md-2">
						       	  <button id="addEmailButton" type="button" class="btn btn-default"><i class="fa fa-plus-square"></i>Add</button>
						       </div>

						       <hr>

						</div>

						 <div class="appendData">
	       	
                         </div>

      {{-- code for product addition --}}

				            </div>
				            <div class="modal-footer">
				              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				            </div>
				          </div>
				          
				        </div>
				      </div>
				</div>

      </div>

      <div id="exportTable">

      	<table id="expensesTable34635" class="table table-bordered"  >
      		<thead>
	      		  <tr>
	      		  	<th>Company Name</th>
	      		  	<th>Customer Name</th>
	      		  	<th>Email</th>
	      			<th>Product/Bought</th>
	      			<th>Quantity</th>
	      			<th>Price</th>
	      		  </tr>
      		</thead>
      		<tbody>
      			
      		</tbody>
      	</table>
      	
      </div>

      <div class="row">

                <br/>

		       <div class="col-md-2">

				    <input type="submit" value="Submit" class="form-control btn btn-success">  

				    <br/>

				</div>

			<textarea name="generatedTable" style="display:none;"></textarea>

	          </form>
		</div>

{{-- <input type="button" onclick="tableToExcel('testTable', 'W3C Example Table')" value="Export to Excel">

<table id="testTable">
	<tbody>
		<tr>
			<th>Name</th>
			<td>Ejaz Anwar</td>
		</tr>
		<tr>
			<th>Name</th>
			<td>Ejaz Anwar</td>
		</tr>

	      <tr>
			<th>Name</th>
			<td style="background-color: red;">Ejaz Anwar</td>
		</tr>

          <tr>
			<th>Name</th>
			<td style="background-color: red;">Ejaz Anwar</td>
		</tr>

		 <tr>
			<th>Name</th>
			<td style="background-color: red;">Ejaz Anwar</td>
		</tr>

	       <tr>
			<th colspan="5">
				<td style="width:100px;height:100px;"><img src="https://www.google.co.in/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png"/></td>
			</th>
		</tr>
	</tbody>
</table> --}}


  @endsection


    @section('js')

     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.js"></script>

     <script type="text/javascript" src="{!! asset('/js/Contents/tableExport.js') !!}"></script>
     <script type="text/javascript" src="{!! asset('/js/Contents/jquery.base64.js') !!}"></script>


     <script type="text/javascript">



		 function showTotalAtBottom(){
           	// for dynamic price calculation


			var price = $('.sscalulatePrice').map(function(){
			   
			  // return parseInt($(this).val(),10);

			  	    var number = parseInt($(this).text(),10);

			        return   isNaN(number) ? 0 : number;

			});

            var priceArray = price.toArray();

            console.log(priceArray);


           var quantity = $('.sscalculateQuantity').map(function(){
			   
			    var number = parseInt($(this).text(),10); 

			    return   isNaN(number) ? 0 : number;


			});

            var quantityArray = quantity.toArray();

            console.log(quantityArray);

            var priceTemp = 0;
            var totalPrice = 0;

            for(var iim = 0; iim < priceArray.length; iim++){
                 priceTemp = quantityArray[iim] * priceArray[iim];//totalQuantity;
                 totalPrice = priceTemp + totalPrice;

             }

             console.log(totalPrice);

             //$('#totalPriceAfterCalculation').text(totalPrice);


            // $('.grandTotal tr').remove();

            $('.grandTotal').closest('tr').remove();  

               var totalPriceRow = '<tr><td colspan="5" class="grandTotal" style="text-align:center;">Total Price</td><td>'+totalPrice+'</td></tr>';

            // $('#expensesTable34635 tbody').html('');
              $('#expensesTable34635 tbody').append(totalPriceRow);  

              reflectChangesToPrice();
		  }



     	var tableToExcel = (function() {
			  var uri = 'data:application/vnd.ms-excel;base64,'
			    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
			    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
			    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
			  return function(table, name) {
			    if (!table.nodeType) table = document.getElementById(table)
			    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
			    window.location.href = uri + base64(format(template, ctx))
			  }
			})();


        function reflectChangesToPrice(){

           	// for dynamic price calculation


			var price = $('.calulatePrice').map(function(){
			   
			  // return parseInt($(this).val(),10);

			  	    var number = parseInt($(this).val(),10);

			        return   isNaN(number) ? 0 : number;

			});

            var priceArray = price.toArray();

            console.log(priceArray);


           var quantity = $('.calculateQuantity').map(function(){
			   
			    var number = parseInt($(this).val(),10);

			    return   isNaN(number) ? 0 : number;


			});

            var quantityArray = quantity.toArray();

            console.log(quantityArray);

            var priceTemp = 0;
            var totalPrice = 0;

            for(var iim = 0; iim < priceArray.length; iim++){
                 priceTemp = quantityArray[iim] * priceArray[iim];//totalQuantity;
                 totalPrice = priceTemp + totalPrice;

             }

             console.log(totalPrice);

             //$('#totalPriceAfterCalculation').text(totalPrice);

        }

     	 $(document).ready(function(){

     	 	 var phoneii = 1; 


     $('.checkForChange').change(function(){
     	 		var projectName = $(this).find(':selected').text();

     	 $('form').append('<input type="hidden" name="project_name" value="'+projectName+'">');


     	 	});

           $('#addEmailButton').click(function(){

              phoneii++;


           	// for dynamic price calculation


			var price = $('.calulatePrice').map(function(){
			   
			   //return parseInt($(this).val(),10);

			    var number = parseInt($(this).val(),10);

			    return   isNaN(number) ? 0 : number;

			});

            var priceArray = price.toArray();

            console.log(priceArray);


           var quantity = $('.calculateQuantity').map(function(){
			   
			   //return parseInt($(this).val(),10);

			    var number = parseInt($(this).val(),10);

			    return   isNaN(number) ? 0 : number;

			});



           /* product array */


            var productName = $('.boughtProduct').map(function(){
			   
			   //return parseInt($(this).val(),10);

			   // var prod = $(this).val();//parseInt($(this).val(),10);

			    return  $(this).val(); //isNaN(number) ? 0 : number;

			});

			var productNameArray = productName.toArray();

            /*  product array */

            var quantityArray = quantity.toArray();

            console.log(quantityArray);

            var priceTemp = 0;
            var totalPrice = 0;

            for(var iim = 0; iim < priceArray.length; iim++){
                 priceTemp = quantityArray[iim] * priceArray[iim];//totalQuantity;
                 totalPrice = priceTemp + totalPrice;

             }

             console.log(totalPrice);
             

             var tableBody = '';

               var companyName4367673 	=  $('#companyNameField').val();
               var customerName43887  	=  $('#customerNameField').val();
               var  emailField458874  	= $('#emailIdField').val();

             for(var index = 0; index < quantityArray.length; index++ ){
                 tableBody += '<tr><td>'+companyName4367673+'</td><td>'+customerName43887+'</td><td>'+emailField458874+'</td><td>'+productNameArray[index]+'</td><td>'+quantityArray[index]+'</td><td>'+priceArray[index]+'</td></tr>';  
             }


             $('.grandTotal').closest('tr').remove();


             var totalPriceRow = '<tr><td colspan="5" class="grandTotal" style="text-align:center;">Total Price</td><td>'+totalPrice+'</td></tr>';

            // $('#expensesTable34635 tbody').html('');
             $('#expensesTable34635 tbody').append(tableBody).append(totalPriceRow);


             reflectChangesToPrice();



             //$('#totalPriceAfterCalculation').text(totalPrice);


            // end of dynamic price calculation

              
     	 	   $('.appendData').append(`<tr id="phone${phoneii}"><td><div class="row">


			
				 <div class="col-md-5">

                     <label>Product/Bought&nbsp;<sup class="red">*</sup></label>
				    <input type="text" name="product_name[]" class="form-control boughtProduct" placeholder="">

				    <br/>

				</div>


		       <div class="col-md-3">

                     <label>Quantity&nbsp;<sup class="red">*</sup></label>
				    <input type="number" name="quantity[]" class="form-control calculateQuantity" placeholder="">

				    <br/>

				</div>

			  <div class="col-md-2">

                     <label>Price&nbsp;<sup class="red">*</sup></label>
				    <input type="text" name="price[]" class="form-control calulatePrice" placeholder="">

				    <br/>

				</div>
              
                <br/>
		  </div><div class="col-md-2 col-sm-12"><td><button type="button" data-phoneId="${phoneii}" class="btn btn-danger btn_phoneRemove"><i class="fa fa-trash-o"></i></button></td></div><td></tr>`);

           });

              $(document).on('click', '.btn_phoneRemove', function(){  
			           var button_id = $(this).attr("data-phoneId");

			           console.log(button_id);

			           $('#phone'+button_id+'').remove();  

			           reflectChangesToPrice();
			      });


	         $('#exportExcel76326').bind('click', function (e) {

	         	e.preventDefault();

	            $('#expensesTable34635').tableExport({ type: 'excel', escape: 'false', bootstrap: true});
	        });


	       $('.checkForChange').change(function(){
	       	   console.log($(this).val());


            $('#companyNameHidden').val($('.checkForChange option:selected').data('companyname'));


            $('#customerNameHidden').val($('.checkForChange option:selected').data('customername'));

          $('#emailIdHidden').val($('.checkForChange option:selected').data('email'));


          $('#companyNameField').val($('.checkForChange option:selected').data('companyname'));
	      $('#customerNameField').val($('.checkForChange option:selected').data('customername'));
	      $('#emailIdField').val($('.checkForChange option:selected').data('email'));

	      var companyName = $('.checkForChange option:selected').data('companyname');

	      var customerName = $('.checkForChange option:selected').data('customername');

	      var emailId = $('.checkForChange option:selected').data('email');

	         var baseUrlMain = $('#allTheBaseUrl999987').val();

             var goUrl = baseUrlMain+'/previous_expenses_data/';

             var tobodyData = '';  

	       	  $.ajax({
	       	   	  url:goUrl,
	       	   	  type:'POST',
	       	   	  data:{_token:$('meta[name="csrf-token"]').attr('content'),customer_id:$(this).val()},
	       	   	  dataType:'json',
	       	   	  success:function(data){

	       	   	  $('#expensesTable34635 tbody').html('');

                    console.log(data);

                  // if(data.previousExpenses.count > 0){
                       
                       $.each(data.previousExpenses,function(i,v){
                     
                         tobodyData += '<tr><td>'+customerName+'</td><td>'+customerName+'</td><td>'+emailId+'</td><td>'+v.product_name+'</td><td class="sscalculateQuantity">'+v.quantity+'</td><td class="sscalulatePrice">'+v.price+'</td></tr>';
                         
                         console.log(v.product_name);

                       }); 
                    //}

                    $('#expensesTable34635 tbody').append(tobodyData); 

                    showTotalAtBottom();       

	       	   	  }
	       	   });               

	       }); 

     	 });


     </script>
  @endsection