<?php
/**
 * Sample code for GiroCheckout integration of an iDEAL issuer list request
 *
 * @filesource
 * @package Samples
 * @version $Revision: 156 $ / $Date: 2016-06-29 13:17:03 -0400 (Wed, 29 Jun 2016) $
 */
require_once '../../GiroCheckout_SDK/GiroCheckout_SDK.php';

/**
 * Configuration of the merchants identifier, project and password
 * this information can be found in the GiroCockpit's project settings
 */
$merchantID = 0;        // Your merchant ID (Verkaufer-ID)
$projectID = 0;         // Your project ID (Projekt-ID)
$projectPassword = "";  // Your project password

/* init iDEAL issuer list request */
try {
	$request = new GiroCheckout_SDK_Request('idealPayment');
	$request->setSecret($projectPassword);
	$request->addParam('merchantId',$merchantID)
	    ->addParam('projectId',$projectID)
	    ->addParam('merchantTxId',1234567890)
	    ->addParam('amount',100)
	    ->addParam('currency','EUR')
	    ->addParam('purpose','iDEAL Zahlung')
	    ->addParam('urlRedirect','https://www.my-domain.de/girocheckout/redirect-ideal')
	    ->addParam('urlNotify','https://www.my-domain.de/girocheckout/notify-ideal')
	    ->addParam('issuer','RABOBANK')
	    //the hash field is auto generated by the SDK
	    ->submit();

	/* if request succeeded get the issuer list */
	if($request->requestHasSucceeded()) {
    $request->getResponseParam('reference');
    $request->getResponseParam('redirect');

    $request->redirectCustomerToPaymentProvider();
	}
	/* if the request did not succeed, get the responsecode and notify the customer */
	else {
    $request->getResponseParam('rc');
    $request->getResponseParam('msg');
    $request->getResponseMessage($request->getResponseParam('rc'),'DE');
	}
}
catch (Exception $e) { echo $e->getMessage(); }