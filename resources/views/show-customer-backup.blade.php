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

  </style>

@endsection


   @section('content')



	   <div class="panel panel-default">
    <div class="panel-body">
    	

   <div class="main-content">
				
		{{-- 	<div class="container"> --}}
			
           <div class="row">
			
			    <div class="col-md-12">

			    	<button class="btn btn-primary" id="exportAttendance222">Export Excel</button>

			   <button class="btn btn-primary" id="generatePdf3634643">Generate Pdf</button>
					
       			<table id="examples" class="tablen table-bordered" width="1000px" style="border: 1px solid grey">
						
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
								<td>{{$dat->install}}</td>
							</tr>
							<tr>
								<th>Production Manager</th>
								<td>{{$dat->production_manager}}</td>
							</tr>
							<tr>
								<th>Project manager</th>
								<td>{{$dat->project_manager}}</td>
							</tr>
							<tr>
								<th>Sales Representatives</th>
								<td>{{$dat->sales_representative}}</td>
							</tr>
							<tr>
								<th>Shipping Method</th>
								<td>{{$dat->shipping_method}}</td>
							</tr>
							<tr>
								<th>Priority</th>
								<td>{{$dat->priority}}</td>
							</tr>
							<tr>
								<th>Local File</th>
								<td>{{$dat->local_file}}</td>
							</tr>
							<tr>
								<th>Rush</th>
								<td>{{$dat->rush}}</td>
							</tr>
							<tr>
								<th>Created At</th>
								<td>{{Date($dat->created_at)}}</td>
							</tr>
							<tr>
								<th>Job Completed</th>
								<td>{{$dat->job_completed}}</td>
							</tr>
							<tr>
								<th>Priority</th>
								<td>{{$dat->priority}}</td>
							</tr>

							</tr>
					@endforeach

						</tbody>
			</table>

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
	
	$(function(){

		  var input = '<input type="hidden" id="currentUrl174763" value="{{Request::url()}}">';

		    $('body').append(input);



		    $('#exportAttendance222').bind('click', function (e) {

               $('#examples').tableExport({ type: 'excel', escape: 'false', bootstrap: true});
           });


		 $('#generatePdf3634643').click(function(){


			 //   $.ajaxSetup({
				//     headers: {
				//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				//     }
				// });
            
            // $.ajax({
            // 	url: '/phantomjs',
            // 	type:'POST',  
            // 	data:{"print_url":$('#currentUrl174763').val()},
            // 	dataType:'json',
            // 	success:function(data){
            //        console.log(data);        
            // 	}
            // }); 


            var baseUrl = $('#allTheBaseUrl999987').val();



            var printUrl = $('#currentUrl174763').val();

            window.location.href = baseUrl+'/phantomjs?print_url='+printUrl;

		 });

	   // var table = $('#examples').DataTable();
    //     $('a.toggle-vis').on('click', function (e) {
    //         e.preventDefault();

    //         var column = table.column($(this).attr('data-column'));
    //         column.visible(!column.visible());
    //     });

    //     $('#examples tfoot th').each(function () {
    //         var title = $('#examples thead th').eq($(this).index()).text();
    //         $(this).html('<input tyepe="text" placeholder="Search ' + title + '"/>');
    //     });
    //     table.columns().eq(0).each(function (colIdx) {
    //         $('input', table.column(colIdx).footer()).on('keyup change', function () {
    //             table
    //                     .column(colIdx)
    //                     .search(this.value)
    //                     .draw();
    //         });
    //     });
	});
</script>

 @endsection