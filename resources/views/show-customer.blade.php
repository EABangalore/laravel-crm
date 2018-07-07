@extends('main-layout.main')


@section('css') 

  <style type="text/css">
  	
  table th, td {
  	text-align: center !important;
  }

  table{
  	position: relative;
  	top: 0px;
  	left: 50%;
  	transform: translate(-50%);
  }
  th{
  	background-color: #252c35;
  	color:white;
  }

  </style>

@endsection


   @section('content')



	   <div class="panel panel-default">
    <div class="panel-body">
    	

   <div class="main-content">
				
		{{-- 	<div class="container"> --}}
			
           <div class="row">
			
			    <div class="col-md-12">

{{-- 			    	<button class="btn btn-primary" id="exportAttendance222">Export Excel</button> --}}

<input type="button" class="btn btn-primary" onclick="tableToExcel('testTable', 'W3C Example Table')" value="Export to Excel">

			   {{-- <button class="btn btn-primary" id="generatePdf3634643">Generate Pdf</button> --}}
					
					
       			<table id="testTable" class="table table-boarder " width="1000px" style="border: 1px solid grey">
						
					<tbody>
                            
                       @foreach($data as $dat)
							<tr>
								<th>Id</th>
								<td>{{$dat->id}}</td>
							 <tr>
							 <tr>
							 	<th>Name</th>
								<td>{{$dat->name}}</td>
							</tr>
							 <tr>
							   	<th>Workflow</th>
								<td>{{$dat->workflow}}</td>
							</tr>
							 <tr>
							 	<th>Reviewer</th>
								<td>{{$dat->reviewer}}</td>
							</tr>
							<tr>
								<th>Customer Name</th>
								<td>{{$dat->customer_name}}</td>
							</tr>
							<tr>
								<th>Contact Name</th>
								<td>{{$dat->contact_name}}</td>
							</tr>
							<tr>
								<th>Description</th>
								<td>{{$dat->description}}</td>
							</tr>
							<tr>
								<th>Order Number</th>
								<td>{{$dat->order_number}}</td>
							</tr>
							<tr>
								<th>Line Number</th>
								<td>{{$dat->line_number}}</td>
							</tr>
							<tr>
								<th>PO Number</th>
								<td>{{$dat->po_number}}</td>
							</tr>

							<tr>
								<th>Quantity</th>
								<td>{{$dat->quantity}}</td>
							</tr>
							<tr>
								<th>Due Date</th>
								<td>{{$dat->due_date}}</td>
							</tr>
							<tr>
								<th>Billing Address</th>
								<td>{{$dat->billing_address}}</td>
							</tr>
							<tr>
								<th>Shipping Address</th>
								<td>{{$dat->shipping_address}}</td>
							</tr>
							<tr>
								<th>Installing Address</th>
								<td>{{$dat->installing_address}}</td>
							</tr>
							<tr>
								<th>Design</th>
								<td>{{$dat->design}}</td>
							</tr>
							<tr>
								<th>Production</th>
								<td>{{$dat->production}}</td>
							</tr>
							<tr>
								<th>Shipping</th>
								<td>{{$dat->shipping}}</td>
							</tr>
							<tr>
								<th>Install</th>
								<td>{{$data[0]->install}}</td>
							</tr>
							<tr>
								<th>Production Manager</th>
								<td>{{$data[0]['production_manager']}}</td>
							</tr>
							<tr>
								<th>Project manager</th>
								<td>{{$data[0]['project_manager']}}</td>
							</tr>
							<tr>
								<th>Sales Representatives</th>
								<td>{{$data[0]['sales_representative']}}</td>
							</tr>
							<tr>
								<th>Shipping Method</th>
								<td>{{$data[0]['shipping_method']}}</td>
							</tr>
							<tr>
								<th>Priority</th>
								<td>{{$data[0]['priority']}}</td>
							</tr>
							<tr>
								<th>Local File</th>
								<td>{{$data[0]['local_file']}}</td>
							</tr>
							<tr>
								<th>Rush</th>
								<td>{{$data[0]['rush']}}</td>
							</tr>
							<tr>
								<th>Created At</th>
								<td>{{Date($data[0]['created_at'])}}</td>
							</tr>
							<tr>
								<th>Job Completed</th>
								<td>{{$data[0]['job_completed']}}</td>
							</tr>
							<tr>
								<th>Priority</th>
								<td>{{$data[0]['priority']}}</td>
							</tr>

							</tr>
					@endforeach

						</tbody>
			</table>

