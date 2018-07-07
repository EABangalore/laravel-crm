@extends('main-layout.main')

  @section('css')
          <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
  @endsection

  @section('js')
     <script type="text/javascript" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>

     <script type="text/javascript" src="{!! asset('/js/Contents/tableExport.js') !!}"></script>
     <script type="text/javascript" src="{!! asset('/js/Contents/jquery.base64.js') !!}"></script>


      <script>
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

	       $('#exportAttendance222').bind('click', function (e) {

	            $('#examples').tableExport({ type: 'excel', escape: 'false', bootstrap: true});
	        });  
       });
     </script>
  @endsection
   
   @section('content')
      
      <div class="row">

      	  <button class="btn btn-primary" id="exportAttendance222">Export Excel</button>

		 	  <table id="examples" class="table table-bordered showSupplierProcuredItem">
		 	  	  <thead>
		 	  	  	  <tr>
		 	  	  	  	  <th>all_suppliers</th>
		 	  	  	  	  <th>supplier_address</th>
		 	  	  	  	  <th>contact_person</th>
		 	  	  	  	  <th>contact_number</th>
		 	  	  	  	  <th>note</th>
		 	  	  	  	  <th>Edit</th>
                  @if(strtolower(Auth::user()->role) == 'admin')
		 	  	  	  	  <th>Delete</th>
                  @endif
		 	  	  	  </tr>
		 	  	  </thead>
		 	  	  <tbody>
                     @foreach($data as $dat)
                        <tr>
                        	<td>{{$dat->supplier_name}}</td>
                        	<td>{{$dat->supplier_address}}</td>
                        	<td>{{$dat->contact_person}}</td>
                        	<td>{{$dat->contact_number}}</td>
                        	<td>{{$dat->note}}</td>
                        	<td><a href="{{URL::to('show_all_supplier_edit/'.$dat->id)}}" class="btn btn-primary">Edit</a></td>

                      @if(strtolower(Auth::user()->role) == 'admin')

                        	<td><a href="{{URL::to('show_all_supplier_delete/'.$dat->id)}}" class="btn btn-danger">Delete</a></td>

                      @endif

                        </tr>
                     @endforeach
		 	  	 </tbody>
		 	  	 <tfoot>
		 	  	 	  	  <th>all_suppliers</th>
		 	  	  	  	  <th>supplier_address</th>
		 	  	  	  	  <th>contact_person</th>
		 	  	  	  	  <th>contact_number</th>
		 	  	  	  	  <th>note</th>
		 	  	  	  	  <th style="display: none;"></th>
		 	  	  	  	  <th style="display: none;"></th>
		 	  	 </tfoot>
		 	  </table>

      </div>
   @endsection