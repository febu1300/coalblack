<?php
/**
 * Sample code for GiroCheckout integration of a blue code transaction
 *
 * @filesource
 * @package Samples
 * @version $Revision: 176 $ / $Date: 2017-01-09 13:29:27 -0300 (Mon, 09 Jan 2017) $
 */
//apache_setenv( "GIROCHECKOUT_SERVER", "http://localhost.gs" );
apache_setenv( "GIROCHECKOUT_SERVER", "https://dev.girosolution.de" );
require_once '../../GiroCheckout_SDK/GiroCheckout_SDK.php';

/**
 * Configuration of the merchants identifier, project and password
 * this information can be found in the GiroCockpit's project settings
 */
//$merchantID = 0;        // Your merchant ID (Verkaufer-ID)
//$projectID = 0;         // Your project ID (Projekt-ID)
//$projectPassword = "";  // Your project password 
$merchantID = 350000;
$projectID = 9334;
$projectPassword = "KJyZyZk9A4o5";

/* init giropay transaction and parameters */
try {
	$request = new GiroCheckout_SDK_Request('blueCodeTransaction');
	$request->setSecret($projectPassword);
	$request->addParam('merchantId',$merchantID)
	        ->addParam('projectId',$projectID)
	        ->addParam('merchantTxId', uniqid("", TRUE))
	        ->addParam('amount',150)
	        ->addParam('currency','EUR')
	        //->addParam('barcode','27324080')
	        ->addParam('branch','default')
	        ->addParam('slip', uniqid("", TRUE))   
	        ->addParam('slipDateTime', date('Y-m-d\TH:i:sP'))
	        ->addParam('purpose','Beispieltransaktion')
	        //->addParam('recurringID','0')
          ->addParam('urlRedirect','https://dev.girosolution.de/redirect.php')
          ->addParam('urlNotify','https://dev.girosolution.de/notify.php')

	        //the hash field is auto generated by the SDK
	        ->submit();
	
  //echo "<pre>";print_r($request->getResponseRaw());echo "</pre>";
  
	/* if transaction succeeded update your local system an redirect the customer */
	if($request->requestHasSucceeded()) {
    $request->getResponseParam('rc');
    $request->getResponseParam('msg');
    $request->getResponseParam('reference');
    $request->getResponseParam('redirect');

    $request->redirectCustomerToPaymentProvider();
	}
	/* if the transaction did not succeed update your local system, get the responsecode and notify the customer */
	else {
    $request->getResponseParam('rc');
    $request->getResponseParam('msg');
    $request->getResponseMessage($request->getResponseParam('rc'),'DE');
	}
}
catch (Exception $e) { echo $e->getMessage(); }