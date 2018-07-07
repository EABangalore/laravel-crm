<?php

namespace App\Http\Controllers;

require '../vendor/autoload.php';   


 //require_once '../vendor/jonnyw/php-phantomjs/src/JonnyW/PhantomJs/Client.php';   


use Illuminate\Http\Request;

use JonnyW\PhantomJs\Client;

class phantomjs extends Controller
{
   

  public function index(){


    $client = Client::getInstance();

    /** 
     * @see JonnyW\PhantomJs\Http\PdfRequest
     **/
    $request = $client->getMessageFactory()->createPdfRequest('http://jonnyw.me', 'GET');
    $request->setOutputFile('document.pdf');
    $request->setFormat('A4');
    $request->setOrientation('landscape');
    $request->setMargin('1cm');

    /** 
     * @see JonnyW\PhantomJs\Http\Response 
     **/
    $response = $client->getMessageFactory()->createResponse();

    // Send the request
    $client->send($request, $response);


  }  

}
