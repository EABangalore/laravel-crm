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


 	  $data = \App\new_job::where('id',$id)->get();

 	  $customer_name = $data[0]->name;

 	  $uniqid = uniqid($id);

 	  $date = new \DateTime();

 	  $formatedDate = $date->format('d-m-Y');

 	  $bas = base_path();


 	  // $pub = public_path();

 	  $logoo = $bas.'\image\logoebs.png';

 	 // $url = URL::to($logoo);

 	  //dd($url);


		$html = '<!DOCTYPE html>
		<html>

		<head>
		  <title>Bootstrap Example</title>
		  <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		  <style>

		body{font-family: "Source Sans Pro", sans-serif;
		font-family: "Roboto", sans-serif;
		font-family: "Oxygen", sans-serif;
		    font-size   : 15px;
		    line-height : 26px;
		    color       : #3a4750;
		    font-weight : 300;
		    background: #fff;
		    overflow-x:hidden;}


		table {
		    font-family: arial, sans-serif;
		    border-collapse: collapse;
		    width: 100%;
		}

		td, th {
		    border: 1px solid #dddddd;
		    text-align: left;
		    padding: 8px;

		}

		th{
		    background-color: #252c35;
		     color: white;
		}

		.empty{height: 400px;}
		</style>
		</head>

		<body>
		  <div class="container">

		    <div class="row">
		        <div class="col-md-4">
		              <h1>'.$data[0]->name.'</h1> 
		        </div>

		      <div class="col-md-4">
		          <h2>Ending Date</h2>
		      </div>

		        <div class="col-md-4">
		           <h2>SO# 98765</h2>
		        </div>
		    </div>


		<div class="row">

		    <div class="col-md-5">

		          <table>
		            <tr>
		              <th>Customer Name: </th>
		              
		            </tr>
		            <tr>
		              <td>'.$data[0]->name.'</td>
		              
		            </tr>
		            
		          </table>
		    </div>

		<div class="col-md-3">
		          <table>
		          <tr>
		            
		            
		          </tr>
		          <tr>
		            <td> <p>Customer PO:<b> 908</b></p>
		        <p>Sales Rep: <b>Not Set</b></p>
		        <p>Project Mgr: <b>Eabangalore</b></p>
		        <p>Prod. Mgr: <b>Eabangalore</b></p></td>
		            
		            
		            
		          </tr>
		          
		        </table>
		</div>

		<div class="col-md-3">
		  <table>
		  <tr>
		    
		    
		  </tr>
		  <tr>
		    <td><p>In Hand Date: <b>Not Set</b></p>
		<p>Install Date: <b>Not Set</b></p>
		<p>Hard Due Date: <b>Not Set</b></p>
		<p>Art Due Date: <b>Not Set</b></p></td>
		    
		    
		    
		  </tr>
		  
		</table>
		</div>
		</div>

		<div class="row">
		    <div class="col-md-5">

		<table>
		  <tr>
		    <th>Ship To: </th>
		    
		  </tr>
		  <tr>
		    <td>None

		   Ship Method: None
		Ship Date: 12/13/2017</td>
		    
		  </tr>
		  
		</table>
		</div>

		    <div class="col-md-4">

		<table>
		  <tr>
		    <th>Bill To: </th>
		    
		  </tr>
		  <tr>
		    <td>None</td>
		    
		  </tr>
		  
		</table>
		</div>
		</div>

		<div class="row">
		    <div class="col-md-5">

		<table>
		  <tr>
		    <th>Install To: </th>
		    
		  </tr>
		  <tr>
		    <td><p>Zubair Ahmed</p>
		<p>#141 narasipura layout</p>
		<p>narasipura</p>
		<p>Bangalore, Karnataka, 560097, India</p>
		<p>Attn:Tanveer</p></td>
		    
		  </tr>
		  
		</table>
		</div>
		<div class="col-md-6">
		  <table>
		  <tr>
		    
		    
		  </tr>
		  <tr>
		    <td> <p>  </p></td>
		    
		    
		    
		  </tr>
		  
		</table>
		</div>
		</div>

		<div class="row">
		    <div class="col-md-5">

		<table>
		  <tr>
		    <th>Shipping Details: </th>
		    
		  </tr>
		  <tr>
		    <td><p>ape goods</p>
		</td>
		    
		  </tr>
		 
		</table>
		</div>
		</div>

		<div class="row">
		    <div class="col-md-5">

		<table>
		  <tr>
		    <th>Production details: </th>
		    
		  </tr>
		  <tr>
		    <td><p>ziggle machine</p>
		</td>
		    
		  </tr>
		  
		</table>
		</div>
		</div>

		<div class="row">
		    <div class="col-md-5">

		<table>
		  <tr>
		    <th>Description: </th>
		    
		  </tr>
		  <tr>
		    <td><p>Printing susex has to be delivered</p>
		</td>
		    
		  </tr>
		  
		</table>
		</div>
		</div>


		<div class="row">
		    <div class="col-md-5">

		<table>
		  <tr>
		    <th>Other Details: </th>
		    
		  </tr>
		  <tr>
		    <td><p>Quantity: 16.0
		Local File:</p>
		</td>
		    
		  </tr>
		  
		</table>
		</div>
		</div>

		</div>
		</body>
		</html>';

