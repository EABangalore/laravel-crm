@extends('main-layout.main')


  @section('css')
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/jquery.datetimepicker.min.css"/>
  @endsection

   @section('content')
       <div class="container">

       	     <div class="row">

  		{{-- 			<div class="col-md-6">
  		                    
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

  		        </div> --}}
	     </div>

    <div class="row">

        <form method="POST" action="{{URL::to('update_performa')}}/{{Request::segment(2)}}" id="create_performa_invoice">

        	{{csrf_field()}}

            <div class="col-md-5">
              	<label>Invoice Number#</label>
                <input type="text" name="invoice_number" value="{{$data->invoice_number}}" class="form-control" placeholder="text field">
                <br/>
            </div>

          </div>

         
        <div class="row">

          <div class="col-md-5">

          	<input type="hidden" name="customer_id" value="{{$data->customer_id}}" class="form-control" placeholder="text field">
             

       <label>Company Name</label>

	   	<select name="company_name"  class="form-control selectpicker" data-live-search="true">
	     {{--   <option value="Enigma Brand Solutions Pvt Ltd">Enigma Brand Solutions Pvt Ltd</option>
	       <option value="Dolphin Systems">Dolphin Systems</option>
	       <option value="Hms">Hms</option> --}}

         <option value="{{$data->company_name}}" selected>{{$data->company_name}}</option>
       
          @foreach($companyNotSelected as $comp)
               <option value="{{$comp}}">{{$comp}}</option>
          @endforeach

			</select>
		
		  </div>

		  <div class="col-md-5">
		  	<label>Invoice Date</label>
  				<div class="form-group">

                <div class='input-group date' >
                    
                    <input type='text' name="invoice_date" value="{{$data->invoice_date}}" class="form-control" id="datetimepicker1"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>

		  </div>  
        
       </div> <!-- end of row -->

      <div class="row">

       <div class="col-md-2-offset col-md-5"> 
          <label>Buyer</label>
           <textarea class="form-control" name="buyer" placeholder="textarea" rows="4">
              {{$data->buyer}}
           </textarea>
           <br/>
       </div>

       <div class="col-md-5">
       	    <label>Delivery Note</label>
          <input type="text" name="delivery_note" value="{{$data->delivery_note}}" class="form-control" placeholder="text field">
       </div>
     </div><!-- end of row --> 

     <div class="row">
       

       <h4>Mode Of Payment</h4>

       <br/>   
          
         <div class="col-md-2">
         	 <br/>
              <label class="fancy-radio">
                  <input name="transaction"  value="Cash" type="radio">
                  <span><i></i>Cash</span>
                </label>
          </div>
          <div class="col-md-2">
          	 <br/>
                <label class="fancy-radio">
                  <input name="transaction" value="Account" type="radio">
                  <span><i></i>Account</span>
               </label>
          </div>

        <div class="col-md-5">
		  	<label>Delivery Note Date</label>
  				<div class="form-group">

                <div class='input-group date' >
                    
                    <input type='text' name="delivery_note_date" value="{{$data->delivery_note_date}}" class="form-control" id="datetimepicker2"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>

		  </div> 
     </div><!-- end of row -->

     <div class="row">
     
        <div class="col-md-5">

         <label>Dispatched Through</label>
        	
         <select name="dispatched_through" class="form-control selectpicker" data-live-search="true">
	          <option value="{{$data->dispatched_through}}" selected>{{$data->dispatched_through}}</option>

           @foreach($dispatchedNotSelected as $disp)
              <option value="{{$disp}}">{{$disp}}</option>
           @endforeach

		  </select>

        </div>	

        <div class="col-md-5">
          <label>Destination</label>   
          <textarea class="form-control" name="destination" placeholder="textarea" rows="4">{{$data->destination}}</textarea>
        </div>

     </div>

     <div class="row">
     	 <div class="col-md-5-offset col-md-5">
     	 	<input type="submit" value="Save" id="submitBtn" class="btn btn-success">
     	 </div>
     </div>

    </form>

   </div>
 @endsection

   @section('js')
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js"></script>

       <script type="text/javascript">
       	
       	    $(function(){

       	      $('#datetimepicker1,#datetimepicker2').datetimepicker({'minDate':0});


       	      $('#submitBtn').click(function(e){     
 
                    e.preventDefault();

                  if($('#customer_id_first').val() != ''){

                         $('#create_performa_invoice').submit();
                   }else{

                   	  alert('Please Enter A Customer Id');
                   }
       	      });

    $('input:radio[name="transaction"][value="{{$data->transaction}}"]') 
    .attr('checked', 'checked');

       	    });

       </script>
  @endsection