{{-- 
			<table class="table table-boarder" id="examples222" style="display: none;">
					<thead>
                    

						<tr>
								<th>Id</th>
								<th>Name</th>
								<th>Workflow</th>
								<th>Reviewer</th>
								<th>Customer Name</th>
								<th>Contact Name</th>
								<th>Description</th>
								<th>Order Number</th>
								<th>Line Number</th>
								<th>PO Number</th>
								<th>Due Date</th>
								<th>Due Date</th>
								<th>Billing Address</th>
								<th>Shipping Address</th>
								<th>Installing Address</th>
								<th>Design</th>
								<th>Production</th>
								<th>Install</th>
								<th>Production Manager</th>
								<th>Project manager</th>
								<th>Sales Representatives</th>
								<th>Shipping Method</th>
							    <th>Priority</th>
								<th>Local File</th>
								<th>Rush</th>
								<th>Created At</th>
								<th>Job Completed</th>
								<th>Priority</th>
						</tr>
					</thead>
                  <tbody>

                  @foreach($data as $dat)

                  	  <tr>
                           <td>{{$dat->id}}</td>
                           <td>{{$dat->name}}</td>	
                           <td>{{$dat->workflow}}</td>
                           <td>{{$dat->reviewer}}</td>
                           <td>{{$dat->customer_name}}</td>
                           <td>{{$dat->contact_name}}</td>
                           <td>{{$dat->description}}</td>
                           <td>{{$dat->order_number}}</td>
                           <td>{{$dat->line_number}}</td>
                           <td>{{$dat->po_number}}</td>
                           <td>{{$dat->quantity}}</td>
                           <td>{{$dat->due_date}}</td>
                           <td>{{$dat->billing_address}}</td>
                           <td>{{$dat->shipping_address}}</td>
                           <td>{{$dat->installing_address}}</td>
                           <td>{{$dat->design}}</td>	
                           <td>{{$dat->production}}</td>
                           <td>{{$dat->shipping}}</td>	
                           <td>{{$dat->install}}</td>
                           <td>{{$dat->production_manager}}</td>
                           <td>{{$dat->project_manager}}</td>
                           <td>{{$dat->sales_representative}}</td>
                           <td>{{$dat->shipping_method}}</td>
                           <td>{{$dat->priority}}</td>
                           <td>{{$dat->local_file}}</td>
                           <td>{{$dat->rush}}</td>
                           <td>{{Date($dat->created_at)}}</td>
                           <td>{{$dat->job_completed}}</td>
                           <td>{{$dat->priority}}</td>
                  	  </tr>

                  @endforeach

                  </tbody>
			</table> --}}

	      </div>

	    </div>

	 

	 </div>
    </div>
  </div>
   @endsection


   @section('js')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{!! asset('/js/Contents/tableExport.js') !!}"></script>
<script type="text/javascript" src="{!! asset('/js/Contents/jquery.base64.js') !!}"></script>

<script>
	
	// $(function(){

	// 	  var input = '<input type="hidden" id="currentUrl174763" value="{{Request::url()}}">';

	// 	    $('body').append(input);



	// 	  $('#exportAttendance222').bind('click', function (e) {

 //              $('#examples222').show().tableExport({ type: 'excel', escape: 'false', bootstrap: true});

 //              setTimeout(function(){
 //              	$('#examples222').hide();
 //              },1000);
 //          });


	// 	 $('#generatePdf3634643').click(function(){


	// 		 //   $.ajaxSetup({
	// 			//     headers: {
	// 			//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	// 			//     }
	// 			// });
            
 //            // $.ajax({
 //            // 	url: '/phantomjs',
 //            // 	type:'POST',  
 //            // 	data:{"print_url":$('#currentUrl174763').val()},
 //            // 	dataType:'json',
 //            // 	success:function(data){
 //            //        console.log(data);        
 //            // 	}
 //            // }); 


 //            var baseUrl = $('#allTheBaseUrl999987').val();



 //            var printUrl = $('#currentUrl174763').val();

 //            window.location.href = baseUrl+'/phantomjs?print_url='+printUrl;

	// 	 });

	//    // var table = $('#examples').DataTable();
 //    //     $('a.toggle-vis').on('click', function (e) {
 //    //         e.preventDefault();

 //    //         var column = table.column($(this).attr('data-column'));
 //    //         column.visible(!column.visible());
 //    //     });

 //    //     $('#examples tfoot th').each(function () {
 //    //         var title = $('#examples thead th').eq($(this).index()).text();
 //    //         $(this).html('<input tyepe="text" placeholder="Search ' + title + '"/>');
 //    //     });
 //    //     table.columns().eq(0).each(function (colIdx) {
 //    //         $('input', table.column(colIdx).footer()).on('keyup change', function () {
 //    //             table
 //    //                     .column(colIdx)
 //    //                     .search(this.value)
 //    //                     .draw();
 //    //         });
 //    //     });
	// });

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

</script>

 @endsection