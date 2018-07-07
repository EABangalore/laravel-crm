@extends('main-layout.main')

  @section('css')
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">

   <link rel="stylesheet" href="http://akquinet.github.io/jquery-toastmessage-plugin/demo/css/jquery.toastmessage-min.css">

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/jquery.datetimepicker.min.css"/>

       <link rel="stylesheet" href="{{asset('/css/jquery-loader.css')}}"> 

  <style type="text/css">
      th{background-color:#f5f5fa;}

    td{background-color:white;}

    textarea{
      overflow: hidden;
    }

  </style>
  @endsection

  @section('content')
      <div class="content">
      	  
      	  <div class="row">

      	  	 <form method="POST" action="{{URL::to('customer_payment')}}">

      	  	 	{{csrf_field()}}
      	  	  
      	  	   <div class="col-md-6">
      	  	   	  <label>Enter Customer Id</label>
      	  	   	  <input type="text" name="customer_id" id="customer_id" value="{{@encodeToBase64($data[0]->customer_id)}}" class="form-control">

                  <input type="hidden" name="customer_hidden_id" id="customer_hidden_id" value="{{@$data[0]->customer_id}}">
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
      	  	   	  <input type="text" name="customer_name" id="customer_name" value="{{@$data[0]->customer_name}}" class="form-control">
      	  	   </div>

      	  	   <div class="col-md-5">
      	  	   	  <label>Company Name</label>
      	  	   	  <input type="text" name="company_name" value="{{@$data[0]->company_name}}" id="company_name" class="form-control">
      	  	   </div>

      	  </div>


      	   <div class="row">
      	  	  
      	  	   <div class="col-md-5">
      	  	   	  <label>Email Id</label>
      	  	   	  <input type="text" name="email" id="email" value="{{@$data[0]->email}}" class="form-control">
      	  	   </div>

      	  	   <div class="col-md-5">
      	  	   	  <label>Phone Number</label>
      	  	   	  <input type="text" name="phone" id="phone" value="{{@$data[0]->phone}}" class="form-control">
                  <br/>
      	  	   </div>

      	  </div>

       @foreach($data as $dat)

          <div>
             {!! @$dat->generated_table !!}
          </div>

         @endforeach

         <hr/>


     <div id="wrapper1">

         <h2 style="text-align: center;">Payment Process</h2>
    
          <div class="row" style="text-align: center;">
          
             <div class="col-md-2">
                  <label class="fancy-radio">
                      <input name="transaction"  value="Cash" type="radio">
                      <span><i></i>Cash</span>
                    </label>
              </div>
              <div class="col-md-2">
                    <label class="fancy-radio">
                      <input name="transaction" value="Account" type="radio">
                      <span><i></i>Account</span>
                   </label>
              </div>

            </div>


        <!-- table for quotation -->
  

      <div class="row">
        

                   <div class="col-md-5"> 


            <select name="customer_id" id="productIdentifier" class="form-control selectpicker" data-live-search="true">

                 @foreach($data2 as $dat)

                   <option  value="{{$dat->name}}" title="{{$dat->name}}">{{$dat->name}}</option>

                 @endforeach

              </select>
        
               </div>

               <div class="col-md-3">
                   <input type="number" id="amount" placeholder="Amount" class="form-control">
               </div>



            <div class="col-md-2">
            
                 <div class="form-group">
                        <div class='input-group date' >
                            
                            <input type='text' name="start_date" class="form-control" id="datetimepicker1"/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                  </div>

          </div>

               <div class="col-md-2">
                   <button class="btn btn-primary" id="addCount">+Add</button>
                   <br/>
               </div>
                <br/>
          </div>  


             <div class="row">

                <div class="col-md-10" id="showDynamicTable">
                  
{{--                      <table class="table table-bordered" id="paymentRecievedBy">
                            <thead>
                              <th>Cash Recieved By</th>
                              <th>Through</th> 
                              <th>Recieved</th>
                            </thead>

                            <tbody>
                               
                            </tbody>
                        </table> --}}

                   </div>

                   <div style="display:" id="balanceSheetMainDiv">
                       {!! @$data3[0]->balance_sheet !!}  

                       @if(@$data3[0]->balance_sheet == '')
                       
                          
                      <table class="table table-bordered" id="paymentRecievedBy">
                            <thead>
                              <th>Cash Recieved By</th>
                              <th>Through</th> 
                              <th>Recieved</th>
                              <th>Date</th>
                              <th>Action</th>
                            </thead>

                            <tbody>
                                 
                           </tbody>
                       </table>

                       @endif
                   </div>

              </div> 

          <div class="row">
              <button class="btn btn-success" id="finalSubmit">Submit</button>
          </div>

       </div>  <!-- wrapper div ends here -->


      </div>
  @endsection

  @section('js')

   <script src="{!! asset('/js/tableToJson.js') !!}"></script> 

    <script src="{!! asset('/js/jquery-loader.js') !!}"></script>  


   <script src="http://akquinet.github.io/jquery-toastmessage-plugin/demo/jquery.toastmessage-min.js"></script>  

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.min.js"></script>

    <script>



     
      function showToastMessage(msg){

      var yourText = 'Success Dialog which is NOT sticky',
            toastMessageSettings = {
                text: msg.message,//yourText,
                sticky: false,
                position: 'top-right',
                type: msg.success,//'success',
                closeText: '',
                close: function() {
                    console.log("toast is closed ...");
                }
            };

           var myToast = $().toastmessage('showToast', toastMessageSettings);
    }


      function showTotalAtBottom(index,class2){

              //var grandTotal = 0;

               var arr = $('.'+class2).map(function(){

                console.log($(this).find('tr td').eq(index).text());

                var lastTotal = Number($(this).find('td').eq(index).text());


                return lastTotal;

                // var overAllTotal = 0;

                // var overAllTotal = lastTotal + overAllTotal;

                // grandTotal = overAllTotal;

              });

               console.log(arr);

               return arr;  
            }


    function retnum(str) { 
        var num = str.replace(/[^0-9]/g, ''); 
        return num; 
    }


      
    $(function(){

     // alert('hello world');

      // $('[id]').each(function () {
      //     $('[id="' + this.id + '"]').find('#lastTotalRow').remove();
      // });


      // $('[id]').each(function () {
      //     $('[id="' + this.id + '"]:gt(0)').attr('id','').addClass('secondTable').addClass('table').addClass('table-bordered');
      // });


      // $('.secondTable').each(function(){
      //    var cloned = $(this).find('tbody').clone();
      //    $('#showQuotation').append(cloned);
      // });


      // $('.secondTable').each(function(){
      //   $(this).remove();
      // });


       var totalPrice = showTotalAtBottom(4,'allTheQuotationRow');

       console.log('grand',totalPrice);

       totalPrice = totalPrice.toArray();

        var sum =0;

       for(var ii =0; ii<totalPrice.length;ii++){

          sum = sum + totalPrice[ii];
       }



       var previousGstTotal = parseFloat($('#gstShowingRow td:eq(4)').text());  


      if(sum > 0){
            
            var halfPaymentToBeRecieved =   (previousGstTotal / 2);
       }



   $('#wrapper1').prepend('<p><span style="color:#fb8c00;font-size:30px;">Half Amount To Be Recieved </span><span style="font-weight:bold;">  :    '+halfPaymentToBeRecieved.toFixed()+'</span></p>'); 

       $('#lastTotalRow').remove();

       $('#showQuotation tbody:last').append('<tr id="lastTotalRow"><td>total</td><td></td><td></td><td></td><td>'+sum+'</td></tr>');

       $('#showQuotation').addClass('table-bordered');


       $('#showQuotation').find('td').each(function(){
            $(this).prop('contenteditable', false);  
      });


        if($('#showQuotation').length == 0){
             $('#wrapper1').hide();  
          }


       $('#showQuotation tr:not("#lastTotalRow")').find('th:last-child, td:last-child').remove();
   
         
      
       //add cashier

       $('#addCount').on('click',function(e){

           var name =  $('#productIdentifier').val();
           console.log(name);

          var amount = $('#amount').val();

          var trans = $('input[name="transaction"]:checked').val(); 

         var date =  $('#datetimepicker1').val();


         date = moment(date).format('MMMM Do YYYY'); 

         //console.log(date);


          if($('input[name="transaction"]:checked').val() == '' || $('input[name="transaction"]:checked').val() == undefined ){

               alert('Please Select A Payment Method');

               return false;  
           }  


           if($('#amount').val() == '' || $('#amount').val() == undefined){
              
              alert('Please Select Amount');  

               return false; 
            }


          var tableBody = '<tr class="showAllTrans"><td>'+name+'</td><td>'+trans+'</td><td>'+amount+'</td><td style="width:171px;">'+date+'</td><td style="width:10px;"><span class="label label-warning removeRow" style="width:20px;cursor:pointer;">cancel</span></td></tr>';


          console.log(tableBody);

          $('#paymentRecievedBy tbody').append(tableBody);  


        //showTotalAtBottom(2,'showAllTrans');


           var totalPrice = showTotalAtBottom(2,'showAllTrans');

           console.log('grand',totalPrice);

           totalPrice = totalPrice.toArray();

            var sum =0;

           for(var ii =0; ii<totalPrice.length;ii++){

              sum = sum + totalPrice[ii];
           }

        
        $('#commonDisplayRow').remove();  

        $('#paymentRecievedBy tbody:last').append('<tr id="commonDisplayRow"><td></td><td></td><th style="background-color: #f5f5fa;">Amount Detail</th><td></td><td></td></tr>'); 


         $('#paymentLastTotalRow').remove();   

        // $('#paymentRecievedBy').append('<tr id="paymentRecievedByRow43633"><td></td><td></td><th>Amount Paid</th><td></td><td></td></tr>'); 


        // $('#paymentRecievedByRow43633').remove();     

       $('#paymentRecievedBy tbody:last').append('<tr id="paymentLastTotalRow"><td>Total Paid</td><td></td><td>'+sum+'</td><td></td><td></td></tr>'); 


      // var previousTotal = retnum($('#gstShowingRow').text()); 

      var previousTotal = parseFloat($('#gstShowingRow td:eq(4)').text());  

       //alert(previousTotal);  

       var balance =  (previousTotal - sum);


       $('#balanceLastTotalRow').remove();   

       $('#paymentRecievedBy tbody:last').append('<tr id="balanceLastTotalRow"><td>Balance Amount</td><td></td><td>'+balance.toFixed(2)+'</td><td></td><td></td></tr>');   


       });

       $('#finalSubmit').click(function(e){
           e.preventDefault();


          $('body').loading({  message: 'Please Wait...',theme:'dark'});
  
          var totalBalance = parseFloat($('#balanceLastTotalRow td:eq(2)').text());

          var payMentRecieved = parseFloat($('#paymentLastTotalRow td:eq(2)').text());

          var totalAmount = parseFloat($('#lastTotalRow td:eq(4)').text());  

          var customerid = $('#customer_hidden_id').val();

           var customer_name = $('#customer_name').val();

           var company_name = $('#company_name').val();

           var email = $('#email').val();

           var phone = $('#phone').val();

           var productMainTable = $('#showQuotation').closest('div').html();

           var balanceSheetTableOriginal = $('#paymentRecievedBy').closest('div').html();

           var baseUrlMain = $('#allTheBaseUrl999987').val();

           var goUrl = baseUrlMain+'/save_customer_payment_data/';


           var balanceSheetTable = $('#paymentRecievedBy').closest('div').clone();
          
           //console.log(c.find('.removeRow').remove());  

           balanceSheetTable.find('.removeRow').remove();  

           balanceSheetTable = balanceSheetTable.html();

            console.log(balanceSheetTable);

          // return false;

              $.ajax({
                  url:goUrl,
                  type:'POST',
                  data:{_token:$('meta[name="csrf-token"]').attr('content'),customer_id:customerid,customer_name:$('#customer_name').val(),company_name:$('#company_name').val(),email:$('#email').val(),phone:$('#phone').val(),total_balance:totalBalance,total_amount:totalAmount,total_recieved_amount:payMentRecieved,product_bought:productMainTable,balance_sheet:balanceSheetTableOriginal,balance_sheet_to_be_sent:balanceSheetTable},
                  dataType:'json',
                  success:function(data){
                    console.log(data);

                     $('body').loading('toggle');  

                    var mesg = {message:data.message,status:data.success};
                        showToastMessage(mesg);

                      },
                    error:function(data){
                      console.log(data);

                     $('body').loading('toggle');  
                        var mesg = {message:'ejaz Anwar',status:'success'};
                                showToastMessage(mesg);
                      alert('error occured here');
                    }
                });

       });


      $('#datetimepicker1').datetimepicker({'minDate':1});  



          $(document).on('click', '.removeRow', function(){  
                  $(this).closest('tr').remove();
           }); 
 


      });
    </script>
  @endsection  