<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

 use Spatie\Browsershot\Browsershot;

 use Dompdf\Dompdf;

 use Dompdf\Options; 

 //use Illuminate\Support\Facades\Mail;




class screenshot extends Controller
{
    

 public function index($id){


 	  $data = \App\new_customer::findOrFail($id);  

 	  // $data2 = $data->toArray();

 	  // $this->validate(, [   
    //        'email' => 'required|email',
    //   ]);  


 	  $customer_name = $data->contact_name;

 	  $uniqid = uniqid($id);

 	  $date = new \DateTime();

 	  $emailId = $data->email;  

 	  //dd($emailId);  

 	  $formatedDate = $date->format('d-m-Y');

 	  $bas = base_path();


 	  // $pub = public_path();

 	  $logoo = $bas.'\image\logoebs.png';

	 $html2 = '<!DOCTYPE html>
		<html lang="en">
		<head>
		  <title>Bootstrap Example</title>
		  <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  <link href="https://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<style type="text/css">
		  body{
		    overflow-x: hidden;
		  box-sizing: border-box;
		  font-family: \'Crimson Text\', serif;
		  font-size: 18px;

		  }


		</style>
		</head>


		<body>
		  <div class="container">
		    <div class="row">
		      <div class="col-md-12">
		    <h1 class="text-center" style="color: #3b6781;"> Proforma Invoice</h1>
		  </div>
		</div>
		</div>
		<div class="container" style="padding-top: 40px;">
		   
		    <table class="table table-bordered table-responsive" >
		   
		        <tr>
		          
		          <td style="border-top:1px solid black;" rowspan="3" ><b style="color: #3b6781;">DOLPHIN SYSTEM TECHNOLOGIES</b><p>NO 6 Electronic Plaza,Shop No 322122-Dec-20173rd Floor,3rd Cross,P.R.LaneDelivery NoteMode/Terms of PaymentS.P.Road,Bangalore</p>
		          <p>GSTIN/UIN: 29ABUPU2335F1Z5</p>
		          <p>E-Mail : dolphinsystech@gmail.com</p></td>
		           <td>Invoice No. | e-Sugann No.<br><br>221</td>
		          <td ><p>Dated</p><br>22-Dec-2017</td>
		          
		        </tr>

		        <tr>
		          
		          
		          <td><p>Delivery Note:</p></td>
		          <td><p>Mode/Terms of Payment :</p></td>
		          
		        </tr>
		         <tr>
		          
		          
		          <td ><p>Suppliers Ref. :</p></td>
		          <td><p>Other Reference(s) :</p></td>
		          
		        </tr>

		         <tr>
		          
		          <td rowspan="3" style="border-bottom-style:none !important"><p>Buyer</p><b style="color: #3b6781;">Alliance Fitness Consultancy</b><p>No 187,New No 3,T R S Lane, Nagarthpet,</p><p>Bangalore-560002</p><p>State Name: Karnataka, Code : 29</p><p>GSTIN/UIN29AHYPM5388E1ZG</p>

		          </td>
		          <td><p>Buyers Order No :</p></td>
		          <td><p>Dated :</p></td>
		          
		        </tr>

		        <tr>
		          
		           <td ><p>Despatch Document No :</p></td>
		          <td ><p>Delivery Note Date :</p></td>
		           
		          
		        </tr>

		         <tr>
		         
		          <td ><p>Despatched through :</p></td>
		          <td ><p>Destination :</p></td>
		        </tr>

		        <tr>
		         
		           <td style="width: 600px; text-align: right;border-top-style:none !important"><p></p></td>
		          <td  colspan="2" style="width: 500px;height:200px;border-left-style:none !important"; text-align: right;"><p>Terms Of Delivary :</p></td>
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

		        <tr>
		          <td >1</td>
		          <td>Side Board<br><br>CGST<br>SGST</td>
		          <td></td>
		          <td >1 NOS</td>
		          <td >4,000.00</td>
		             <td>N0s</td>
		          <td>4,000.00<br> <br> 360.00<br>360.00</td>
		        </tr>

		          <tr>
		          <td ></td>
		          <td class="text-right">Total</td>
		          <td ></td>
		          <td class="text-right">1 N0S</td>
		          <td ></td>
		             <td ></td>
		          <td class="text-right">&#x20b9 4,720.00</td>
		        </tr>

		          <tr>
		          <th colspan="7" ><p style="color:#3b6781; ">Amount Chargeable (in words)</p><h5><b>INR Four Thousand Seven Hundred Twenty Only</b></h5></th>
		         
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
		          
		          <td></td>
		          <td >4000.00</td>
		          <td ></th>
		          <td >360.00</td>
		             <td ></td>
		          <td >360.00</td>
		             <td >720.00</td>
		        </tr>

		         <tr>
		          
		          <td>Total</td>
		          <td >4000.00</td>
		          <td ></td>
		          <td>360.00</td>
		             <td ></td>
		          <td>360.00</td>
		             <td >720.00</td>
		        </tr>
		 <tr>
		          <th colspan="7" style=" border-bottom-style:none !important;padsding-bottom: 100px;"><p ><span style="color:#3b6781;  ">Tax Amount (in words)</span> &nbsp;<b>INR Seven Hundread And Twenty Only</b></</p></th>
		           </tr>


		           <tr> 
		            <td colspan="2" style="border-top-style:none !important">
		        <p style="color:#3b6781;  "><kbd>Declaration</kbd></p>

		        <p >We declare at this <code>invoice</code> shows <br> the actual price of the goods described <br>and that all particulars are<code> true</code> and <br>correct</p></td>

		           <th colspan="7"> 
		        <p style="color:#3b6781; text-align: right; ">for DOLPHIN SYSTEM TECHNOLOGIES</p>

		        <p style="text-align: right"><br>Authorised Signatory</p></th>
		         

		        </tr>




		     
		     
		    </table>
		  </div>

		  <p class="text-center">This is computer genrated invoice</p>


		</body>

		</html>';      

//echo $html2; die;


	$options = new Options();
	$options->set('isRemoteEnabled', TRUE);
	$dompdf = new Dompdf($options);
	$contxt = stream_context_create([ 
	    'ssl' => [ 
	        'verify_peer' => FALSE, 
	        'verify_peer_name' => FALSE,
	        'allow_self_signed'=> TRUE
	    ] 
	]);
	
	 $dompdf->setHttpContext($contxt);


		//$dompdf = new Dompdf();
		$dompdf->load_html($html2);  

		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('A4', 'landscape');

		// Render the HTML as PDF
		$dompdf->render();

		// Output the generated PDF to Browser
		//$dompdf->stream();

		 //$dompdf->render();
         $output = $dompdf->output();

         $publicPath = public_path();

         $filePath = $publicPath.'\\generated_pdf\\'.$formatedDate.$customer_name.$uniqid.'.pdf';	
         $onlyFile = $formatedDate.$customer_name.$uniqid.'.pdf';
         
         file_put_contents($filePath, $output);  


         return view('invoice.preview_invoice',['generatedFile'=>$filePath,'name'=>$onlyFile,'email'=>$emailId]);   

         //return \Redirect::to($url);

//          $email = 'ejazanwar777@gmail.com';//$request->email;

// 	     $data = ['name'=>'Ejaz Anwar','study'=>'eng'];


// 	     $usableVariables = ['genfile'=>$filePath,'email'=>$email];

// 	     /* code for multiple cc or bcc


// 			// 	     $emails = ['myoneemail@esomething.com', 'myother@esomething.com','myother2@esomething.com'];

// 			// Mail::send('emails.welcome', [], function($message) use ($emails)
// 			// {    
// 			//     $message->to($emails)->subject('This is test e-mail');    
// 			// });
// 			// var_dump( Mail:: failures());
// 			// exit;

//        */



// \Mail::send('email-invoice.invoice', ['data'=>$data], function ($message) use ($usableVariables) {
         
// 	         $publicPath = public_path(); 

// 		     $message->from('ejazanwar777@gmail.com', 'My Email');

// 		     $message->to($usableVariables['email'])->subject('The subject');

// 	         $message->attach($usableVariables['genfile']);   


// 	    });    

// 	    if (\Mail::failures()) {
// 	        // return response showing failed emails

// 	        return redirect()->back()->with('error', 'Some Error Has Occured While Sending Mail!');
// 	     }

// 	    // otherwise everything is okay ... 


// 	    \App\new_job::where('id', $id)->update(['invoice_sent'=>'classForInvoiceSent','title_for_invoice_sent'=>'Invoice is Already Been Sent','invoice_sent_time'=>$date,'all_sent_invoice'=>1]); 

// 	    return redirect()->back()->with('message', 'Invoice Has Been Sent Successfully!');


    }

}
