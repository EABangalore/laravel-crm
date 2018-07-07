@extends('main-layout.main')

   @section('css')

      <link rel="stylesheet" href="http://akquinet.github.io/jquery-toastmessage-plugin/demo/css/jquery.toastmessage-min.css">

       <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
   @endsection

   @section('content')

    <div class="row">

              <div class="col-md-4">



                {{ $data->appends($_GET)->links() }}

    
                    @php 

                    $sel1 = '';$sel2 = ''; $sel3 = ''; $sel4 = ''; $sel5 = ''; 

                    $selected = (@$_GET['filter_data']) ? $_GET['filter_data'] : '';

                    if($selected == 'all') {
                        $sel1 = 'selected';
                     }else if($selected == 'pending'){
                        $sel2 = 'selected'; 
                     }else if($selected == 'sent'){
                       $sel3 = 'selected';  
                     }else if($selected == 'follow'){
                       $sel4 = 'selected';  
                     }else{
                       $sel5 = 'selected';  
                     }
                     

                    @endphp

                  <p>Filter Results - <span style="color:#ff9800;font-size: 18px;">{{@$_GET['filter_data']}}</span></p>

                 @if(@$recordCount) <p>Showing Results : {{@$recordCount}} / out of ({{@$totalRecord}})</p> @endif

                 <select name="priority" id="statusCustomer" class="form-control holdFor">
                        <option value="">--Please Select--</option>
                        <option value="all" {{$sel1}}>All Invoice</option>  
                        <option value="pending" {{$sel2}}>Pending Invoice</option>
                        <option value="sent" {{$sel3}}>Sent</option>  
                        <option value="follow" {{$sel4}}>Follow Up Invoice</option>  
                        <option value="approved" {{$sel5}}>Approved</option>   
                  </select>

               </div>

               <form id="filterForm" action="filter_invoice" method="GET">
                    <input type="hidden" name="filter_data" id="filter_data">
               </form>

            </div> 



      <div class="row">


  			<div class="col-md-6">
  		                    
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

  		        </div>

      	  <button class="btn btn-primary" id="exportAttendance222">Export Excel</button>

		 	  <table id="examples" class="table table-bordered showSupplierProcuredItem">
		 	  	  <thead>
		 	  	  	  <tr>
		 	  	  	  	  <th>invoice_number</th>
		 	  	  	  	  <th>company_name</th>
		 	  	  	  	  <th>invoice_date</th>
		 	  	  	  	  <th>buyer</th>
		 	  	  	  	  <th>delivery_note</th>
		 	  	  	  	  <th>transaction</th>
		 	  	  	  	  <th>delivery_note_date</th>
		 	  	  	  	  <th>dispatched_through</th>  
		 	  	  	  	  <th>destination</th>
		 	  	  	  	  <th>Status</th>
		 	  	  	  	  <th>View Invoice</th>  
		 	  	  	  	  <th>Edit</th>
		 	  	  	  	  <th>Delete</th>
		 	  	  	  </tr>
		 	  	  </thead>
		 	  	  <tbody>

                     @foreach($data as $dat)
                        <tr>
                        	<td>{{$dat->invoice_number}}</td>
                        	<td title="Buyer Name And Address : {{$dat->buyer}} ,   Location: {{$dat->destination}}">{{$dat->company_name}}</td>
                        	<td title="Buyer Name And Address : {{$dat->buyer}} ,   Location: {{$dat->destination}}">{{date('d-m-Y H:i a', strtotime($dat->invoice_date))}}</td>
                        	<td title="Buyer Name And Address : {{$dat->buyer}} ,   Location: {{$dat->destination}}">{!! $dat->buyer !!}</td>  
                        	<td title="Buyer Name And Address : {{$dat->buyer}} ,   Location: {{$dat->destination}}">{{$dat->delivery_note}}</td>
                        	<td title="Buyer Name And Address : {{$dat->buyer}} ,   Location: {{$dat->destination}}">{{$dat->transaction}}</td>
                        	<td title="Buyer Name And Address : {{$dat->buyer}} ,   Location: {{$dat->destination}}">{{date('d-m-Y H:i a', strtotime($dat->delivery_note_date))}}</td>
                        	<td title="Buyer Name And Address : {{$dat->buyer}} ,   Location: {{$dat->destination}}">{{$dat->dispatched_through}}</td>
                        	<td title="Buyer Name And Address : {{$dat->buyer}} ,   Location: {{$dat->destination}}">{{$dat->destination}}</td>


			    <td class="statusNotClass">

				 <p><span style="color:#ff9800;">Old : </span><strong>{{$dat->status}}</strong></p>        
			   <select data-edit="{{$dat->id}}" data-table="status" class="defineWorkflow">  
			            <option value="">-- Select --</option>
			            <option value="pending">Pending</option>
			            <option value="sent">Sent</option>
                  <option value="follow">Follow</option>  
                  <option value="approved">Approved</option>  
					</select>

			    </td>   

                        	<td><a href="{{URL::to('show_performa_table/'.encodeToBase64($dat->customer_id))}}" class="btn btn-warning" target="_blank">View Invoice</a></td>
                        	
                        	<td title="Buyer Name And Address : {{$dat->buyer}} ,   Location: {{$dat->destination}}"><a href="{{URL::to('edit_performa_invoice/'.$dat->id)}}" class="btn btn-primary">Edit</a></td>

                        <td><form action="{{URL::to('delete_performa_invoice/'.encodeToBase64($dat->id))}}" method="POST"><input type="submit" value="Delete" class="btn btn-danger">{{csrf_field()}}</form></td> 
                        </tr>
                     @endforeach
		 	  	 </tbody>
		 	  	 <tfoot>
	 	  	  	  	  <th>invoice_number</th>
	 	  	  	  	  <th>company_name</th>
	 	  	  	  	  <th>invoice_date</th>
	 	  	  	  	  <th>buyer</th>
	 	  	  	  	  <th>delivery_note</th>
	 	  	  	  	  <th>transaction</th>
	 	  	  	  	  <th>delivery_note_date</th>
	 	  	  	  	  <th>dispatched_through</th>  
	 	  	  	  	  <th>destination</th>
	 	  	  	  	  <th style="display: none;"></th>
	 	  	  	  	  <th>View Invoice</th> 
	 	  	  	  	  <th style="display: none;"></th>
	 	  	  	  	  <th style="display: none;"></th>
		 	  	 </tfoot>
		 	  </table>

      </div>
   @endsection


   @section('js')

      <script type="text/javascript" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>

     <script src="http://akquinet.github.io/jquery-toastmessage-plugin/demo/jquery.toastmessage-min.js"></script>   

      <script type="text/javascript" src="{!! asset('/js/Contents/tableExport.js') !!}"></script>
     <script type="text/javascript" src="{!! asset('/js/Contents/jquery.base64.js') !!}"></script>

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

       	  
       	     $(function(){


				 $('#statusCustomer').on('change',function(){
		                
		                if($(this).val() == ''){
		                    return false;     
		                 }

		             $('#filter_data').val($(this).val());  

		             $('#filterForm').submit();


		         }); 


       $('.defineWorkflow').on('change',function(e){

            e.preventDefault();


             console.log($(this).data('table'));
             console.log($(this).data('edit'));
             console.log($(this).val());

            var rowId = $(this).data('edit');

            $('#row_id').val(rowId);

            console.log($(this));

            var tableName = $(this).data('table');

            var baseUrlMain = $('#allTheBaseUrl999987').val();

            var goUrl = baseUrlMain+'/set_performa_status/'+rowId;    

            var textData  = $(this).val();//$(this).text(); 


            console.log(goUrl);

            $.ajax({
              url:goUrl,
              type:'POST',
              data:{_token:$('meta[name="csrf-token"]').attr('content'),"table_name":tableName,"data":textData,"row_id":rowId},
              dataType:'json',
              success:function(data){
                console.log(data);

                    var mesg = {message:data.message,status:data.success};
                        showToastMessage(mesg);

              },
              error:function(data){
                console.log(data);
              }
            });
        });


         var table = $('#examples').DataTable();
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


