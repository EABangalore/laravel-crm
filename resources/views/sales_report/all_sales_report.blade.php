@extends('main-layout.main')

   @section('css')
       <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
   @endsection

   @section('content')

       <div class="container">
    
             {{$data->links()}}    

       	     <button class="btn btn-primary" id="exportAttendance222">Export Excel</button>

		 	  <table id="examples" class="table table-bordered showSupplierProcuredItem">
		 	  	  <thead>
		 	  	  	  <tr>
		 	  	  	  	  <th>Customer Id</th>
		 	  	  	  	  <th>Company Name</th>
		 	  	  	  	  <th>Customer Name</th>
		 	  	  	  	  <th>Email</th>
		 	  	  	  	  <th>Phone Number</th>
		 	  	  	  	  <th>Total Amount</th>
		 	  	  	  	  <th>Recieved Amount</th>
		 	  	  	  	  <th>Pending Amount</th> 
		 	  	  	  	  <th>Project Status</th>
		 	  	  	  	  <th>project_manager</th>
		 	  	  	  	  <th>po_number</th>
		 	  	  	  	  <th>shipping_date</th>
		 	  	  	  	  <th>install</th>
		 	  	  	  	  <th>Started On</th>
		 	  	  	  </tr>
		 	  	  </thead>
		 	  	  <tbody>

                     @foreach($data as $dat)
                        <tr>
                        	<td>{{encodeToBase64($dat->customer_id)}}</td>
                        	<td>{{$dat->company_name}}</td>
                        	<td>{{$dat->customer_name}}</td>
                        	<td>{{$dat->email}}</td>
                        	<td>{{$dat->phone}}</td>
                        	<td>{{@convertMoney($dat->total_amount)}}</td>
                        	<td>{{@convertMoney($dat->total_recieved_amount)}}</td>
                        	<td style="background-color: #ff9800;color:white;">{{@convertMoney($dat->total_balance)}}</td>
                            <td>{{$dat->status}}</td>
                            <td>{{$dat->project_manager}}</td>
                            <td>{{$dat->po_number}}</td>
{{--                             <td>{{$dat->project_manager}}</td>
                            <td>{{$dat->po_number}}</td> --}}
                            <td>{{date('d-m-Y', strtotime($dat->shipping_date))}}</td>
                            <td>{{$dat->install}}</td>
                        	<td>{{date('d-m-Y', strtotime($dat->created_at))}}</td>  
                        </tr>
                     @endforeach
		 	  	 </tbody>
		 	  	 <tfoot>
		 	  	  	  	  <th>Customer Id</th>
		 	  	  	  	  <th>Company Name</th>
		 	  	  	  	  <th>Customer Name</th>
		 	  	  	  	  <th>Email</th>
		 	  	  	  	  <th>Phone Number</th>
		 	  	  	  	  <th>Total Amount</th>
		 	  	  	  	  <th>Recieved Amount</th>
		 	  	  	  	  <th>Pending Amount</th> 
		 	  	  	  	  <th>Project Status</th>
		 	  	  	  	  <th>project_manager</th>
		 	  	  	  	  <th>po_number</th>
		 	  	  	  	  <th>shipping_date</th>
		 	  	  	  	  <th>install</th>
		 	  	  	  	  <th>Started On</th>
		 	  	 </tfoot>
		 	  </table>

       </div>
   @endsection


   @section('js')
           <script type="text/javascript" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>

      <script type="text/javascript" src="{!! asset('/js/Contents/tableExport.js') !!}"></script>
     <script type="text/javascript" src="{!! asset('/js/Contents/jquery.base64.js') !!}"></script>

       <script type="text/javascript">
       	  
       	     $(function(){

       	        var table = $('#examples').DataTable({
       	        	  "iDisplayLength": 300,
		              "aLengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]]
       	        });
		        $('a.toggle-vis').on('click', function (e) {
		            e.preventDefault();

		            var column = table.column($(this).attr('data-column'));
		            column.visible(!column.visible());
		        });

		        $('#examples tfoot th').each(function () {
		            var title = $('#examples thead th').eq($(this).index()).text();
		            $(this).html('<input tyepe="text" placeholder="Search ' + title + '"/>');
		        });
		        table.columns().eq(0).each(function (colIdx) {
		            $('input', table.column(colIdx).footer()).on('keyup change', function () {
		                table
		                        .column(colIdx)
		                        .search(this.value)
		                        .draw();
		            });

		       });

			   $('#exportAttendance222').bind('click', function (e) {
		         $('#examples').tableExport({ type: 'excel', escape: 'false', bootstrap: true});
		       });  

       	   });

       	</script>
  @endsection