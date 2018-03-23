<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
/**
 * Checkout component
 */
class CheckoutComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    
         public function checkout($orders) {
      //$this->render(true); 

 foreach($orders as $order){
 $transactionsTable = TableRegistry::get('Transactions');
 $transaction = $transactionsTable->newEntity();
 $transaction->transaction_type_id=1;
 $transaction->product_id=$order->product_id;
 $transaction->created_date=Time::now();
 $transaction->quantity=$order->quantity;
    $transaction->price=$order->price;
//$transaction->user_id= $this->Auth->user('id');
$transaction->transaction_status_id=$order->transaction_status_id;
//$transaction->transaction_number=$result->transaction->id;
//$transaction->color_id=$color->id;
//$transaction->size_id=$size->id;
$transactionsTable->save($transaction); 
 }
     //$total = $total + ($name2[$product->id]*$product['price']);


     } 
          public function findcart($userid) {
              $transid=[]; $i=0;
               $usersTable = TableRegistry::get('Transactions');
              $product =$usersTable->find(); 
              
               foreach($product as $trans){
                  
                   if($userid==$trans->user_id && $trans->transaction_status_id==1){
                      array_push($transid,$trans->id);
                   
                        $i++;
                   }
               }
             return $transid;
            
          }
      
            public function findorder($userId){
    $bestid='';
              $usersTable = TableRegistry::get('Transactions');
              $product =$usersTable->find(); 
              foreach($product as $trans){
              if( $trans->user_id===$userId && $trans->transaction_status_id===2){
                $bestid=$trans->order_number;
                      }
              }
              return $bestid;
          }
public function verifyAddress($ucheckoutid){
$addressflag=0;
$this->UsersDetail = TableRegistry::get('UsersDetail');
$useraddress= $this-> UsersDetail->find() ;
foreach ($useraddress as $address){
   if($ucheckoutid==$address->user_id) {
       $addressflag=1;
   }
}
return $addressflag;
}
    
}
