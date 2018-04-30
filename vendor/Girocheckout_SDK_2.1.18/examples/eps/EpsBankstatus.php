<?php
/**
 * sample code for GiroCheckout integration of a giropay-ID check
 *
 * @filesource
 * @package Samples
 * @version $Revision: 31 $ / $Date: 2014-06-11 09:55:39 +0200 (Mi, 11 Jun 2014) $
 */
require_once '../../GiroCheckout_SDK/GiroCheckout_SDK.php';

/**
 * configuration of the merchants identifier, project and password
 * this information can be found in the GiroCockpit's project settings
 */
$merchantID = 0;        // Your merchant ID (Verkaufer-ID)
$projectID = 0;         // Your project ID (Projekt-ID)
$projectPassword = "";  // Your project password

/* giropay Bankstatus transaction and parameters */
try {
	$request = new GiroCheckout_SDK_Request("epsBankstatus");
	$request->setSecret($projectPassword);
	$request->addParam('merchantId',$merchantID)
	        ->addParam('projectId',$projectID)
	        ->addParam('bic','HYPTAT22')
	    //the hash field is auto generated by the SDK
	        ->submit();
	
	/* if request was successful show customer weather paying with giropay is possible or not */
	if($request->requestHasSucceeded())
	{
	     $request->getResponseParam('rc');
	     $request->getResponseParam('msg');
	     $request->getResponseParam('bankcode');
	     $request->getResponseParam('bic');
	     $request->getResponseParam('bankname');
	}
	
	/* if the transaction did not succeed update your local system, get the responsecode and notify the customer */
	else {
	    $request->getResponseParam('rc');
	    $request->getResponseParam('msg');
	    $request->getResponseMessage($request->getResponseParam('rc'),'DE');
	}
}
catch (Exception $e) { echo $e->getMessage(); }