@extends('main-layout.main')

  @section('css')
         <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
  @endsection

   @section('content')

      <div class="container">

        @if(strtolower(Auth::user()->role) == 'admin') 

            <p>Welcome <span style="color:#ff9800;font-size: 18px;">Admin</span></p>

         @else 
            <h4 style="color:#ff9800;font-size: 18px;">Not Admin</h4>
         @endif

            <div class="row">

              <div class="col-md-4">

                   {{ $data->appends($_GET)->links() }}
    
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

                 <select name="priority" class="form-control holdFor">
                        <option value="">--Please Select--</option>
                        <option value="all" {{$sel3}}>All Customer</option>
                        <option value="readyForQuotation" data-attr="rdq" {{$sel1}}>Ready For Quotation</option>
                        <option value="holdFor" data-attr="hf" {{$sel2}}>Hold For</option>
                  </select>

               </div>

               <form id="filterForm" action="filter_customer" method="GET">
                    <input type="hidden" name="filter_data" id="filter_data">
               </form>

            </div>
      
           <table class="table table-boardered" id="examples">
           	
           	  <thead>
           	  
           	      <tr>
           	      	 <th>Customer Id</th>
           	      	 <th>Customer Name</th>
           	      	 <th>Company Name</th>
           	      	 <th>Action</th>
                     @if(strtolower(Auth::user()->role) == 'admin')
                       <th>Action</th>
                     @endif  
           	      </tr>	

           	  </thead>

           	  <tbody>
	           	  	@foreach($data as $dat)
	           	  	    <tr id="delete{{$dat->id}}">  
	           	  	       <td>{{encodeToBase64($dat->id)}}</td>
	           	  	       <td>{{$dat->contact_name}}</td>
	           	  	       <td>{{$dat->company_name}}</td>
	           	  	       <td><a href="{{URL::to('customer_management/'.$dat->id)}}" class="btn btn-primary">Edit</a></td>
                         @if(strtolower(Auth::user()->role) == 'admin') 
                            <td><button class="btn btn-danger deleteButton" data-id="{{$dat->id}}">Delete</button></td>
                         @endif
	           	  	    </tr>
	                @endforeach
           	  </tbody>

              <tfoot>
                   <th>Customer Id</th>
                   <th>Customer Name</th>
                   <th>Company Name</th>
                   <th style="display: none;">Action</th>
                   @if(strtolower(Auth::user()->role) == 'admin')
                     <th style="display: none;">Action</th>
                   @endif 
              </tfoot>

           </table>	   

      </div>

   @endsection

  @section('js')

     <script type="text/javascript" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>

     <script>
         $(document).ready(function(){
            $('.deleteButton').on('click',function(){
                

             console.log($(this).data('id'));

             var deleteId = $(this).data('id'); 


             var baseUrlMain = $('#allTheBaseUrl999987').val();

             var goUrl = baseUrlMain+'/delete_customer/';

             $.ajax({
                url:goUrl,
                type:'POST',
                data:{_token:$('meta[name="csrf-token"]').attr('content'),customer_id:$(this).data('id')},
                dataType:'json',
                success:function(data){
                    console.log(data);

                    if(!data.error){
                       $('#delete'+deleteId).remove();

                       location.reload();

                    }else{
                      alert('Some Error Occured While Deleting');
                    }
                   
                 }
              });  
            }); 
           $('.holdFor').on('change',function(){
                
                if($(this).val() == ''){
                    return false;     
                 }

               $('#filter_data').val($(this).val());  

               $('#filterForm').submit();


           });


            // datatable software

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