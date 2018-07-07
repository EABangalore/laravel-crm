@extends('main-layout.main')


  {{-- js section code --}}

    @section('css') 


    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">

   <link rel="stylesheet" href="http://akquinet.github.io/jquery-toastmessage-plugin/demo/css/jquery.toastmessage-min.css">


  <link rel="stylesheet" href="{{ asset('css/print.css') }}" type="text/css" media="print"/>


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

        .classForInvoiceSent{background-color:#43a047!important;}

        .statusAlreadySent{background-color:#00796b!important;}

        form {
          margin: 0;
          padding: 0;
          display: -webkit-inline-box;   
      }

      .removeBtnStyle{
            border: none;
           background-color: #efcaca;
      }
	  </style>

     @endsection

  {{-- js section code --}}

   @section('content')


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

 <div class="container">
{{--   <h2>Modal Example</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> --}}

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Hold From</h4>
        </div>
        <div class="modal-body">
          
            <div class="row">
             
               <input type="hidden" name="row_id" id="row_id">

                <div class="col-md-5">
                    <label>Hold From:</label>

                      <div class="form-group">
                          <div class='input-group date' >
                              
                                <input type='text' name="hold_from" class="form-control" id="datetimepicker3"/>
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                      </div>
                </div>

                 <div class="col-md-5">
                    <label>Hold To:</label>
                    
                    <div class="form-group">
                        <div class='input-group date' >
                            
                              <input type='text' name="hold_to" class="form-control" id="datetimepicker4"/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="modal-footer">
          <button class="btn btn-success" id="holdForDate">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> <!-- end of modal -->
  
</div>


  <button class="btn btn-primary" id="exportAttendance222">Export Excel</button>


  <button class="btn btn-warning" id="printDiv">Print</button>


              <div class="row">

              <div class="col-md-4">

{{-- 
          @if($pagination != 'no')

           {{ $data->appends($_GET)->links() }}

           @endif --}}

                  
    
                    @php 

                    $sel1 = '';$sel2 = ''; $sel3 = ''; $sel4 = '';

                    $selected = (@$_GET['filter_data']) ? $_GET['filter_data'] : '';

                    if($selected == 'all') {
                        $sel1 = 'selected';
                     }else if($selected == 'sent'){
                        $sel2 = 'selected';
                     }else if($selected == 'followup'){
                       $sel3 = 'selected'; 
                     }else{
                       $sel4 = 'selected';
                     }

                    @endphp

                  <p>Filter Results - <span style="color:#ff9800;font-size: 18px;">{{@$_GET['filter_data']}}</span></p>

                 @if(@$recordCount) <p>Showing Results : {{@$recordCount}} / out of ({{@$totalRecord}})</p> @endif

                 <select name="priority" id="statusCustomer" class="form-control holdFor">
                        <option value="">--Please Select--</option>
                        <option value="all" {{$sel1}}>All Quotation</option>
                        <option value="sent" {{$sel2}}>Sent Quotation</option>
                        <option value="followup" {{$sel3}}>Follow Up Quotation</option>
                        <option value="approved" {{$sel4}}>Approved Quotation</option>  
                  </select>

               </div>

               <form id="filterForm" action="filter_quotation" method="GET">
                    <input type="hidden" name="filter_data" id="filter_data">
               </form>

            </div> 


{{--    <button class="removeBtnStyle">
   <select data-edit="" data-table="status" class="form-control">  
            <option value="">-- Select --</option>
            <option value="progress">Progress</option>
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>  
   </select>

 </button> --}}


{{-- 
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

           @endif --}}



<div id="tableWrapperDiv">


<table class="table table-boardered" id="examples">
  <thead class="thead-dark">
    <tr>
 <th>Id</th>
{{-- <th>Name</th>
<th>Workflow</th>
<th>Reviewer</th> --}}
<th>Customer Name</th>
<th>Company Name</th>
{{-- <th>Contact Name</th> --}}
<th>Email</th>
<th>Product Description</th>
{{--   <th>Line Number</th> --}}
<th>Address</th>
{{-- <th>Quantity</th>
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
<th>Shipping Method</th> --}}
{{-- <th>Priority</th> --}}
{{-- <th>Local File</th>
<th>Rush</th> --}}
<th>Created At</th>
{{-- <th>Job Completed</th> --}}
<th>Status</th>  
<th></th>  
</tr>
  </thead>

  <tbody>

 @foreach($data as $dat)    

 <tr id="deletetr{{$dat->id}}"> 

	<td class="notIdClass">{{encodeToBase64($dat->customer_id)}}</td>
{{-- 	<td  class="editableDataClass" data-edit="{{$dat->id}}" data-table="name">{{$dat->name}}</td>
	<td  class="editableDataClass" data-edit="{{$dat->id}}" data-table="workflow">{{$dat->workflow}}</td>
	<td  class="editableDataClass" data-edit="{{$dat->id}}" data-table="reviewer">{{$dat->reviewer}}</td> --}}
	<td  class="editableDataClass" data-edit="{{$dat->id}}" data-table="customer_name">{{$dat->contact_name}}</td>
	{{-- <td  class="editableDataClass" data-edit="{{$dat->id}}" data-table="contact_name">{{$dat->contact_name}}</td> --}}
	<td  class="editableDataClass" data-edit="{{$dat->id}}" data-table="company_name">{{$dat->company_name}}</td>
	<td  class="editableDataClass" data-edit="{{$dat->id}}" data-table="email">{{$dat->email}}</td>
	{{-- <td  class="editableDataClass" data-edit="{{$dat->id}}" data-table="line_number">{{$dat->line_number}}</td> --}}
	<td  class="editableDataClass" data-edit="{{$dat->id}}" data-table="product_description">{{$dat->product_description}}</td>
	<td  class="editableDataClass" data-edit="{{$dat->id}}" data-table="address">{{$dat->address}}</td>
{{-- 	<td  class="editableDataClass" data-edit="{{$dat->id}}" data-table="due_date">{{$dat->due_date}}</td>
	<td  class="editableDataClass" data-edit="{{$dat->id}}" data-table="billing_address">{{$dat->billing_address}}</td>
	<td  class="editableDataClass" data-edit="{{$dat->id}}" data-table="shipping_address">{{$dat->shipping_address}}</td>
	<td class="editableDataClass" data-edit="{{$dat->id}}" data-table="installing_address">{{$dat->installing_address}}</td>
	<td  class="editableDataClass" data-edit="{{$dat->id}}" data-table="design">{{$dat->design}}</td>
	<td  class="editableDataClass" data-edit="{{$dat->id}}" data-table="production">{{$dat->production}}</td>
	<td  class="editableDataClass" data-edit="{{$dat->id}}" data-table="shipping">{{$dat->shipping}}</td>
	<td  class="editableDataClass" data-edit="{{$dat->id}}" data-table="install">{{$dat->install}}</td>
	<td  class="editableDataClass" data-edit="{{$dat->id}}" data-table="production_manager">{{$dat->production_manager}}</td>
	<td  class="editableDataClass" data-edit="{{$dat->id}}" data-table="project_manager">{{$dat->project_manager}}</td>
	<td  class="editableDataClass" data-edit="{{$dat->id}}" data-table="sales_representative">{{$dat->sales_representative}}</td>
	<td  class="editableDataClass" data-edit="{{$dat->id}}" data-table="shipping_method">{{$dat->shipping_method}}</td> --}}
	{{-- <td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="priority">{{$dat->priority}}</td> --}}

{{--   <td class="priorityClass">
    
     <select data-edit="{{$dat->id}}" data-table="priority" class="defineWorkflow">
            <option value="">--Select --</option>
            <option value="readyForQuotation">Ready For Quotation</option>
            <option value="holdFor">Hold For</option> 
        </select>

        <br/>

  </td> --}}

{{-- 	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="local_file">{{$dat->local_file}}</td>
	<td data-table="rush">{{$dat->rush}}</td> --}}

	<td data-table="workflow" style="color:#0277bd">{{date('d-m-Y', strtotime($dat->created_at))}}</td>


{{-- 	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="job_completed">{{$dat->job_completed}}</td> --}}
	
{{--   <td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="priority">{{$dat->priority}}</td> --}}

    <td class="statusNotClass">

      <p><span style="color:#ff9800;">Old : </span><strong>{{$dat->status}}</strong></p>        
       <select data-edit="{{$dat->id}}" data-table="status" class="defineWorkflow">  
            <option value="">-- Select --</option>
            <option value="sent">Sent</option>
            <option value="followup">Follow Up</option>
            <option value="approved">Approved</option>
        </select>

    </td>

<td>
 <thead id="alsoDeleteThead{{$dat->id}}" class="thead-dark excludeAction" style="background-color: !important;">
    <div class="row">
       
      <th  style="width: 100% !important">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspEdit Option</th>

      <th colspan="50 ">{{-- <a  href="#" data-edit="{{$dat->id}}" class="btn btn-danger edit-workflow">Workflow</a> --}}


      @php  
         $class= '';
         if($dat->sent_status_date != ''){
            $class = 'statusAlreadySent';
         }
      @endphp

    <a> <form action="{{URL::to('send_customer_status')}}" method="POST">
         {{csrf_field()}}
        <input type="hidden" name="job_id" value="{{$dat->id}}"/>
        <input type="hidden" name="customer_id" value="{{$dat->customer_id}}"/>
        <button class="btn btn-danger send-status {{$class}}" title="Status Sent On - {{$dat->sent_status_date}}">Send Status </button>
     </form></a>
     {{-- <a href="#" class="btn btn-danger  send-quotation">Send Quotation</a> --}}

     <a><form action="{{URL::to('send_customer_quotation')}}" method="POST">
         {{csrf_field()}}
        <input type="hidden" name="job_id" value="{{$dat->id}}"/>
        <input type="hidden" name="customer_id" value="{{$dat->customer_id}}"/>
        <button class="btn btn-danger send-status {{$class}}" title="Status Sent On - {{$dat->sent_status_date}}">Send Quotation</button>
      </form></a>

     <a href="{{URL::to('show_performa_table/'.$dat->customer_id)}}" target="_blank" class="btn btn-danger  send-invoice">Send in Voice</a>
     <a href="#" class="btn btn-danger  delete-customer" data-delete="{{$dat->id}}">Delete</a></th>
   

  </div>
  </thead>
 </td>

	    </tr>

  @endforeach
    
  </tbody>

  <tfoot>

<tr><th>Id</th>
{{-- <th>Name</th>
<th>Workflow</th>
<th>Reviewer</th> --}}
<th>Customer Name</th>
<th>Company Name</th>
{{-- <th>Contact Name</th> --}}
<th>Email</th>
<th>Product Description</th>
{{--   <th>Line Number</th> --}}
<th>Address</th>
{{-- <th>Quantity</th>
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
<th>Shipping Method</th> --}}
{{-- <th>Priority</th> --}}
{{-- <th>Local File</th>
<th>Rush</th> --}}
<th>Created At</th>
{{-- <th>Job Completed</th> --}}
<th>Status</th> 
<th></th>   
 </tr> </tfoot>
</table>


</div>   

@endsection

@section('js')
<script type="text/javascript" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>

<script src="http://akquinet.github.io/jquery-toastmessage-plugin/demo/jquery.toastmessage-min.js"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.12.2/printThis.min.js"></script>

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

            var goUrl = baseUrlMain+'/edit_quotation/'+rowId;   

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

        $('.defineWorkflow').on('change',function(e){

            e.preventDefault();


            if($(this).val() == 'holdFor'){
                
                $('#myModal').modal('toggle');

                //return false;
            }


             console.log($(this).data('table'));
             console.log($(this).data('edit'));
             console.log($(this).val());

            var rowId = $(this).data('edit');

            $('#row_id').val(rowId);

            console.log($(this));

            var tableName = $(this).data('table');

            var baseUrlMain = $('#allTheBaseUrl999987').val();

            var goUrl = baseUrlMain+'/edit_quotation/'+rowId;

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

       $('#holdForDate').on('click',function(e){

            e.preventDefault();

            holdFrom = $('#datetimepicker3').val();

            holdTo = $('#datetimepicker3').val();


            console.log(holdFrom);

            console.log(holdTo);

            var rowId = $('#row_id').val();

            var baseUrlMain = $('#allTheBaseUrl999987').val();

            var goUrl = baseUrlMain+'/hold_from_date/';

             $.ajax({
              url:goUrl,
              type:'POST',
              data:{_token:$('meta[name="csrf-token"]').attr('content'),"hold_from":holdFrom,"hold_to":holdTo,"row_id":rowId},
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

        $('#exportAttendance222').bind('click', function (e) {

            $('#examples').tableExport({ type: 'excel', escape: 'false', bootstrap: true});


              // var t = $('#tableWrapperDiv').clone();

              // t.find('.excludeAction').remove();

              // t.find('.defineWorkflow').remove();

              // t.find('.statusNotClass p span').remove();

              // t.tableExport({ type: 'excel', escape: 'false', bootstrap: true});   
        });

       $('#examples').find('td').not('.priorityClass').not('.notIdClass').not('.statusNotClass').each(function() {
          $(this).click(function() {
          $('#examples td').not($(this)).prop('contenteditable', false);
          $(this).prop('contenteditable', true);
      });
      $(this).blur(function() {
        $(this).prop('contenteditable', false);
      });
    });


    $('#printDiv').click(function(){

      // $("#examples").printThis({
      //     debug: false,               // show the iframe for debugging
      //     importCSS: true,            // import page CSS
      //     importStyle: false,         // import style tags
      //     printContainer: true,       // grab outer container as well as the contents of the selector
      //     loadCSS: "path/to/my.css",  // path to additional css file - use an array [] for multiple
      //     pageTitle: "",              // add title to print page
      //     removeInline: false,        // remove all inline styles from print elements
      //     printDelay: 333,            // variable print delay; depending on complexity a higher value may be necessary
      //     header: null,               // prefix to html
      //     footer: null,               // postfix to html
      //     base: false ,               // preserve the BASE tag, or accept a string for the URL
      //     formValues: true,           // preserve input/form values
      //     canvas: false,              // copy canvas elements (experimental)
      //     doctypeString: "...",       // enter a different doctype for older markup
      //     removeScripts: false,       // remove script tags from print content
      //     copyTagClasses: false       // copy classes from the html & body tag
      // });


          var t = $('#tableWrapperDiv').clone();

          t.find('.excludeAction').remove();

          t.find('.defineWorkflow').remove();

          t.find('.statusNotClass p span').remove();

          t.printThis();   
      }); 


      $('.delete-customer').click(function(){


           var baseUrlMain = $('#allTheBaseUrl999987').val();

            var goUrl = baseUrlMain+'/delete_quotation/';       

            var rowId =  $(this).data('delete');

            //var textData  = $(this).val();//$(this).text();


            var result = confirm("Want to delete?");
            if (!result) {
                //Logic to delete the item

                return false;
            }


            $('tr#deletetr'+rowId).remove();     

            $('#alsoDeleteThead'+rowId).remove();



            console.log(goUrl);

            $.ajax({
              url:goUrl,
              type:'POST',
              data:{_token:$('meta[name="csrf-token"]').attr('content'),"row_id":rowId},
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



       $('#statusCustomer').on('change',function(){
                
                if($(this).val() == ''){
                    return false;     
                 }

             $('#filter_data').val($(this).val());  

             $('#filterForm').submit();


           });



        //   var table = $('#examples').not('.excludeAction').DataTable();
        // $('a.toggle-vis').on('click', function (e) {
        //     e.preventDefault();

        //     var column = table.column($(this).attr('data-column'));
        //     column.visible(!column.visible());
        // });

        // $('#examples tfoot th').each(function () {
        //     var title = $('#examples thead th').eq($(this).index()).text();
        //     $(this).html('<input tyepe="text" placeholder="Search ' + title + '"/>');
        // });
        // table.columns().eq(0).each(function (colIdx) {
        //     $('input', table.column(colIdx).footer()).on('keyup change', function () {
        //         table
        //                 .column(colIdx)
        //                 .search(this.value)
        //                 .draw();
        //     });
        // }); 

    });
  </script>
@endsection
