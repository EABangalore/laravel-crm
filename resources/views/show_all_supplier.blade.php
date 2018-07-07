@extends('main-layout.main')

  @section('css')
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.css">
  @endsection


  @section('content')
     <div class="container">


     	<div class="row">

     	 <input type="button" onclick="tableToExcel('testTable', 'W3C Example Table')" value="Export to Excel">

     		<div class="col-md-4">

			   <select id="showProjectData" name="customer_id" class="form-control selectpicker checkForChange" data-live-search="true">

						   @foreach($data as $dat)

							   <option  value="{{$dat->id}}" title="{{$dat->contact_name}}">{{$dat->company_name}}</option>

							 @endforeach
					</select>

			  </div>
		 </div>

		 <hr/>

		 <div class="row">

		 	  <table id="testTable" class="table showSupplierProcuredItem">
		 	  	  <thead>
		 	  	  	  <tr>
		 	  	  	  	  <th>Customer Id</th>
		 	  	  	  	  <th>Project Name</th>
		 	  	  	  	  <th>product_name</th>
		 	  	  	  	  <th>quantity</th>
		 	  	  	  	  <th>price</th>
		 	  	  	  	  <th>Total</th>
		 	  	  	  </tr>
		 	  	  </thead>
		 	  	  <tbody>

		 	  	 </tbody>
		 	  </table>
		 </div>

     </div>
  @endsection


  @section('js')
          <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.js"></script>

        <script type="text/javascript">

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

        	$(document).ready(function(){

                 $('#showProjectData').on('change',function(){
                 	 
                 	  console.log($(this).val());

                 	   var customerId = $(this).val();

                 	   var baseUrlMain = $('#allTheBaseUrl999987').val();

			            var goUrl = baseUrlMain+'/all_supplied_product/';

			            //var textData  = $(this).text();


			            console.log(goUrl);

			            var tbody = '';

			            $.ajax({
			            	url:goUrl,
			            	type:'POST',
			            	data:{_token:$('meta[name="csrf-token"]').attr('content'),"customer_id":customerId},
			            	dataType:'json',
			            	success:function(data){
			            		console.log(data);

			            		$('.showSupplierProcuredItem tbody').html('');

			            		// var mesg = {message:data.message,status:data.success};
			                   //       showToastMessage(mesg);
                             
                               $.each(data.data,function(i,v){
                                   console.log(i);
                                   tbody +=`<tr><td>${v.customer_id}</td><td>${v.project_name}</td><td>${v.product_name}</td><td>${v.quantity}</td><td>${v.price}</td><td>${v.total}</td><td colspan="5"></td></tr>`;
                               });

                               $('.showSupplierProcuredItem tbody').append(tbody);


			            	},
			            	error:function(data){
			            		console.log(data);
			            	}
			            });
                 });
        	});
        </script>
  @endsection