$html2 = '<html>
<head>    
<title>Invoice</title>
<style type="text/css">
	#page-wrap {
		width: 700px;
		margin: 0 auto;
	}
	.center-justified {
		text-align: justify;
		margin: 0 auto;
		width: 30em;
	}
	table.outline-table {
		border: 1px solid;
		border-spacing: 0;
	}
	tr.border-bottom td, td.border-bottom {
		border-bottom: 1px solid;
	}
	tr.border-top td, td.border-top {
		border-top: 1px solid;
	}
	tr.border-right td, td.border-right {
		border-right: 1px solid;
	}
	tr.border-right td:last-child {
		border-right: 0px;
	}
	tr.center td, td.center {
		text-align: center;
		vertical-align: text-top;
	}
	td.pad-left {
		padding-left: 5px;
	}
	tr.right-center td, td.right-center {
		text-align: right;
		padding-right: 50px;
	}
	tr.right td, td.right {
		text-align: right;
	}
	.grey {
		background:grey;
	}
</style>
</head>
<body>
	<div id="page-wrap">
		<table width="100%">
			<tbody>
				<tr>
					<td width="30%">
						<img src="https://www.ebsprints.com/images/logoebs.png"> <!-- your logo here -->
					</td>
					<td width="70%">
						<h2>Tax Invoice</h2><br>
						<strong>Date:</strong> <?php echo date(\'d/M/Y\');?><br>
						<strong>Billing Cycle:</strong> 01/01/2013 to 01/02/2013<br>
						<strong>Invoice Number:</strong> BF123<br>
						<strong>Due Date:</strong> 10/01/2013<br>
					</td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="2">
						<div class="center-justified">
							<strong>Invoice To:</strong> FooBar
							<strong>Invoice Amount:</strong> Rs. 11,236
						</div>
					</td>
				</tr>
			</tbody>
		</table>
		<p>&nbsp;</p>
		<table width="100%" class="outline-table">
			<tbody>
				<tr class="border-bottom border-right grey">
					<td colspan="3"><strong>Summary</strong></td>
				</tr>
				<tr class="border-bottom border-right center">
					<td width="45%"><strong>Activity</strong></td>
					<td width="25%"><strong>Tax</strong></td>
					<td width="30%"><strong>Amount (INR)</strong></td>
				</tr>
				<tr class="border-right">
					<td class="pad-left">Summary Line item 1</td>
					<td class="center">Tax percent (12.36%)</td>
					<td class="right-center">Rs. 11,236</td>
				</tr>
			    <tr class="border-right">
					<td class="pad-left">Summary Line item 1</td>
					<td class="center">Tax percent (12.36%)</td>
					<td class="right-center">Rs. 11,236</td>
				</tr>

				<tr class="border-right">
					<td class="pad-left">Summary Line item 1</td>
					<td class="center">Tax percent (12.36%)</td>
					<td class="right-center">Rs. 11,236</td>
				</tr>


				<tr class="border-right">
					<td class="pad-left">Summary Line item 1</td>
					<td class="center">Tax percent (12.36%)</td>
					<td class="right-center">Rs. 11,236</td>
				</tr>


				<tr class="border-right">
					<td class="pad-left">Summary Line item 1</td>
					<td class="center">Tax percent (12.36%)</td>
					<td class="right-center">Rs. 11,236</td>
				</tr>
				<tr class="border-right">
					<td class="pad-left">&nbsp;</td>
					<td class="right border-top">Subtotal</td>
					<td class="right border-top">Rs. 10,000</td>
				</tr>
				<tr class="border-right">
					<td class="pad-left">&nbsp;</td>
					<td class="right border-top">Tax</td>
					<td class="right border-top">Rs. 1236</td>
				</tr>
				<tr class="border-right">
					<td class="pad-left">&nbsp;</td>
					<td class="right border-top">Total</td>
					<td class="right border-top">Rs. 11,236</td>
				</tr>
			</tbody>
		</table>
		<p>&nbsp;</p>
		<table width="100%" class="outline-table">
			<tbody>
				<tr class="border-bottom border-right grey">
					<td colspan="3"><strong>Usage Line Item 1</strong></td>
				</tr>
				<tr class="border-bottom border-right center">
					<td width="45%"><strong>Description</strong></td>
					<td width="25%"><strong>Date</strong></td>
					<td width="30%"><strong>Amount (INR)</strong></td>
				</tr>
				
				<tr class="border-right">
					<td class="pad-left">Line item 1.1 desc</td>
					<td class="center">Usage date</td>
					<td class="right-center">Amount</td>
				</tr>
				
			</tbody>
		</table>
		<p>&nbsp;</p>
		
		<table width="100%">
			<tbody>
				<tr>
					<td width="50%">
						<div class="center-justified"><strong>To make a payment:</strong><br>
							Your payment options<br>
							<strong>ST Reg no:</strong> Your service tax number<br>
							<strong>Service Category:</strong> Service tax category<br>
							<strong>Service category code:</strong> Service tax code<br>
						</div>
					</td>
					<td width="50%">
						<div class="center-justified">
						<strong>Address</strong><br>
						Foo Baar<br>
						Dubai<br>
						Dubai Main Road<br>
						Vivekanandar Street<br>
					</td>
				</tr>
			</tbody>
		</table>
		<p>&nbsp;</p>
		<table>
			<tbody>
				<tr>
					<td>
						No human was involved in creating this invoice, so, no signature is needed
					</td>
				</tr>
			</tbody>
		</table>
	</div>
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

         $filePath = $publicPath.'/generated_pdf/'.$formatedDate.$customer_name.$uniqid.'.pdf';
         
         file_put_contents($filePath, $output);  

         $email = 'ejazanwar777@gmail.com';//$request->email;

	     $data = ['name'=>'Ejaz Anwar','study'=>'eng'];


	     $usableVariables = ['genfile'=>$filePath,'email'=>$email];

	     /* code for multiple cc or bcc


			// 	     $emails = ['myoneemail@esomething.com', 'myother@esomething.com','myother2@esomething.com'];

			// Mail::send('emails.welcome', [], function($message) use ($emails)
			// {    
			//     $message->to($emails)->subject('This is test e-mail');    
			// });
			// var_dump( Mail:: failures());
			// exit;

       */



\Mail::send('email-invoice.invoice', ['data'=>$data], function ($message) use ($usableVariables) {
         
	         $publicPath = public_path(); 

		     $message->from('ejazanwar777@gmail.com', 'My Email');

		     $message->to($usableVariables['email'])->subject('The subject');

	         $message->attach($usableVariables['genfile']);   


	    });    

	    if (\Mail::failures()) {
	        // return response showing failed emails

	        return redirect()->back()->with('error', 'Some Error Has Occured While Sending Mail!');
	     }

	    // otherwise everything is okay ... 


	    \App\new_job::where('id', $id)->update(['invoice_sent'=>'classForInvoiceSent','title_for_invoice_sent'=>'Invoice is Already Been Sent','invoice_sent_time'=>$date,'all_sent_invoice'=>1]); 

	    return redirect()->back()->with('message', 'Invoice Has Been Sent Successfully!');


    }
}
