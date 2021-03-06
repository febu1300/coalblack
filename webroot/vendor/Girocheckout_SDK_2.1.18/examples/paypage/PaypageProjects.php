<?php
/**
 * Sample code for GiroCheckout integration of a Payment Page Projects call.
 *
 * @filesource
 * @package Samples
 * @version $Revision: 156 $ / $Date: 2016-06-29 14:17:03 -0300 (Mi, 29 Jun 2016) $
 */
require_once '../../GiroCheckout_SDK/GiroCheckout_SDK.php';

/**
 * Configuration of the merchants identifier, project and password
 * this information can be found in the GiroCockpit's project settings
 */
$merchantID = 0;        // Your merchant ID (Verkaufer-ID)
$projectID = 0;         // Your project ID (Projekt-ID)
$projectPassword = "";  // Your project password

/* init paypage projects request */
try {
	$request = new GiroCheckout_SDK_Request('paypageProjects');
	$request->setSecret($projectPassword);
	$request->addParam('merchantId',$merchantID)
	    ->addParam('projectId',$projectID)
	    //the hash field is auto generated by the SDK
	    ->submit();

  //echo "<pre>";print_r($request->getResponseRaw());echo "</pre>";

	/* if request succeeded get the issuer list */
	if($request->requestHasSucceeded()) {
	  $projects = $request->getResponseParam('projects');
    echo "Projekte: <pre>"; print_r( $projects ); echo "</pre>";
	}
	/* if the request did not succeed, get the responsecode and notify the customer */
	else {
    //$request->getResponseParam('rc');
    //$request->getResponseParam('msg');
    $msg = $request->getResponseMessage($request->getResponseParam('rc'), 'DE');
    echo "Error: $msg";
	}
}
catch (Exception $e) { echo $e->getMessage(); }