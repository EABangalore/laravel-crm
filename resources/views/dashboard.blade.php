@extends('main-layout.main')

@section('css')

<style>
	body {
  padding: 20px;
  font: 16px/22px "Open Sans", sans-serif;
}
.container {
  margin: 0 auto;
  max-width: 100%;
}
.panel {
  box-sizing: border-box;
  position: relative;
  display: inline-block;
  width: 200px;
  height: 140px;
  margin: 10px;
  font-size: 32px;
  font-weight: 600;
  color: #fff;
  overflow: hidden; 
  border-radius: 8px;	
}
.panel a {
  position: relative;
  display: block;
  padding: 12px 25px 35px 25px;
  color: #fff;
  text-decoration: none; 
  z-index: 2;
}
.panel a span {
  display: block;
  font-size: 50px;
  font-weight: 700;
  line-height: 96px;
}
.panel:after {
  position: absolute;
  font-family: FontAwesome;
  color: #000000;
  z-index: 1;
  transition: all .5s;
  line-height: normal;
}
.panel.post {
  background-color: #b8aa0e;
}
.panel.post:after {
  content: "\f08d";
  font-size: 100px;
  color: #a5980d;
  top: 45px;
  right: 60px;
  -webkit-transform: rotate(45deg);
  transform: rotate(45deg);
}
.panel.post:hover:after {
  top: 8px;
}


.panel.car {
  background-color: #b8aa0e;
}
.panel.car:after {
  content: "\f07a";
  font-size: 100px;
  color: #a5980d;
  top: 45px;
  right: 60px;
  -webkit-transform: rotate(45deg);
  transform: rotate(45deg);
}
.panel.cart:hover:after {
  top: 8px;
}
.panel.comment {
  background-color: #0377c0;
}
.panel.comment:after {
  content: "\f075";
  font-size: 100px;
  color: #036bac;
  top: 30px;
  right: 35px;
}
.panel.comment:hover:after {
  top: -5px;
}
.panel.page {
  background-color: #279824;
}
.panel.page:after {
  content: "\f15c";
  font-size: 100px;
  color: #238820;
  top: 62px;
  right: 39px;
}
.panel.page:hover:after {
  top: 24px;
}
.panel.user {
  background-color: #fc1c3e;
}
.panel.user:after {
  content: "\f007";
  font-size: 100px;
  color: #ec0326;
  top: 45px;
  right: 35px;
}
.panel.user:hover:after {
  top: 7px;
}
.panel:hover:after {
  transition: all .5s;
}

</style>
@endsection

@section('content')


<div class="container">
	<div class="row">
    <div class="col-md-3">
      <div class="panel post">
        <a href="{{URL::to('orders_landing')}}"><span>{{$all_order}}</span>Orders</a>
      </div>
    </div>
<div class="col-md-3">
  <div class="panel car">
    <a href="{{URL::to('invoice_landing')}}"><span>.</span>Invoice</a>
  </div>
</div>
<div class="col-md-3">
  <div class="panel page">
    <a href="{{URL::to('quotation_landing')}}"><span>3 </span>Quotation</a>
  </div>
</div>
<div class="col-md-3">
  <div class="panel user">
    <a href="{{URL::to('sales_landing')}}"><span>4 </span>SalesRep</a>
  </div>
</div>
</div>


 <div class="row">
		<div class="col-md-3">
		   <div class="panel user">
		    <a href="{{URL::to('customer_landing')}}"><span>5 </span>Customers</a>
		 </div>
  </div>


<div class="col-md-3">
   <div class="panel user">
    <a href="{{URL::to('supplier_landing')}}"><span>6 </span>Suppliers</a>
  </div>
  </div>

<div class="col-md-3">
   <div class="panel comment">
    <a href="{{URL::to('expenses_landing')}}"><span>7 </span>Expencess</a>
  </div>
</div>


<div class="col-md-3">
  <div class="panel page">
    <a href="{{URL::to('user_management')}}"><span>3 </span>Users</a>   
  </div>
</div>

</div><!-- row ends here -->


<div class="row">
  
    <div class="col-md-3">
         <div class="panel comment">
          <a href="{{URL::to('product_crud')}}"><span>{{$allProductsCount}}</span>Products</a>
        </div>
    </div>


    <div class="col-md-3">
      <div class="panel post">
        <a href="{{URL::to('performa_landing')}}"><span>{{$all_order}}</span>Performa</a>
      </div>
    </div>

</div>

</div>


</div>
</div>

@endsection