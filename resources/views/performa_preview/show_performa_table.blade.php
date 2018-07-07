<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.12.2/printThis.min.js"></script>

<style type="text/css">
  body{
    overflow-x: hidden;
  box-sizing: border-box;
  font-family: 'Crimson Text', serif;
  font-size: 18px;

  }


</style>
</head>


<body>
  <div class="container">



     @if(session()->has('message'))    

         <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <i class="fa fa-check-circle"></i> {{ session()->get('message') }}
       </div>

     @endif   


   <div class="row" id="excludeInPrintSection">

           <div class="col-md-3">

                <form method="POST" action="{{URL::to('send_previewed_invoice/'.encodeToBase64($data->customer_id))}}">

                  {{csrf_field()}}

                  <input type="hidden" value="{{Request::segment(2)}}" name="customer_id">

                  <input class="btn btn-primary" type="submit" value="Send Invoice"/>   
                </form>

          </div>


        <div class="col-md-3">

            <form method="POST" action="{{URL::to('send_previewed_invoice_to_customer/'.encodeToBase64($data->customer_id))}}">   

                  {{csrf_field()}}

                  <input type="hidden" value="{{Request::segment(2)}}" name="customer_id">

                  <input class="btn btn-primary" type="submit" value="Send Invoice To Customer"/>   
                </form>

          </div>

          <div class="col-md-3">
             <a href="#" class="btn btn-warning" id="printPerformaInvoice">Print</a>
           </div>
    
    </div>

    <div class="row">
      <div class="col-md-12">
    <h1 class="text-center" style="color: #3b6781;"> Proforma Invoice</h1>
  </div>
