@extends('main-layout.main')

  @section('css')
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.css">
  @endsection

  @section('content')
    
    <div class="row">

    	<div class="col-md-6">

    		    <label>Company Name</label>
    
		    <select id="customer_id" name="customer_id" class="form-control selectpicker" data-live-search="true"">

			    @foreach($data as $dat)

				  <option  value="{{$dat->id}}" title="user email - {{$dat->email}}">{{$dat->company_name}}</option>

				@endforeach

		     </select>

       </div>

       <div class="col-md-6">
             
             <label>All Projects/ Project Name</label> 


            <select id="allTheProjects" name="customer_id" class="form-control selectpicker" data-live-search="true">

{{-- 			    @foreach($data as $dat)

				  <option  value="{{$dat->id}}" title="user email - {{$dat->email}}">{{$dat->company_name}}</option>

				@endforeach --}}

		     </select>      	 

       </div>

   </div>

  @endsection


 @section('js')
       <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.js"></script>

       <script type="text/javascript">
       	
       	   $(document).ready(function(){


	       	   	$('#customer_id').change(function(){   
                
		               var baseUrlMain = $('#allTheBaseUrl999987').val();

		               var goUrl = baseUrlMain+'/get_all_related_job/';    

		               var customer_id22 = $('#customer_id').val();

		              // console.log(customer_id22);

		             		   $.ajax({
						    	url:goUrl,
						    	type:'POST',
						    	data:{_token:$('meta[name="csrf-token"]').attr('content'),customer_id:customer_id22},
						    	dataType:'json',
						    	success:function(data){

						    		$('#allTheProjects').html('');

						    		var option = '';

						    		console.log(data);

						    		$.each(data.data,function(i,v){
                                       
                                        console.log(v.project_name);

                                        option += '<option value="'+v.id+'">'+v.project_name+'</option>';

						    		});

						    		$('#allTheProjects').append(option);

						    		$('#allTheProjects').selectpicker('refresh');

						    		//$('#po_number436643').val(data.encoded);

						        }

				    		 });

	       	   	});


	       	   $(document).on('change','#allTheProjects',function(){

	       	   	   console.log($(this).val());   
	       	   });

       	   });

       </script>
@endsection