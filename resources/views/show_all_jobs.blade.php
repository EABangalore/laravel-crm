@extends('main-layout.main')


  {{-- js section code --}}

    @section('css') 


    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">

   <link rel="stylesheet" href="http://akquinet.github.io/jquery-toastmessage-plugin/demo/css/jquery.toastmessage-min.css">

	 <style type="text/css">

.table>caption+thead>tr:first-child>td, .table>caption+thead>tr:first-child>th, .table>colgroup+thead>tr:first-child>td, .table>colgroup+thead>tr:first-child>th, .table>thead:first-child>tr:first-child>td, .table>thead:first-child>tr:first-child>th {
    border-top: 1px solid black !important;
}

        td, th {
            border: 1px solid gray;
            text-align: left;
            padding: 8px;

        }

        .btn-info{margin: 2px;
        background-color: gray;}
	  </style>

     @endsection

  {{-- js section code --}}

   @section('content')

    {{ $data->links() }} 

      <table class="table table-boardered" id="examples">
  <thead class="thead-dark">
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
	<td data-table="workflow">{{$dat->created_at}}</td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="job_completed">{{$dat->job_completed}}</td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="priority">{{$dat->priority}}</td>



<thead class="thead-dark bottomRemove" style="background-color: !important;">
    <div class="row">
       
      <th  style="width: 100% !important">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspEdit Option</th>

      <th colspan="50 ">{{-- <a  href="#" data-edit="{{$dat->id}}" class="btn btn-danger edit-workflow">Workflow</a> --}}
     <a href="#" class="btn btn-danger send-status">Send Status </a>
     <a href="#" class="btn btn-danger  send-quotation">Send Quotation</a>
    <a href="#" class="btn btn-danger  send-invoice">Send in Voice</a>
 <a href="#" class="btn btn-danger  delete-customer">Delete</a></th>
   

  </div>
  </thead>

  @endforeach



    
  </tbody>
</table>

@endsection

@section('js')
<script type="text/javascript" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>

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
    });
  </script>
@endsection  