</div>
</div>
<div class="container" style="padding-top: 40px;">
   
    <table class="table table-bordered table-responsive" >

   
        <tr>
          
          <td style="border-top-style:1px solid black !important;" rowspan="3" ><b style="color: #3b6781;">@if($data->company_name !='') {{@strtoupper($data->company_name)}} @else {{$data->customer_name}} @endif</b><p>{{$data->vendor_address}}</p>
          <p>GSTIN/UIN: {{$data->vendor_gistin}}</p>
          <p>E-Mail : {{$data->vendor_email}}</p></td>
          <td>Invoice No. | e-Sugann No.<br><br>{{@$data->invoice_number}}</td>
          <td ><p>Dated</p><br>@if($data->invoice_date == '') {{date("j-F-Y")}} (<strong>{{date("l")}}</strong>) @else {{$data->invoice_date}} @endif</td>    
          
        </tr>

        <tr>
          
          
          <td><p>Delivery Note:</p></td>
          <td>@if(@$data->delivery_note == '')<p>Mode/Terms of Payment :</p> @else <p>{{$data->delivery_note}}</p>@endif</td>  
          
        </tr>
         <tr>
          
          
          <td ><p>Suppliers Ref. :</p></td>
          <td><p>Other Reference(s) :</p></td>
          
        </tr>

         <tr>
          
          <td rowspan="3" style="border-bottom-style:none !important"><b style="color: #3b6781;">{{-- Alliance Fitness Consultancy</b><p>No 187,New No 3,T R S Lane, Nagarthpet,</p><p>Bangalore-560002</p><p>State Name: Karnataka, Code : 29</p><p>GSTIN/UIN29AHYPM5388E1ZG</p>

          </td>
          <td><p>Buyers Order No :</p></td>
          <td><p>Dated :</p> --}}


            {!! @$data->buyer !!}


          </td>
          
        </tr>

        <tr>
          
           <td ><p>Despatch Document No :</p></td>
          <td ><p>Delivery Note Date :</p><span>@if(@$data->delivery_note_date =='') {{date("j-F-Y")}} @else {{date(@$data->delivery_note_date)}} @endif</span></td>
           
          
        </tr>

         <tr>
         
          <td ><p>Despatched through :</p></td>
          <td ><p>Destination :</p></td>
        </tr>

        <tr>
         
           <td style="width: 600px; text-align: right;border-top-style:none !important"><p></p></td>
          <td  colspan="2" style="width: 500px;height:200px;border-left-style:none !important"; text-align: right;"><p>Terms Of Delivery :</p></td>  
        </tr>
   

      </table>
    


    <table class="table table-bordered table-responsive table-striped" style="margin-top:-20px;">

    

         <tr>
          <th style="color: #3b6781" >Sl NO</th>
          <th style="color: #3b6781">Description of Goods</th>
          <th style="color: #3b6781">HSN/SAC</th>
          <th style="color: #3b6781">Quantity</th>
          <th style="color: #3b6781">Rate</th>
          <th style="color: #3b6781">Per</th>
          <th style="color: #3b6781">Amount</th>
        </tr>





   @php   

    $j = (array) json_decode($data->quotation_data,TRUE);


      foreach($j as $key => $value){   
          if(is_numeric($key)) unset($j[$key]);  
      }  


      $iii = 0;


      $allQuantities = 0;

      @endphp


   

    @foreach($j as $key => $val)


          @foreach($val as $k => $v)

            @php  $iii++; @endphp



     @if(strtolower($key) != 'total')


        @if(strtolower($key) != 'gst')

            <tr>
              <td >{{$iii}}</td>       
              <td>{{strtoupper(str_replace("_", " ", $key))}}</td>
              <td></td>
              <td >{{$v['Quantity']}}</td>
              <td >{{$v['Price']}}</td>
              <td>N0's</td>
              <td>{{$v['Amount']}}</td>
            </tr>

         @php  $allQuantities =  $allQuantities +  $v['Quantity']; @endphp


       @else  @php $gstTotalAmount = $v['Amount']; @endphp  @endif

          @else
            @php $grandTotal = $v['Amount']; @endphp   
          @endif
          

          @endforeach

       @endforeach



        <tr>
          <td ></td>
          <td class="text-right"><strong>Total Amount</strong></td>
          <td ></td>
          <td class="text-right"><strong>{{$allQuantities}} N0'S</strong></td>   
          <td ></td>
             <td ></td>
          <td class="text-right">&#2352; {{convertMoney($grandTotal)}}</td>
        </tr>


      <tr>
          <td ></td>
          <td class="text-right"><strong>Total With GST </strong></td>
          <td ></td>
          <td class="text-right"><strong></strong></td>   
          <td ></td>
          <td ></td>

          <td class="text-right">&#2352; {{convertMoney($gstTotalAmount)}}</td>
        </tr>


    @if(@$data->total_recieved_amount > 0 || @$data->total_recieved_amount !='')

       <tr>
          <td></td>
          <td class="text-right"><strong>Paid Amount</strong></td>
          <td ></td>
          <td class="text-right"></td>   
          <td ></td>
          <td ></td>
          <td class="text-right">&#2352; {{convertMoney($data->total_recieved_amount)}}</td>
        </tr>


        <tr>
          <td></td>
          <td class="text-right"><strong>Balance</strong></td>
          <td ></td>
          <td class="text-right"></td>   
          <td ></td>
          <td ></td>
          <td class="text-right">&#2352; {{convertMoney($data->total_balance)}}</td>
        </tr>


       @endif


          <tr>
          <th colspan="7" ><p style="color:#3b6781; ">Amount Chargeable (in words)</p><h4><b>{{getIndianCurrencyInWords($gstTotalAmount)}}</b></h4></th>
         
        </tr>
         <tr>
        
          <th style=" border-bottom-style:none !important; color:#3b6781;  ">HSN/SAC</th>
          <th style="border-bottom-style:none !important;color:#3b6781;">Taxable Value</th>
          <th colspan="2" style="text-align: center; color:#3b6781; ">Central Tax</th>
          
             <th colspan="2" style=" text-align: center; color:#3b6781; ">State Tax</th>
          
             <th style="border-bottom-style:none !important; color:#3b6781; ">Total<br>Tax Amount</th>
        </tr>

         <tr>
        
          <th style="border-top-style:none !important"></th>
          <th style="border-top-style:none !important; color:#3b6781; ">Taxable Value</th>
          <td>Central Tax</td>
          <td >Rate</td>
             <td>State Tax</td>
           <td >Total<br>Tax Amount</td>
             <th style="border-top-style:none !important; text-align: right"></th>
        </tr>

      <tr>

          @php 

          $halfTaxAmountForBoth = (($data->gst_percentage/100)*$grandTotal)/2; 
          $totalGstForBothHalf = $halfTaxAmountForBoth + $halfTaxAmountForBoth;
          @endphp

          <td>Total</td>
          <td >{{convertMoney($grandTotal)}}</td>
          <td >{{ceil($data->gst_percentage/2)}} %</th>
          <td >{{$halfTaxAmountForBoth}}</td>
          <td >{{ceil($data->gst_percentage/2)}} %</td>  
          <td >{{$halfTaxAmountForBoth}}</td>
          <td >{{convertMoney($totalGstForBothHalf)}}</td>
        </tr>

         <!--tr>
          
          <td>Total</td>
          <td >4000.00</td>
          <td ></td>
          <td>360.00</td>
             <td ></td>
          <td>360.00</td>
             <td >720.00</td>
        </tr-->
 <!--tr>
          <th colspan="7" style=" border-bottom-style:none !important;padsding-bottom: 100px;"><p ><span style="color:#3b6781;  ">Tax Amount (in words)</span> &nbsp;<b>INR Seven Hundread And Twenty Only</b></</p></th>
           </tr-->


           <tr> 
            <td colspan="2" style="border-top-style:none !important">
        <p style="color:#3b6781;  "><kbd>Declaration</kbd></p>

        <p >We declare at this <code>invoice</code> shows <br> the actual price of the goods described <br>and that all particulars are<code> true</code> and <br>correct</p></td>

           <th colspan="7"> 
        <p style="color:#3b6781; text-align: right; ">for {{strtoupper($data->company_name)}}</p>

        <p style="text-align: right"><br>Authorised Signatory</p></th>
         

        </tr>




     
     
    </table>
  </div>

  <p class="text-center">This is computer genrated invoice</p>


  <script type="text/javascript">
    
       $(document).ready(function(){
          
          $('#printPerformaInvoice').click(function(){
             
             h = $('html').clone();

              h.find('#excludeInPrintSection').remove();

              h.find('.alert-dismissible').remove();  

              h.printThis();

          });
       });
  </script>


</body>

</html>  