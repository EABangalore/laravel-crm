@extends('main-layout.main')


  @section('css')
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/jquery.datetimepicker.min.css"/>
  @endsection

   @section('content')
       <div class="container">

       	     <div class="row">

					<div class="col-md-6">
		                    
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

		        </div>
	     </div>

           <div class="row">

           	<form method="GET" action="">

	  		  <div class="col-md-3">
              	<label>Customer Id</label>
                <input type="text" name="customer_id" id="customer_id_first" value="{{encodeToBase64(@$data[0]->id)}}" class="form-control" placeholder="text field">
                <br/>
            </div>

            <div class="col-md-2">
            	<br/>
            	<input type="submit" class="btn btn-primary" value="Search"/>
            </div> 

          </form>


        <form method="POST" action="{{URL::to('create_performa_invoice')}}" id="create_performa_invoice">

        	{{csrf_field()}}

            <div class="col-md-5">
              	<label>Invoice Number#</label>
                <input type="text" name="invoice_number" value="{{$invoiceNumber}}" class="form-control" placeholder="text field">
                <br/>
            </div>

          </div>

         
        <div class="row">

          <div class="col-md-5">

          	<input type="hidden" name="customer_id" value="{{@$data[0]->id}}" class="form-control" placeholder="text field">
             

             <label>Company Name</label>

	       	<select name="company_name" class="form-control selectpicker" data-live-search="true">

                @foreach($companies as $comp)
                     <option value="{{$comp->company_name}}" data-companyaddress="{{$comp->address}}" data-companyemail="{{$comp->email}}" data-gstin="{{$comp->gstin_uin}}">{{$comp->company_name}}</option>
                @endforeach
			</select>
		
		  </div>

		  <div class="col-md-5">
		  	<label>Invoice Date</label>
  				<div class="form-group">

                <div class='input-group date' >
                    
                    <input type='text' name="invoice_date" class="form-control" id="datetimepicker1"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>

		  </div>  
        
       </div> <!-- end of row -->

      <div class="row">

       <div class="col-md-2-offset col-md-4"> 
          <label>Buyer</label>
           <textarea class="form-control editormul" name="buyer" id="editor1" rows="5" cols="80" placeholder="textarea">
             
             <p>Buyer</p>

           	  <h2>{{@strtoupper($data[0]->company_name)}}</h2>  

               <p>{{@$data[0]->street}}  {{@$data[0]->another_street}}  {{@$data[0]->city}}  {{@$data[0]->state}} - {{@$data[0]->zip}},{{@	$data[0]->country}}
               </p>
           </textarea>
           <br/>
       </div>

       <div class="col-md-4">
       	    <label>Delivery Note</label>
          <input type="text" name="delivery_note" class="form-control" placeholder="text field">
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

          <!-- hidden field -->

          <input type="hidden" name="hidden_not_selected_companyname" id="hidden_not_selected"/>

          <input type="hidden" name="hidden_not_selected_dispatchedthrough" id="hidden_not_selected_dispatchedthrough"/>

        <div class="col-md-5">
		  	<label>Delivery Note Date</label>
  				<div class="form-group">

                <div class='input-group date' >
                    
                    <input type='text' name="delivery_note_date" class="form-control" id="datetimepicker2"/>
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
        	
         <select name="dispatched_through" id="dispatched_through" class="form-control" data-live-search="true">
	              <option value="Two Wheeler">Two Wheeler</option>
	              <option value="Ape Goods">Ape Goods</option>
	              <option value="Lory">Lory</option> 
		  </select>

        </div>	

        <div class="col-md-5">
          <label>Destination</label>   
          <textarea class="form-control editormul" name="destination" id="editor2" placeholder="textarea" rows="4">
          </textarea>
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

      <script src="https://cdn.ckeditor.com/4.5.1/standard/ckeditor.js"></script>

