<?php
/**
 * sample code for GiroCheckout integration of a credit card transaction
 *
 * @filesource
 * @package Samples
 * @version $Revision: 156 $ / $Date: 2016-06-29 14:17:03 -0300 (Mi, 29 Jun 2016) $
 */
require_once '../../GiroCheckout_SDK/GiroCheckout_SDK.php';

/**
 * configuration of the merchants identifier, project and password
 * this information can be found in the GiroCockpit's project settings
 */
$merchantID = 0;        // Your merchant ID (Verkaufer-ID)
$projectID = 0;         // Your project ID (Projekt-ID)
$projectPassword = "";  // Your project password

/* perform a credit card recurring transaction */
try {
	$request = new GiroCheckout_SDK_Request('creditCardRecurringTransaction');
	$request->setSecret($projectPassword);
	$request->addParam('merchantId',$merchantID)
	        ->addParam('projectId',$projectID)
	        ->addParam('merchantTxId',1234567890)
	        ->addParam('amount',100)
	        ->addParam('currency','EUR')
	        ->addParam('purpose','Kreditkartentransaktion')
	        ->addParam('pkn','20e608c29494a8404ef2fba9ac0b68a1')
	        ->addParam('recurring',1)
	    //the hash field is auto generated by the SDK
	        ->submit();
	
	/* if payment succeededed update your local system */
	if($request->paymentSuccessful())	{
    $request->getResponseParam('reference');
    $request->getResponseParam('backendTxId');
    $request->getResponseParam('resultPayment');
	}	
	/* if the transaction did not succeed update your local system, get the responsecode and notify the customer */
	else {
    $request->getResponseParam('rc');
    $request->getResponseParam('msg');
    $request->getResponseMessage($request->getResponseParam('rc'),'DE');
    $request->getResponseMessage($request->getResponseParam('resultPayment'),'DE');
	}
}
catch (Exception $e) { echo $e->getMessage(); }