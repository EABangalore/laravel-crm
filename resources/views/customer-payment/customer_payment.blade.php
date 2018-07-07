@extends('main-layout.main')

  @section('css')
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
  @endsection

  @section('content')
      <div class="row">
      	  
      	  <div class="row">



          @if(session()->has('message'))    

                 <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <i class="fa fa-check-circle"></i> {!! session()->get('message') !!}
               </div>

               @endif

              @if(session()->has('error'))    

                 <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <i class="fa fa-check-circle"></i> {!! session()->get('error') !!} 
               </div>

           @endif

      	  	 <form method="POST" action="{{URL::to('customer_payment')}}">

      	  	 	{{csrf_field()}}
      	  	  
      	  	   <div class="col-md-6">
      	  	   	  <label>Enter Customer Id</label>
      	  	   	  <input type="text" name="customer_id" id="customer_id" class="form-control">
      	  	   </div>

      	  	   <div class="col-md-2">
      	  	   	  <br/>

      	  	           <input type="submit" class="btn btn-primary" value="Search">

      	  	    </div>

      	  	   </form>

      	   </div>

      	   <div class="row">
      	  	  
      	  	   <div class="col-md-5">
      	  	   	  <label>Customer Name</label>
      	  	   	  <input type="text" name="customer_name" id="customer_name" class="form-control">
      	  	   </div>

      	  	   <div class="col-md-5">
      	  	   	  <label>Company Name</label>
      	  	   	  <input type="text" name="company_name" id="company_name" class="form-control">
      	  	   </div>

      	  </div>


      	   <div class="row">
      	  	  
      	  	   <div class="col-md-5">
      	  	   	  <label>Email Id</label>
      	  	   	  <input type="text" name="email" id="email" class="form-control">
      	  	   </div>

      	  	   <div class="col-md-5">
      	  	   	  <label>Phone Number</label>
      	  	   	  <input type="text" name="phone" id="phone" class="form-control">
      	  	   </div>

      	  </div>

      </div>
  @endsection
