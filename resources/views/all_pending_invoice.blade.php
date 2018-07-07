@extends('main-layout.main')


  {{-- js section code --}}

    @section('css') 


    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">

   <link rel="stylesheet" href="http://akquinet.github.io/jquery-toastmessage-plugin/demo/css/jquery.toastmessage-min.css">

	 <style type="text/css">

				td, th {
				    border: 1px solid #dddddd;
				    text-align: left;
				    padding: 8px;

				}

				.btn-info{margin: 2px;
				background-color: gray;
        }

       ul li.line{
           display: inline;
          float: left;
        }

        .classForInvoiceSent{background-color:#43a047!important;}
	  </style>

     @endsection

  {{-- js section code --}}

   @section('content')


  <button class="btn btn-primary" id="exportAttendance222">Export Excel</button>



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


    {{ $data->links() }} 


      <table class="table table-boardered" id="examples">
  <thead class="thead-dark">
    <tr>
      <div class="row">
        <div class="col-md-2">
      <th>Edit Options</th>
    </div>

  </div>
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
<th>Quantity</th>
<th>Due Date</th>
<th>Billing Address</th>
<th>Shipping Address</th>
<th>Installing Address</th>
<th>Design</th>
<th>Production</th>
<th>Shipping</th>
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
<th>Priority</th>    </tr>
  </thead>
  <tbody>

 @foreach($data as $dat)
	    
      <tr>
        <div class="row">
	   <td>
     
      <ul>
	  <li class="line"> <a  href="#" data-edit="{{ '.$dat->id.'}}" class="btn btn-info edit-workflow">Workflow</a></li>
	   <li class="line"><a href="#" class="btn btn-info send-status">Send Status </a></li>
	   <li class="line"><a href="#" class="btn btn-info send-quotation">Send Quotation</a></li>
	   <li class="line"><a href="{{URL::to('generate_invoice/'.$dat->id)}}" class="btn btn-info send-invoice {{$dat->invoice_sent}}" title="{{$dat->title_for_invoice_sent}} At {{date('d-m-Y h:i A', strtotime($dat->invoice_sent_time))}}">Send in Voice</a></li>
	   <li class="line"><a href="#" class="btn btn-info delete-customer">Delete</a></li></ul></td> </div>   
	     
	<td>{{$dat->id}}</td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="name">{{$dat->name}}</td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="workflow">{{$dat->workflow}}</td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="reviewer">{{$dat->reviewer}}</td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="customer_name">{{$dat->customer_name}}</td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="contact_name">{{$dat->contact_name}}</td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="description">{{$dat->description}}</td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="order_number">{{$dat->order_number}}</td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="line_number">{{$dat->line_number}}</td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="po_number">{{$dat->po_number}}</td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="quantity">{{$dat->quantity}}</td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="due_date">{{$dat->due_date}}</td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="billing_address">{{$dat->billing_address}}</td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="shipping_address">{{$dat->shipping_address}}</td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="installing_address">{{$dat->installing_address}}</td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="design">{{$dat->design}}</td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="production">{{$dat->production}}</td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="shipping">{{$dat->shipping}}</td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="install">{{$dat->install}}</td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="production_manager">{{$dat->production_manager}}</td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="project_manager">{{$dat->project_manager}}</td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="sales_representative">{{$dat->sales_representative}}</td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="shipping_method">{{$dat->shipping_method}}</td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="priority">{{$dat->priority}}</td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="local_file">{{$dat->local_file}}</td>
	<td data-table="rush">{{$dat->rush}}</td>
	<td data-table="workflow" style="color:#0277bd">{{date('d-m-Y', strtotime($dat->created_at))}}</td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="job_completed">{{$dat->job_completed}}</td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="priority">{{$dat->priority}}</td>

	    </tr>

  @endforeach



    
  </tbody>
</table>

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


	$(document).ready(function(){
        $('.editableDataClass').blur(function(e){
        	e.preventDefault();
            //alert($(this).data('edit'));   

            var rowId = $(this).data('edit');

            console.log($(this));

            var tableName = $(this).data('table');

            var baseUrlMain = $('#allTheBaseUrl999987').val();

            var goUrl = baseUrlMain+'/edit_job/'+rowId;

            var textData  = $(this).text();


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
  	 });


</script>


  <script type="text/javascript">
  	 

  	 $(document).ready(function () {
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