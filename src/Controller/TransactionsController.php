<?php

namespace App\Controller;
use Cake\I18n\Time;
use App\Controller\AppController;
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
/**
 * Transactions Controller
 *
 * @property \App\Model\Table\TransactionsTable $Transactions
 *
 * @method \App\Model\Entity\Transaction[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TransactionsController extends AppController
{
    public function initialize() {
        parent::initialize();
        $this->loadModel('subCatagories');
        $this->loadModel('Products');
        $this->loadModel('Transactions');
//          $this->loadModel('Colors');
//        $this->loadModel('Sizes');

    }
          public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
    public function pay(){
       

          $items=[];
        $GesamtMenge=0;
    
          $apiContext = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            'AVCrZPxpI14gLQgZL5rv5aWBLptPDAoU9pNDqzKNrYXnXyZ_RklwfpMozm2LSswQ0gbAES-AEvDsY40U',     // live
            'EOw7DE34g2oD4dfs3TkMb_VLF-L6KYOdVaO_BTVgYpgHjkG9AbJhkyUq_FEEba0zyHgTV8iLwd0x-6cE'      // ClientSecret
        )
);
//                   $apiContext = new \PayPal\Rest\ApiContext(
//        new \PayPal\Auth\OAuthTokenCredential(
//            'AV_L97AUWNwh2xDxDaRvoxqbjuoTwgsRRWqZj1659VKa0arzNNTlfw-4r-L34cAqcRdLnfY7YKzrNRKO',     // sandbox
//            'EFmqGVhUmhBI2FDxZNbJ8_Hu5sMoC76SX4mWHPl8shVUpzRmF_F09f0REefGZlr5FCoC4mQyg_9ECY2d'      // ClientSecret
//        )
//);
          
//          $apiContext = new \PayPal\Rest\ApiContext(
//        new \PayPal\Auth\OAuthTokenCredential(
//            'Aa8Z4Q36vAUdFw6KKwrhl4pJGA2YMYgiv5U4SII5mXa2xEz6jDIGg-eSEFIbeYNTMQCVvP6ogYqrqyXq',     // ClientID
//            'EMrQwNR6iip3H749rOfcU0kEnhHB7nSghlimZsYy6Fn4ggSuI5Dgs1H21gv64OL_LhkW37IL43FLLlXP'      // ClientSecret
//        )
//);
            
     $payer = new \PayPal\Api\Payer();
$payer->setPaymentMethod('paypal');
//           $this->paginate = [
//            'contain' => ['Products', 'TransactionTypes','TransactionsStatus']
//        ];
//        $transactions = $this->paginate($this->Transactions);
//
//        $this->set(compact('transactions'));
          
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
             $colorname1 =  $productname1;
            $name2 = $session->read($colorname1);
            $this->set('name2', $name2);

            if ($product->online_vorhanden && $product->photo && $name2) {
            
 $transactionsTable = TableRegistry::get('Transactions');
 $transaction = $transactionsTable->newEntity();
 $transaction->transaction_type_id=1;                   //transaction type Verkauf
 $transaction->product_id=$product->id;
 $transaction->created_date=Time::now();
 $transaction->quantity=$name2[$product->id];
 $transaction->price=$product->price;
//$transaction->user_id= $this->Auth->user('id');
$transaction->transaction_status_id=1;                  // in warenkorb
//$transaction->transaction_number=$result->transaction->id;
//$transaction->color_id=$color->id;
//$transaction->size_id=$size->id;
$transactionsTable->save($transaction); 
             $item1 = new \PayPal\Api\Item();
$item1->setName($product->product_name) 
        ->setCurrency('EUR')
        ->setQuantity($name2[$product->id]) 
        ->setSku($transaction->id) // Similar to `item_number` in Classic API 
        ->setPrice($product->price);
      // $total = $total + ($name2[$product->id]*$product['product_price']);
   array_push($items,$item1);
   $GesamtMenge=$GesamtMenge+$transaction->price*$transaction->quantity;
   
            } else {
          
            }
//            }}
   
      
        }
//   $prodd= $this->request->query('name');
//   //$value=$this->Transaction->get($value);
//   pr($prodd);die();

 if($this->request->is('post')){
     $selMeth=$this->request->getData();
  
if(  $selMeth['customRadio']=='1'){         //payment
  //pr($selMeth['customRadio']);die();
    //$payer->setPayerInfo('here payer info');
//$item1 = new \PayPal\Api\Item();
//$item1->setName('Ground Coffee 40 oz') 
//        ->setCurrency('EUR')
//        ->setQuantity(1) 
//        ->setSku("123123") // Similar to `item_number` in Classic API 
//        ->setPrice(7.5);
//$item2 = new \PayPal\Api\Item(); 
//$item2->setName('Granola bars') 
//        ->setCurrency('EUR')
//        ->setQuantity(5) 
//        ->setSku("321321") // Similar to `item_number` in Classic API 
//        ->setPrice(2);
$itemList = new \PayPal\Api\ItemList(); 
$itemList->setItems($items);

$details = new \PayPal\Api\Details(); 
$details->setShipping(1.2) 
        ->setTax(1.3)
        ->setSubtotal($GesamtMenge);
        


$amount = new \PayPal\Api\Amount();
           $amount->setDetails($details)
                   ->setTotal($GesamtMenge+1.3+1.2)
            ->setCurrency('EUR');



$transaction = new \PayPal\Api\Transaction();
$transaction->setAmount($amount)
        ->setItemList($itemList)
 
      
            
    ->setDescription("here description") 
    ->setInvoiceNumber(uniqid());
$redirectUrls = new \PayPal\Api\RedirectUrls();
$redirectUrls->setReturnUrl("http://coalblack/products")
    ->setCancelUrl("http://coalblack/transactions");

$payment = new \PayPal\Api\Payment();
$payment->setIntent('sale')
        ->setId('id')
        ->setPayer($payer)
        ->setTransactions(array($transaction))
        ->setRedirectUrls($redirectUrls);
try {
    $payment->create($apiContext);
  // echo $payment;
$approvalUrl=$payment->getApprovalLink();
 return $this->redirect($payment->getApprovalLink());
//header("Location: {$approvalUrl}");
   //echo "\n\nRedirect user to approval_url: " . $payment->getApprovalLink() . "\n";
}
catch (\PayPal\Exception\PayPalConnectionException $ex) {
    // This will print the detailed information on the exception.
    //REALLY HELPFUL FOR DEBUGGING
    echo $ex->getData();
}
}else if($selMeth['customRadio']==2){       //sofort überweisung

 
}else{}

//return $this->redirect(['controller' => 'transactions', 'action' => 'success']);   
     //}  
    } }

public function success()
{
    
}
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['TransactionTypes', 'Products', 'Users','TransactionsStatus']
        ];
        $transactions = $this->paginate($this->Transactions);

        $this->set(compact('transactions'));
    }
public function add() {
      $this->render(false);

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
                $colorname1=$productname1;
                    $name2 = $session->read($colorname1);
                    $this->set('name2', $name2);

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
    
          }}}
//                    }
//                }
//            }
//        }
        if (count($name2) < 1) {
            return 0;
        }

      $count=0;

        foreach ($products as $product) {
//        foreach ($colors as $color) {
//              foreach ($sizes as $size) {
            $productname = explode(" ", $product->product_name);
            $productname1 = implode("", $productname);
             
           // $colorname1 =  $productname1."_".$color->color."_".$size->size;
            $colorname1 =  $productname1;
            $name2 = $session->read($colorname1);
            $this->set('name2', $name2);

            if ($product->online_vorhanden && $product->photo && $name2) {
          
                 
       $count = $count + ($name2[$product->id]);

            } else {
//          
//            }
//  }  
    }}
        //$count = 0;
        //$this->set(compact($productname1,$name2));

        echo $count;
           $session->write('count', $count);
    }

    // return $this->redirect(['controller' => 'Pages', 'action' => 'display','home']);

    public function view() {
$total=0;
$pro = array();

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
             $colorname1 =  $productname1;
            $name2 = $session->read($colorname1);
            $this->set('name2', $name2);

            if ($product->online_vorhanden && $product->photo && $name2) {
          
                 
       $total = $total + ($name2[$product->id]*$product['product_price']);
   
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
    }

    public function edit($id = null)
    {
        $transaction = $this->Transactions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transaction = $this->Transactions->patchEntity($transaction, $this->request->getData());
            if ($this->Transactions->save($transaction)) {
                $this->Flash->success(__('The transaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transaction could not be saved. Please, try again.'));
        }
        $transactionTypes = $this->Transactions->TransactionTypes->find('list', ['limit' => 200]);
        $products = $this->Transactions->Products->find('list', ['limit' => 200]);
        $users = $this->Transactions->Users->find('list', ['limit' => 200]);
        $this->set(compact('transaction', 'transactionTypes', 'products', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    
public function delete($prod = null, $col=null, $siz=null)
    {

$prodd= $this->request->query('prod');
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
        $colorname1 =  $productname1; 
        $session = $this->request->session();
          $name3 = $session->read($colorname1);
          $this->set('name3', $name3);
         
           $count1 = $session->read('count');
             $this->set('count', $count1);
             $count2=$count1-$name3[$product->id];
            
          if( $colorname1){
           
          $session->delete( $colorname1);
           $session->write('count',$count2);
            //$this->Flash->success(__('The item is removed from your shoping cart'));
        } else {
            $this->Flash->error(__('The item is removed from your shoping cart Please, try again.'));
        }

        return $this->redirect(['controller'=>'transactions','action' => 'view']);
    }
}
