<?php
define('__GIROCHECKOUT_SDK_DEBUG__',true);

/**
 * Sample code for GiroCheckout integration of a paydirekt void transaction
 *
 * Call through web server in two steps:
 * 1) Without arguments for initial AUTH transaction: http://localhost/PaydirektVoid.php, copy displayed reference
 * 2) With reference code from AUTH for VOID, parameter mode=void, parameter ref for reference:
 * http://localhost/PaydirektCapture.php?mode=void&ref=43290-48329043-43289
 * 
 * @filesource
 * @package Samples
 * @version $Revision: 109 $ / $Date: 2015-06-01 13:37:30 +0200 (Mo, 01 Jun 2015) $
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

if( isset($_GET["mode"]) ) {
  $mode = $_GET["mode"];
}
if( isset($_GET["ref"]) ) {
  $ref = $_GET["ref"];
}

if( !isset($mode) ) {
  /* STEP 1: init Paydirekt AUTH transaction and parameters */
  try {

    $oCart = new GiroCheckout_SDK_Request_Cart();
    $oCart->addItem( "Bobbycar", 3, 2599, "800001303" );
    $oCart->addItem( "Helm", 1, 1853 );

    $request = new GiroCheckout_SDK_Request('paydirektTransaction');
    $request->setSecret($projectPassword);
    $request->addParam('merchantId',$merchantID)
            ->addParam('projectId',$projectID)
            ->addParam('merchantTxId',"123456")
            ->addParam('amount',5050)
            ->addParam('currency','EUR')
            ->addParam('purpose','Zweck')
            ->addParam('type', 'AUTH')
            ->addParam('shippingAmount','0')
            ->addParam('shippingAddresseFirstName','Heiko')
            ->addParam('shippingAddresseLastName','Meier')
            ->addParam('shippingZipCode','88699')
            ->addParam('shippingCity','Frickingen')
            ->addParam('shippingCountry','DE')
            ->addParam('orderAmount',123)
            ->addParam('orderId','9837898')
            ->addParam('cart', $oCart)
            ->addParam('urlRedirect','https://dev.girosolution.de/redirect.php')
            ->addParam('urlNotify','https://www.my-domain.de/girocheckout/redirect.php')

            //the hash field is auto generated by the SDK
            ->submit();

    //echo "<pre>"; print_r($request->getResponseRaw()); echo "</pre><br/>";

    // if transaction succeeded update your local system and redirect the customer
    if($request->requestHasSucceeded()) {
      $request->getResponseParam('rc');
      $request->getResponseParam('msg');
      $strReference = $request->getResponseParam('reference');
      $request->getResponseParam('redirect');

      $request->redirectCustomerToPaymentProvider();
    }

    // if the transaction did not succeed update your local system, get the responsecode and notify the customer
    else {
      $request->getResponseParam('rc');
      $request->getResponseParam('msg');
      $request->getResponseMessage($request->getResponseParam('rc'),'DE');
    }
  }
  catch (Exception $e) { echo $e->getMessage(); }
}
elseif( $mode == "void" ) {

  // STEP 2: Do Capture
  if( !isset($ref) ) {
    echo "Reference must be given as ref parameter.<br/>";
    exit;
  }

  //echo "Orig Trx Ref: $ref<br/>";

  /* init giropay transaction and parameters */
  try {  
    $request = new GiroCheckout_SDK_Request('paydirektVoid');
    $request->setSecret($projectPassword);
    $request->addParam('merchantId',$merchantID)
            ->addParam('projectId',$projectID)
            ->addParam('merchantTxId',"123456")
            ->addParam('reference', $ref)

            //the hash field is auto generated by the SDK
            ->submit();

    echo "<pre>"; print_r($request->getResponseRaw()); echo "</pre><br/>";

    /* if transaction succeeded update your local system an redirect the customer */
    if($request->requestHasSucceeded()) {
      $request->getResponseParam('rc');
      $request->getResponseParam('msg');
      $request->getResponseParam('reference');
      $request->getResponseParam('resultPayment');

      //$request->redirectCustomerToPaymentProvider();
    }

    /* if the transaction did not succeed update your local system, get the responsecode and notify the customer */
    else {
      $request->getResponseParam('rc');
      $request->getResponseParam('msg');
      $request->getResponseMessage($request->getResponseParam('rc'),'DE');
    }
  }
  catch (Exception $e) {
    echo $e->getMessage();     
  }
}