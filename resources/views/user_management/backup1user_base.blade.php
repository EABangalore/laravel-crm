@extends('main-layout.main')

  @section('css')
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
  @endsection

  @section('content')

  <div class="container">

  	   <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>  

      <div class="row">
      	
      	    {{$data->links()}}


	        	 @if(strtolower(Auth::user()->role) == 'admin')
	        		   Admin
	             @endif   
      	 
           <table class="table table-bordered" id="examples">
	        	<thead>
	        		<th>User Name</th> 
	        		<th>Email - ID</th>
	        		<th>Role</th>
	        		{{-- <th>Edit</th> --}} 

	        	 @if(strtolower(Auth::user()->role) == 'admin')
	        		<th>Delete</th> 
	        	  @endif
	        	</thead>

	        	<tbody>
	        	  @foreach($data as $dat)
                      
                      @php 

                      $role = $dat->role; 

                       $sel1 = ''; $sel2 = ''; $r1 = '';  $r2 = '';

                      if($role == 'admin'){
                          $sel1 = 'selected';
                          $r1 = 'Admin';
                       }else{
                          $sel2 = 'selected';
                          $r2 = 'Employee';
                       }

                      @endphp

                     <tr id="{{$dat->id}}"> 
                     	 <td class="nameClass" data-customerid="{{$dat->id}}" data-column="name">{{$dat->name}}</td>
                     	 <td class="emailClass" data-customerid="{{$dat->id}}" data-column="email">{{$dat->email}}</td>
                    
                     <td>
                     	<select name="priority" class="form-control holdFor">
                             <option value="">--Please Select--</option>
                             <option value="admin" {{$sel1}} data-id="{{$dat->id}}" title="Present Role Is {{$r1}}">Admin</option>
                             <option value="emp" {{$sel2}} data-id="{{$dat->id}}" title="Present Role Is {{$r2}}"> Employee</option>
                       </select>
                    </td>
                         {{-- <td><a href="#" class="btn btn-success editButton" data-edit="{{$dat->id}}">Edit</a></td> --}}

                       @if(strtolower(Auth::user()->role) == 'admin')
                         <td><a href="#" class="btn btn-danger deleteButton" data-delete="{{$dat->id}}">Delete</a></td>
                        @endif
                     </tr>
	        	  @endforeach 
	           </tbody>

	           <tfoot>
	        		<th>User Name</th> 
	        		<th>Email - ID</th>
	        		<th>Role</th>
	  {{--       		<th style="display: none"></th>  --}}
	        		<th style="display: none"></th> 
	           </tfoot>
	        </table>

      </div>


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>

        <div class="modal-body">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{URL::to('register')}}">  
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="col-md-6">
                         
                           <select name="role" class="form-control">
                                 <option value="">--Please Select--</option>
                                 <option value="admin">Admin</option>
                                 <option value="emp"> Employee</option>
                           </select> 

                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>  <!-- end of modal -->

     </div>
  @endsection

  @section('js')
         <script type="text/javascript" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>


       <script type="text/javascript">
       	
       	    $(function(){


   //    $('#examples').find('td').not('.holdFor').each(function() {
			// 	  $(this).click(function() {
			// 	    $('#examples').not($(this)).prop('contenteditable', false);
			// 	    $(this).prop('contenteditable', true);
			// 	    $(this).prop('contenteditable', true); 
			// 	  });
			// 	  $(this).blur(function() {
			// 	    $(this).prop('contenteditable', false);
			// 	  });

   //       console.log($(this));
			// });


       	       $('.nameClass,.emailClass').blur(function(){

       	       	 var userId = $(this).data('customerid');

       	       	 var columnName = $(this).data('column');

       	       	 var textData =  $(this).text();


	       	     var baseUrlMain = $('#allTheBaseUrl999987').val();

		         var goUrl = baseUrlMain+'/user_edit/';   

		             $.ajax({
		                url:goUrl,
		                type:'POST',
		                data:{_token:$('meta[name="csrf-token"]').attr('content'),user_id:userId,column:columnName,data:textData},
		                dataType:'json',
		                success:function(data){
		                    console.log(data);

		                    if(!data.error){
		                       //$('#delete'+deleteId).remove();

		                       alert('success');

		                       //location.reload();

		                    }else{
		                      alert('Some Error Occured While Deleting');
		                    }
		                   
		                 }
		              });  

       	       	  
       	       });


       	      $('.deleteButton').on('click',function(){

       	      	 var userId = $(this).data('delete');  

       	      	 var baseUrlMain = $('#allTheBaseUrl999987').val();

		         var goUrl = baseUrlMain+'/user_delete/';   

		         $.ajax({
		              url:goUrl,
		              type:'POST',
		              data:{_token:$('meta[name="csrf-token"]').attr('content'),user_id:userId},
		              dataType:'json',
		                success:function(data){
		                    console.log(data);

		                    if(!data.error){
		                       
		                       $('#'+userId).remove();

		                       alert('success');

		                       //location.reload();

		                    }else{
		                      alert('Some Error Occured While Deleting');
		                    }
		                   
		                 }
		              });  
       	      });

       	      $('.holdFor').on('change',function(){ 
              
                 var role = $(this).val();

                 var userId = $(this).find(':selected').data('id');


                 var baseUrlMain = $('#allTheBaseUrl999987').val();

		         var goUrl = baseUrlMain+'/user_role/';   

		         $.ajax({
		              url:goUrl,
		              type:'POST',
		              data:{_token:$('meta[name="csrf-token"]').attr('content'),user_id:userId,role:role},
		              dataType:'json',
		                success:function(data){
		                    console.log(data);

		                    if(!data.error){
		                       //$('#delete'+deleteId).remove();

		                       alert('success');

		                       //location.reload();

		                    }else{
		                      alert('Some Error Occured While Deleting');
		                    }
		                   
		                 }
		              }); 

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