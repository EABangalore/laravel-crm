@extends('main-layout.main')

  @section('css')
         <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
  @endsection

  @section('js')
     <script type="text/javascript" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="{!! asset('/js/Contents/tableExport.js') !!}"></script>
     <script type="text/javascript" src="{!! asset('/js/Contents/jquery.base64.js') !!}"></script>

   <script type="text/javascript">
  	 

  $(document).ready(function () { 


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


      var table = $('#examples').DataTable({
                    "iDisplayLength": 300,
                    "aLengthMenu": [[50, 100, 200, 250, 300, -1], [50, 100, 200, 250, 300, "All"]]
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

   @section('content')
       
      <div class="row">

      	   {{ $data->links() }} 


         <button class="btn btn-primary" id="exportAttendance222">Export Excel</button>

      	  
	       <table class="table table-bordered" id="examples">
	        	<thead>
	        		<th>Customer Id</th>
	        		<th>Company Name</th> 
	        		<th>Phone Number</th>
	        		<th>Product Description</th> 
	        		<th>Total Amount</th> 
              <th>Paid Amount</th>
              <th>Balance Amount</th>
              <th>Action</th>
	        	</thead>

	        	<tbody>
	        	  @foreach($data as $dat)
                     <tr>
                     	 <td>{{encodeToBase64($dat->customer_id)}}</td>
                     	 <td>{{$dat->company_name}}</td>
                     	 <td>{{$dat->phone}}</td>
                     	 <td>{{$dat->product_description}}</td>
                     	 <td>{{$dat->total_amount}}  gst<span style="color:orange;padding-right: 4px;">{{$dat->gst_percentage}} </span>%</td>
                       <td>{{$dat->total_recieved_amount}}</td>
                       <td>{{$dat->total_balance}}</td>

                      <td class="statusNotClass">

                              <p><span style="color:#ff9800;">Old : </span><strong>{{$dat->status}}</strong></p>        
                               <select data-edit="{{$dat->id}}" data-table="status" class="defineWorkflow">  
                                    <option value="">-- Select --</option>
                                    <option value="sent">Sent</option>
                                    <option value="followup">Follow Up</option>
                                    <option value="approved">Approved</option>
                                </select>

                         </td>
                    </tr>
	        	  @endforeach 
	           </tbody>

	           <tfoot>
              <th>Customer Id</th>
              <th>Company Name</th> 
              <th>Phone Number</th>
              <th>Product Description</th> 
              <th>Total Amount</th> 
              <th>Paid Amount</th>
              <th>Balance Amount</th>
              <th style="display: none;"></th>
	           </tfoot>
	        </table>

      </div>

   @endsection