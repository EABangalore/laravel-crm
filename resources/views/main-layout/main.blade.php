<!DOCTYPE html>
<html>
<head>
	<title>EBS ADMIN PANEL</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

	<meta name="csrf-token" content="{{ csrf_token() }}">

	
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendor/linearicons/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendor/chartist/css/chartist-custom.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{asset('assets/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/img/favicon.png')}}">
	<style type="text/css">

		.popover.bottom .arrow {visibility:hidden;}
		.textDecorationNone{text-decoration: none;}

   </style>
	{{-- all css --}}
	@yield('css')
	{{--all css--}}
</head>
<body>
  @include('header.header')
     
       <!-- content here -->
               
               @yield('content')

       <!-- end of content -->

       <input type="hidden" id="allTheBaseUrl999987" value="{{URL::to('/')}}">

   @include('footer.footer')     

   @yield('js')

  <script src="{!! asset('/js/common-alert.js') !!}"></script>   

<script >


$(function(){
    $('#login8	').popover({
       
        placement: 'bottom',
        html:true,
        content:  $('#myForm').html()
    }).on('click', function(){
      
      $('.btn-primary').click(function(){
      
      })
  })
})



</script>
</body>
</html>