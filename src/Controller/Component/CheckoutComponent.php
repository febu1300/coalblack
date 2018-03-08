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

$total=0;
$pro = array();


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
    
    
    
}