{{--    <script type="text/javascript" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
     <script type="text/javascript" src="{!! asset('/js/Contents/tableExport.js') !!}"></script>
     <script type="text/javascript" src="{!! asset('/js/Contents/jquery.base64.js') !!}"></script> --}}

       <script type="text/javascript">

        function selectall(){

           var arr = $('#dispatched_through option:not(:selected)').map(function(i,el){
                return $(el).val();
            });

           var notSelected =  arr.toArray().toString();

            console.log(notSelected);

            //alert(notSelected);

           $('#hidden_not_selected_dispatchedthrough').val(notSelected);
        }

        function selectall2(){
          
               var arr = $('.selectpicker option:not(:selected)').map(function(i,el){
                    return $(el).val();
                });

               var notSelected =  arr.toArray().toString();

               console.log(notSelected);

               $('#hidden_not_selected').val(notSelected);

        }
       	
       	$(function(){


             selectall();

             selectall2();  

             $('.selectpicker option:first').attr('selected','selected').change();


             var address = $('.selectpicker option:selected').data('companyaddress');


             //alert(address);

              var email = $('.selectpicker option:selected').data('companyemail');

              var gstin = $('.selectpicker option:selected').data('gstin'); 

               $('#vendorAddressRemove').remove();

               $('#vendorEmailRemove').remove();

               $('#vendorGistinRemove').remove();  
              
               $('form#create_performa_invoice').append('<input type="hidden"  id="vendorAddressRemove"  name="vendor_address" value="'+address+'">');

              $('form#create_performa_invoice').append('<input type="hidden"  id="vendorEmailRemove"  name="vendor_email" value="'+email+'">');

              $('form#create_performa_invoice').append('<input type="hidden"  id="vendorGistinRemove"  name="vendor_gistin" value="'+gstin+'">');

            // $('.selectpicker').change();   


             /* for ckeditor */
                CKEDITOR.editorConfig = function (config) {
                    config.language = 'es';
                    config.uiColor = '#F7B42C';
                    config.height = 300;
                    config.toolbarCanCollapse = true;

                };


                $('.editormul').each(function(){  
                     CKEDITOR.replace( $(this).attr('id') );
                });
               // CKEDITOR.replace('editor1');
             /* for ckeditor */


       	      $('#submitBtn').click(function(e){     
 
                    e.preventDefault();

                  if($('#customer_id_first').val() != ''){

                         $('#create_performa_invoice').submit();
                   }else{

                   	  alert('Please Enter A Customer Id');
                   }
       	      });


           $('.selectpicker').change(function(){

              var address = $('.selectpicker option:selected').data('companyaddress');

              var email = $('.selectpicker option:selected').data('companyemail');

              var gstin = $('.selectpicker option:selected').data('gstin'); 

               $('#vendorAddressRemove').remove();

               $('#vendorEmailRemove').remove();

               $('#vendorGistinRemove').remove();  
              
               $('form#create_performa_invoice').append('<input type="hidden"  id="vendorAddressRemove"  name="vendor_address" value="'+address+'">');

              $('form#create_performa_invoice').append('<input type="hidden"  id="vendorEmailRemove"  name="vendor_email" value="'+email+'">');

              $('form#create_performa_invoice').append('<input type="hidden"  id="vendorGistinRemove"  name="vendor_gistin" value="'+gstin+'">');

               // console.log('<input type="text"  id="vendorAddressRemove"  name="vendor_address" value="'+address+'">');       

                var arr = $('.selectpicker option:not(:selected)').map(function(i,el){
                    return $(el).val();
                });

               var notSelected =  arr.toArray().toString();

               console.log(notSelected);

               $('#hidden_not_selected').val(notSelected);

            });


           $('#dispatched_through').change(function(){
                     
              var arr = $('#dispatched_through option:not(:selected)').map(function(i,el){
                    return $(el).val();
                });

               var notSelected =  arr.toArray().toString();

                console.log(notSelected);

               $('#hidden_not_selected_dispatchedthrough').val(notSelected);

           });


         $('#datetimepicker1,#datetimepicker2').datetimepicker({'minDate':0});


     });

       </script>
  @endsection
