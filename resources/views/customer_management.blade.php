@extends('main-layout.main')

   @section('content')
       
     <div class="container">

     	<form action="{{URL::to('update_customer/'.$data->id)}}" method="POST">

           {{csrf_field()}}


     		   <div id="customerAppendingDiv">

			            <div class="row">
			                <div class="col-md-4 col-sm-12">
			                  <label>Customer Name</label>
							  <input type="text" name="contact_name[]" value="{{$data->contact_name}}" class="form-control">
			               </div>

			               <div class="col-md-4">
			                    <br/>
			               	    <a class="btn btn-primary" id="customerNameField"><span class="lnr lnr-plus-circle"></span></a>
			               </div>
			           </div>



             @if(count($customer_name))

                @php $i1 = 7891; @endphp
            
                @foreach($customer_name as $cs)
                    
                    <div id="customer{{$i1}}" class="row"><div class="col-md-4 col-sm-12">
                            <label>Customer Name</label>
                    <input type="text" name="contact_name[]" value="{{$cs['customer_name']}}" class="form-control">
                         </div>

                         <div class="col-md-4">
                              <br/>
                              <a class="btn btn-danger customerNameField" data-customerid="{{$i1}}"><i class="fa fa-trash-o"></i></a>
                     </div></div>

                     @php $i1++; @endphp
                @endforeach 

              @endif


            </div>

             <hr>


           <div id="contactNumberAppendDiv">

		           <div class="row">
		           	    
		           	    <div class="col-md-4 col-sm-12">
		           	    	<br/>
		                  <label>Contact Number</label>
						  <input type="text" name="phone[]" value="{{$data->phone}}" class="form-control">
		                   
		                   <br>
		               </div>

		               <br/>

		               <div class="col-md-4">
		                    <br/>
		               	    <a class="btn btn-primary" id="contactNameField"><span class="lnr lnr-plus-circle"></span></a>
		               </div>

		           </div>


            @if(count($phone))

                @php $i2 = 2891; @endphp
            
                @foreach($phone as $ph)

                  <div id="contact{{$i2}}" class="row">
                        
                        <div class="col-md-4 col-sm-12">
                          <br/>
                          <label>Contact Number</label>

                       <input type="text" name="phone[]" value="{{$ph['phone']}}" class="form-control">
                           
                           <br>
                       </div>

                       <br/>

                       <div class="col-md-4">
                            <br/>
                            <a class="btn btn-danger contactNameField" data-contactid="{{$i2}}"><i class="fa fa-trash-o"></i></a>
                       </div>

                   </div>

                   @php $i2++; @endphp
                   
                @endforeach 

              @endif



	         </div>

	         <hr/>



	      <div id="emailIdAppendDiv">

		            <div class="row">
		           	    
		           	    <div class="col-md-4 col-sm-12">
		           	    	<br/>
		                  <label>Email</label>
						         <input type="text" name="email[]" value="{{$data->email}}" class="form-control">
		                   
		                   <br>
		               </div>

		               <br/>

		               <div class="col-md-4">
		                    <br/>
		               	    <a class="btn btn-primary" id="emailNameField"><span class="lnr lnr-plus-circle"></span></a>
		               </div>

		           </div>


              @if(count($email))

                  @php $i3 = 891; @endphp
            
                @foreach($email as $em)

                   <div id="emailid{{$i3}}" class="row">
                          
                          <div class="col-md-4 col-sm-12">
                            <br/>
                            <label>Email</label>
                    <input type="text" name="email[]" value="{{$em['email']}}" class="form-control">
                             
                             <br>
                         </div>

                         <br/>

                         <div class="col-md-4">
                              <br/>
                              <a class="btn btn-danger emailNameField" data-emailid="{{$i3}}"><i class="fa fa-trash-o"></i></a>
                         </div>

                     </div>

                     @php $i3++;  @endphp
                   
                @endforeach 

              @endif



	        </div>

	        <hr>

           <div class="row">
           	    <div class="col-md-4">
           	    	<label>Address</label>

           	    	<input type="text" name="combined_address" value="{{$data->street}} {{$data->another_street}} , {{$data->city}} - {{$data->zip}}, {{$data->state}}, {{$data->country}} " class="form-control">
           	    </div>

           	    <div class="col-md-2">
           	    	<label>Priority</label>

           	    	{{-- <input type="text" name="email[]" class="form-control"> --}}
                  @php  $selected1 = '';$selected2 = '';$selected3 = ''; @endphp

                  @if(strtolower($data->priority) == 'low')
                       
                       @php $selected1 = 'selected'; @endphp

                    @elseif(strtolower($data->priority) == 'high')

                       @php $selected2  = 'selected'; @endphp

                    @elseif(strtolower($data->priority) == 'medium')

                     @php $selected3 = 'selected'; @endphp  
                 
                  @endif





           	<select name="combined_address" class="form-control">
								<option value="low" {{$selected1}}>Low</option>
								<option value="medium" {{$selected3}}>Medium</option>
								<option value="high" {{$selected2}}>High</option>
						</select>
           	    </div>
           </div>

             <div class="row">
           	    <div class="col-md-4">
           	    	<label>Product Name</label>

           	    	<input type="text" name="product_name" value="{{$data->product_name}}" class="form-control">
           	    </div>

           	    <div class="col-md-4">
           	    	<label>Product Description</label>

           	    	<input type="text" name="product_description" value="{{$data->product_description}}" class="form-control">
           	    </div>
           </div>

         <div class="row">
         	<div class="col-md-4">

         		<br/>
         		
         		<input type="submit" value="Submit" class="btn btn-primary">
         	</div>
         </div>

        </form>


     </div>

   @endsection

  @section('js')
  <script type="text/javascript">
    $(document).ready(function(){

          var customeriii=1; 

        $('#customerNameField').click(function(){

        	customeriii++;   

            $('#customerAppendingDiv').append(`<div id="customer${customeriii}" class="row"><div class="col-md-4 col-sm-12">
                  <label>Customer Name</label>
				  <input type="text" name="contact_name[]" class="form-control">
               </div>

               <div class="col-md-4">
                    <br/>
               	    <a class="btn btn-danger customerNameField" data-customerid="${customeriii}"><i class="fa fa-trash-o"></i></a>
               </div></div>`);   
     	 	 });


     	   $(document).on('click','.customerNameField',function(){
              
               var button_id = $(this).data("customerid");

               console.log(button_id);

                $('#customer'+button_id+'').remove();   

     	   });

              var contactiiii=1; 

     	   $('#contactNameField').on('click',function(){

     	   	    $('#contactNumberAppendDiv').append(`<div id="contact${contactiiii}" class="row">
		           	    
		           	    <div class="col-md-4 col-sm-12">
		           	    	<br/>
		                  <label>Contact Number</label>
						  <input type="text" name="phone[]" class="form-control">
		                   
		                   <br>
		               </div>

		               <br/>

		               <div class="col-md-4">
		                    <br/>
		               	    <a class="btn btn-danger contactNameField" data-contactid="${contactiiii}"><i class="fa fa-trash-o"></i></a>
		               </div>

		           </div>`);
     	    }); 

     	    $(document).on('click','.contactNameField',function(){
     	    	
     	    	var button_id = $(this).data("contactid");

                 console.log(button_id);

                $('#contact'+button_id+'').remove();  
     	    }); 


     	    var emailiiii = 1;


     	    $('#emailNameField').on('click',function(){

     	    	console.log('clicked');

     	    	emailiiii++;

     	    	$('#emailIdAppendDiv').append(`<div id="emailid${emailiiii}" class="row">
		           	    
		           	    <div class="col-md-4 col-sm-12">
		           	    	<br/>
		                  <label>Email</label>
						  <input type="text" name="email[]" class="form-control">
		                   
		                   <br>
		               </div>

		               <br/>

		               <div class="col-md-4">
		                    <br/>
		               	    <a class="btn btn-danger emailNameField" data-emailid="${emailiiii}"><i class="fa fa-trash-o"></i></a>
		               </div>

		           </div>`);
     	    });  


     	   $(document).on('click','.emailNameField',function(){

     	   	      var button_id = $(this).data("emailid");

                 console.log(button_id);

                $('#emailid'+button_id+'').remove();   
     	   });

     	 });
     </script>
  @endsection