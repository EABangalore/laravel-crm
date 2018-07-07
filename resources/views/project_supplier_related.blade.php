@extends('main-layout.main')


@section('css')

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
   
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


@section('content')

  <button class="btn btn-primary" id="exportAttendance222">Export Excel</button>

 <a class="btn btn-warning" href="{{URL::to('show_all_supplier_data')}}" target="_blank">Edit / Delete</a> 

<table class="table table-boardered" id="examples" >

  <thead class="thead-dark firstRemove">
    <tr>
        <th>Id</th>
        <th>company_name</th>
        <th>Project Name</th>
        <th>Customer Name</th>
        <th>Supplier Name</th>
        <th>Concerned Supplier</th>
        <th>Note</th>      
        <th>Supplier Address</th>
        <th>Supplied From</th>
        <th>Supplied Till</th>
   </tr>
  </thead>
  <tbody>



 @foreach($data as $dat)

   <tr> 

	<td>{{encodeToBase64($dat->customer_id)}}</td>
	<td>{{$dat->company_name}}</td>

  <td>{{$dat->project_name}}</td>

	<td>{{$dat->contact_name}}</td>
	<td>{{$dat->supplier_name}}</td>
	<td>{{$dat->contact_person}}</td>

	<td>{{$dat->note}}</td>
	<td>{{$dat->supplier_address}}</td>


  <td>{{@date('d-m-Y',strtotime($dat->from_date))}}</td>
  <td>{{@date('d-m-Y', strtotime($dat->to_date))}}</td>


{{-- <thead class="thead-dark bottomRemove" style="background-color: !important;">
    <div class="row">
       
      <th  style="width: 100% !important">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspEdit Option</th>

      <th colspan="50 "><a  href="#" data-edit="{{$dat->id}}" class="btn btn-danger edit-workflow">Workflow</a>
     <a href="#" class="btn btn-danger send-status">Send Status </a>
     <a href="#" class="btn btn-danger  send-quotation">Send Quotation</a>
    <a href="#" class="btn btn-danger  send-invoice">Send in Voice</a>
 <a href="#" class="btn btn-danger  delete-customer">Delete</a></th>
   

  </div>
  </thead> --}}

</tr>

  @endforeach



    
  </tbody>
</table>

@endsection


@section('js')

<script type="text/javascript" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="{!! asset('/js/Contents/tableExport.js') !!}"></script>
<script type="text/javascript" src="{!! asset('/js/Contents/jquery.base64.js') !!}"></script>

  <script type="text/javascript">
     $(function(){

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