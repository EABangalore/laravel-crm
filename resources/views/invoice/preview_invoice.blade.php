@extends('main-layout.main')

  @section('css')
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
  @endsection

  @section('content')

  <div class="container">


    <embed src="{{URL::to('/generated_pdf/')}}/{{$name}}" width="90%" height="400" />


{{--     <iframe src= "http://docs.google.com/gview?url={{URL::to('/generated_pdf/')}}/{{$name}}&embedded=true" style="width:100%; height:700px;" frameborder="0"></iframe> --}}

	  <div class="row">

	  	 <div class="col-md-4">

		    <form action="{{URL::to('send_invoice')}}" method="POST">

		    	{{csrf_field()}}

		    	<input type="submit" value="Send Invoice" class="btn btn-success"/>
		    	<input type="hidden" name="customer_id" value="{{Request::segment(2)}}"> 
		    
		     <input type="hidden" name="file_path" value="{{$generatedFile}}">  

		     <input type="hidden" name="email" value="{{$email}}">  
		    </form>

		 </div>

		 <div class="col-md-4">
		 	
		 	<a href="{{URL::to('/generated_pdf/')}}/{{$name}}" download="invoice_{{$name}}" class="btn btn-warning">Download</a>
		 </div>

		 <div class="col-md-4">
		 	<a href="{{URL::to('/generated_pdf/')}}/{{$name}}" class="" target="_BLANK">Preview Invoice Full Screen</a>
		 </div>

	   </div>
     


 </div>

  @endsection


  @section('js')

  <script>

  	  $(function(){
  	  });

  </script>


  @endsection