@extends('main-layout.main')


  {{-- js section code --}}

    @section('css') 


    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">

   <link rel="stylesheet" href="http://akquinet.github.io/jquery-toastmessage-plugin/demo/css/jquery.toastmessage-min.css">

   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/jquery.datetimepicker.min.css"/>

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
	  </style>

     @endsection

  {{-- js section code --}}

   @section('content')  
{{-- 
    {{ $data->links() }} <br><br> --}}


        <div class="row">

            <div class="col-md-2">
                <button class="btn btn-primary" id="exportExcel">Export</button>
            </div>


            <div class="col-md-2">
                <button class="btn btn-warning" id="printDiv">Print</button>
            </div>


          @if($pagination)

              <div class="col-md-2">
                   {{ $data->appends($_GET)->links() }}    
              </div>
          @endif

              <div class="col-md-2">
    
                    @php 

                    $sel1 = '';$sel2 = ''; $sel3 = '';

                    $selected = (@$_GET['filter_data']) ? $_GET['filter_data'] : '';

                    if($selected == 'readyForQuotation') {
                        $sel1 = 'selected';
                     }else if($selected == 'holdFor'){
                        $sel2 = 'selected';
                     }else{
                       $sel3 = 'selected'; 
                     }

                    @endphp

                  <p>Filter Results - <span style="color:#ff9800;font-size: 18px;">{{@$_GET['filter_data']}}</span></p>

                 <select name="priority" class="form-control holdForFilter">
                        <option value="">--Please Select--</option>
                        <option value="all" {{$sel3}}>All Customer</option>
                        <option value="readyForQuotation" data-attr="rdq" {{$sel1}}>Ready For Quotation</option>
                        <option value="holdFor" data-attr="hf" {{$sel2}}>Hold For</option>
                    </select>

                    <br/>

               </div>

               <form id="filterForm" action="customer_filter_all" method="GET">
                    <input type="hidden" name="filter_data" id="filter_data">
               </form>  

            </div>



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
             
               <input type="hidden" id="row_id">


{{--                <input type="text" id="customerNameModal"> --}}

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


<table class="table table-boardered" id="examples" >

  <thead class="thead-dark firstRemove">
    <tr>
        <th>Id</th>
        <th>company_name</th>
        <th>Customer Name</th>
        <th>Email</th>
        <th>Refered By</th>
        <th id="Priority2344">Priority</th>
        <th>Phone</th>
        <th>product_name</th>
        <th>product_description</th>
        <th>Lead</th>
{{--         <th>Address</th> --}}
   </tr>
  </thead>
  <tbody>



 @foreach($data as $dat)

   <tr> 

	<td>{{encodeToBase64($dat->id)}}</td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="company_name">{{$dat->company_name}}</td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="contact_name">{{$dat->contact_name}}</td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="email">{{$dat->email}}</td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="refrer_name">{{$dat->refrer_name}}</td>
  {{-- <td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="priority">{{$dat->priority}}</td> --}}

  <td>


   <p>Original:<span style="color:#ff9800;">{{$dat->priority}}</span></p>

    @if($dat->priority != 'readyForQuotation')
    <p>From : <strong>{{date('d-m-Y', strtotime($dat->hold_from))}}</strong> To : <strong>   {{date('d-m-Y', strtotime($dat->hold_to))}}</strong></p>
    @endif

  <select data-edit="{{$dat->id}}" data-table="priority" class="defineWorkflow">
            <option value="">--Select --</option>
            <option value="readyForQuotation">Ready For Quotation</option>
            <option value="holdFor">Hold For</option> 
        </select>

    </td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="phone">{{$dat->phone}}</td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="product_name">{{$dat->product_name}}</td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="product_description">{{$dat->product_description}}</td>
	<td contenteditable class="editableDataClass" data-edit="{{$dat->id}}" data-table="lead">{{$dat->lead}}</td>

{{--   <td class="editableDataClass">{{$dat->street}}  {{$dat->another_street}} {{$dat->city}} {{$dat->state}} {{$dat->zip}} , {{$dat->country}}</td>   --}}

<thead class="thead-dark bottomRemove excludeAction" style="background-color: !important;">
    <div class="row">
       
      <th  style="width: 100% !important">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspEdit Option</th>

      <th colspan="50 ">{{-- <a  href="#" data-edit="{{$dat->id}}" class="btn btn-danger edit-workflow">Workflow</a> --}}
     <a href="#" class="btn btn-danger send-status">Send Status </a>
     <a href="#" class="btn btn-danger  send-quotation">Send Quotation</a>
    <a href="#" class="btn btn-danger  send-invoice">Send in Voice</a>
    

    @if(strtolower(Auth::user()->role) == 'admin')
     
         <a href="#" class="btn btn-danger  delete-customer">Delete</a></th>

     @endif
   

  </div>
  </thead>

   

	 

  @endforeach



    
  </tbody>
</table>

@endsection

@section('js')
<script type="text/javascript" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>

<script src="http://akquinet.github.io/jquery-toastmessage-plugin/demo/jquery.toastmessage-min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js"></script>

<script type="text/javascript" src="{!! asset('/js/Contents/tableExport.js') !!}"></script>
<script type="text/javascript" src="{!! asset('/js/Contents/jquery.base64.js') !!}"></script>


 <script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.12.2/printThis.min.js"></script>


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

            var goUrl = baseUrlMain+'/edit_customer/'+rowId;

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
       

      $('.defineWorkflow').on('change',function(e){

            e.preventDefault();


            if($(this).val() == 'holdFor'){
                
                $('#myModal').modal('toggle');

                //return false;
            }


            console.log($(this).closest('tr'));


             console.log($(this).data('table'));
             console.log($(this).data('edit'));
             console.log($(this).val());

            var rowId = $(this).data('edit');

            $('#row_id').val(rowId);

            console.log($(this));

            var tableName = $(this).data('table');

            var baseUrlMain = $('#allTheBaseUrl999987').val();

            var goUrl = baseUrlMain+'/edit_customer/'+rowId;

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

            holdTo = $('#datetimepicker4').val();


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

        $('.holdForFilter').on('change',function(){
                
                if($(this).val() == ''){
                    return false;     
                 }

               $('#filter_data').val($(this).val());  

               $('#filterForm').submit();


           });

      $('#exportExcel').on('click',function(){


            $('#examples').tableExport({ type: 'excel', escape: 'false', bootstrap: true});
      

        });

   //print the table

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
      //   });


          h = $('#examples').clone();

          h.addClass('table table-boardered');  

          h.find('.excludeAction').remove();

          h.find('.defineWorkflow').remove();

          h.printThis();

      });


      $('#datetimepicker3,#datetimepicker4').datetimepicker({'minDate':0});


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
