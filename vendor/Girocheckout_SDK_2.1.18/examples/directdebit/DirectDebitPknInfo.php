<?php
define('__GIROCHECKOUT_SDK_DEBUG__',true);

/**
 * Sample code for GiroCheckout integration of a direct debit transaction: AUTH + CAPTURE
 *
 * Call through web server in two steps:
 * 1) Without arguments for initial AUTH transaction: http://localhost/DirectDebitCapture.php, copy displayed reference
 * 2) With reference code from AUTH for CAPTURE, parameter mode=cap (for capture), parameter ref for reference: 
 * http://localhost/DirectDebitCapture.php?mode=cap&ref=43290-48329043-43289
 * 
 * @filesource
 * @package Samples
 * @version $Revision: 176 $ / $Date: 2017-01-09 13:29:27 -0300 (Mon, 09 Jan 2017) $
 */
require_once '../../GiroCheckout_SDK/GiroCheckout_SDK.php';

/**
 * configuration of the merchants identifier, project and password
 * this information can be found in the GiroCockpit's project settings
 */
$merchantID = 0;        // Your merchant ID (Verkaufer-ID)
$projectID = 0;         // Your project ID (Projekt-ID)
$projectPassword = "";  // Your project password

$strReference = "";

/* init dd transaction and parameters */
try {
  $request = new GiroCheckout_SDK_Request('directDebitGetPKN');
  $request->setSecret($projectPassword);
  $request->addParam('merchantId',$merchantID)
          ->addParam('projectId',$projectID)
          ->addParam('reference', '132d6a79-b318-4f94-b0a6-c07443fd8217')
      //the hash field is auto generated by the SDK
          ->submit();

  echo "<pre>"; print_r($request->getResponseRaw()); echo "</pre><br/>";

  /* if transaction succeeded update your local system and redirect the customer */
  if($request->requestHasSucceeded()) {
     $strReference = $request->getResponseParam('reference');
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
