@extends('main-layout.main')

  @section('css')
         <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
  @endsection


   @section('content')
      <div class="row">

         <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Create Product</button>  

          {{$data->links()}}
      	 
           <table class="table table-bordered" id="examples">
	        	<thead>
	        		<th>Product Name</th> 
	        		<th>Price</th>
	        		<th>Product Description</th>
	        		<th></th>
	        	    @if(strtolower(Auth::user()->role) == 'admin')
	        		   <th></th>
	        		@endif   
	        	</thead>

	        	<tbody>
	        	  @foreach($data as $dat)
                     <tr id="{{$dat->id}}">
                     	 <td class="product_name">{{$dat->product_name}}</td>
                     	 <td class="price">{{$dat->price}}</td>
                     	 <td class="project_description">{{$dat->project_description}}</td>
                         <td><a href="#" class="btn btn-success editButton" data-edit="{{$dat->id}}">Edit</a></td>

                       @if(strtolower(Auth::user()->role) == 'admin')
                         <td><a href="#" class="btn btn-danger deleteButton" data-delete="{{$dat->id}}">Delete</a></td>
                        @endif
                     </tr>
	        	  @endforeach 
	           </tbody>

	           <tfoot>
	        		<th>Product Name</th> 
	        		<th>Price</th>
	        		<th>Product Description</th>
	        		<th style="display: none;"></th>
	        		 @if(strtolower(Auth::user()->role) == 'admin')
	        		   <th style="display: none;"></th>
	        		 @endif
	           </tfoot>
	        </table>


	       <!-- Modal -->
			  <div class="modal fade" id="myModal" role="dialog">
			    <div class="modal-dialog">
			    
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title">Create Product</h4>
			        </div>
			        <div class="modal-body">
			          
                   <div class="row">


                   <div id="insertProductSuccess">


				   </div>


                     <form id="firstForm" action="" method="POST">
                   
			        	 <div class="col-md-8">
			        	 	 <label>Product Name</label>
			        	 	 <input type="text"  name="product_name" class="form-control">
			        	 </div>

			        	<div class="col-md-4">
			        	 	 <label>Price</label>  
			        	 	 <input type="number" name="price" class="form-control">

			        	 	 <br/>
			        	 </div>

		           </div>


		          <div class="row">
                   
			          <div class="col-md-8">
			        	 <label>Product Description</label>

			        	<textarea name="project_description" class="form-control"></textarea>
	
			        	 </div>
                      <br><br>
			         <div class="col-md-4">
                          <a href="#" id="createProduct" class="btn btn-primary">Submit</a>
			          </div>

			        </form>  

		          </div>

			        </div>
			        <div class="modal-footer">
			          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        </div>
			      </div>
			      
			    </div>
			  </div>  <!-- endof modal -->



			 <!-- edit modal code  -->


			  <!-- Modal -->
			  <div class="modal fade" id="myModal22" role="dialog">
			    <div class="modal-dialog">
			    
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title">Create Product</h4>
			        </div>
			        <div class="modal-body">
			          
                   <div class="row">


                  <div id="editProductSuccess">


				   </div>

                     <form id="editForm" action="" method="POST">

                     	<input type="hidden" name="product_id" id="product_id"/>
                   
			        	 <div class="col-md-8">
			        	 	 <label>Product Name</label>
			        	 	 <input type="text"  name="product_name" class="form-control product_name">
			        	 </div>

			        	<div class="col-md-4">
			        	 	 <label>Price</label>  
			        	 	 <input type="number" name="price" class="form-control price">

			        	 	 <br/>
			        	 </div>

		           </div>


		          <div class="row">
                   
			          <div class="col-md-8">
			        	 <label>Product Description</label>

			        	<textarea name="project_description" class="form-control project_description"></textarea>
	
			        	 </div>
                      <br><br>
			         <div class="col-md-4">
                          <a href="#" id="createProductEdit" class="btn btn-primary">Submit</a>
			          </div>

			        </form>  

		          </div>

			        </div>
			        <div class="modal-footer">
			          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        </div>
			      </div>
			      
			    </div>
			  </div>  <!-- endof modal -->


      </div>
   @endsection


  @section('js')


   <script type="text/javascript" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
  	 
     <script type="text/javascript">

          function showCommonSuccessMessage(divId){         

			      $('#'+divId).html(`<div class="alert alert-success alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								  <i class="fa fa-check-circle"></i> Product Has Been Created Successfully
							      </div>`);

			    return true;

          }


          function showCommonWarningMeaasge(divId){

               $('#'+divId).html(`<div class="alert alert-danger alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								  <i class="fa fa-check-circle"></i> Unable to create the product
							      </div>`);
          }


     	   $(document).ready(function(){

		      $.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});
               $('#createProduct').on('click',function(){
               	   //console.log($('form').serialize());

               	    var baseUrlMain = $('#allTheBaseUrl999987').val();

		            var goUrl = baseUrlMain+'/product_crud/';

		            $.ajax({
		            	url:goUrl,
		            	type:'POST',
		            	data:$('form#firstForm').serialize(),
		            	dataType:'json',
		            	success:function(data){
		            		console.log(data);

			            if(!data.error){
                           
                             showCommonSuccessMessage('insertProductSuccess');

			            	}else{

                               showCommonWarningMeaasge('insertProductSuccess');
			            	}

                    	},
		            	error:function(data){
		            		console.log(data);
		            		alert('error occured here');
		            	}
		            });
               });


               // datatable code below 


            $('.editButton').on('click',function(e){

              	 e.preventDefault();
                
                  var id = $(this).data('edit');

                   var col = $('#'+id);
                    
                 var price = $(col).find('.price').text();

                 var product_name = $(col).find('.product_name').text();

                 var project_description = $(col).find('.project_description').text();


                 $('#myModal22').find('.price').val(price);

                 $('#myModal22').find('.product_name').val(product_name);
        
                 $('#myModal22').find('.project_description').val(project_description);

                 $('#product_id').val(id);
                 
                 $('#myModal22').modal('show'); 

              });


                $('#createProductEdit').on('click',function(){
               	   //console.log($('form').serialize());

               	    var baseUrlMain = $('#allTheBaseUrl999987').val();

		            var goUrl = baseUrlMain+'/product_update/';

		            $.ajax({
		            	url:goUrl,
		            	type:'POST',
		            	data:$('form#editForm').serialize(),
		            	dataType:'json',
		            	success:function(data){
		            		console.log(data);

		            	    if(!data.error){
                               showCommonSuccessMessage('editProductSuccess');
		            	    }else{
		            	    	showCommonWarningMeaasge('editProductSuccess');
		            	    }

                    	},
		            	error:function(data){
		            		console.log(data);
		            		alert('error occured here');
		            	}
		            });
               });


           $('.deleteButton').on('click',function(e){

	             e.preventDefault();

	             var id = $(this).data('delete');  

	             $('#'+id).remove();  


	               var baseUrlMain = $('#allTheBaseUrl999987').val();

		            var goUrl = baseUrlMain+'/product_delete/';

		            $.ajax({
		            	url:goUrl,
		            	type:'POST',
		            	data:{product_id:id},
		            	dataType:'json',
		            	success:function(data){
		            		console.log(data);

		            	    if(!data.error){
                               showCommonSuccessMessage('editProductSuccess');
		            	    }else{
		            	    	showCommonWarningMeaasge('editProductSuccess');
		            	    }

                    	},
		            	error:function(data){
		            		console.log(data);
		            		alert('error occured here');
		            	}
		            }); 
              
           }); 


             // datatable software

              var table = $('#examples').DataTable({"pageLength": 300});
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