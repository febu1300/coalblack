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
 public $components = ['Savetransaction'];

 // Execute any other additional setup for your component.
  
    public function initialize(array $config)
    {

        $this->Savetransaction->foo();
    }
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    

public function findEmail($useremail){
      $usersTable = TableRegistry::get('Users');
      
      $product =$usersTable->get($useremail);
   return $product->username;
}
public function findFulltitle($id){
    //called in transaction/success
      $usersTable = TableRegistry::get('Users');
      
      $product =$usersTable->get($id);
      if($product->title==0){
      return "Lieber".$product->title." ".$product->fname." ".$product->lname."!";
      
      }elseif($product->title==1){
           return "Liebe".$product->title." ".$product->fname." ".$product->lname."!";
      }else{
          return "Liebe/r".$product->title." ".$product->fname." ".$product->lname."!";
      }
}
public function findFullname($id){
    //called in transaction/success
      $usersTable = TableRegistry::get('Users');
      
      $product =$usersTable->get($id);
         return $product->fname." ".$product->lname;
}
public function findPaymentId($useremail){
    $usersTable = TableRegistry::get('PaymentMethods');
    $usersTable->find('all',[]);
              foreach($useremail as $trans){
                     $p= $usersTable->find('all',['id'=>$trans->payment_method_id]);
                    foreach( $p as $t){
                  return $t->method;
                    }
                    
}
  die();
}
    public function   findtId($userid,$prId) {
            $usersTable = TableRegistry::get('Transactions');
              $product =$usersTable->find(); 
              foreach($product as $trans){
                     if($userid==$trans->user_id && $trans->transaction_status_id==1 && $trans->product_id===$prId){
                       return  $trans->id;  
                     }
              }
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
              $transTable = TableRegistry::get('Transactions');
              $transaction =$transTable->find(); 
              foreach($transaction as $trans){
              if( $trans->user_id===$userId && $trans->transaction_status_id===2){
                $bestid=$trans->order_number;
                      }
              }
              return $bestid;
          }
                   public function finduserdet($bestId){
   $useid='';
              $usersTable = TableRegistry::get('Transactions');
              $product =$usersTable->find(); 
              foreach($product as $trans){
              if( $trans->order_number===$bestId ){
                $useid=$trans->user_id;
                      }
              }
              return $useid;
          }
          public function userdetUserid($ucheckoutid){


$useDetTable = TableRegistry::get('UsersDetail'); 
          $useraddress= $useDetTable->find('all',['id'=>$ucheckoutid]) ;
          foreach ($useraddress as $useradd){    
              return $useradd->user_id;  }
      

          }
          
public function verifyAddress($ucheckoutid){


$this->UsersDetail = TableRegistry::get('UsersDetail');
$useraddress= $this-> UsersDetail->find() ;

foreach ($useraddress as $address){
 
   if($ucheckoutid===$address->user_id) {

       return 1;
   }else{
      
     
   }
}
  return 0;
}
public function userDetExists($ucheckoutid){


$this->UsersDetail = TableRegistry::get('UsersDetail');
$useraddress= $this-> UsersDetail->find('all',['user_id'=>$ucheckoutid]);

foreach ($useraddress as $address){

return $address->id;}
}
      public function   getprice($prId) {
       
            $usersTable = TableRegistry::get('Products');
              $product =$usersTable->find('all',['id'=>$prId]); 
          
              foreach($product as $trans){
                                  if($trans->id==$prId)  {     
                     if($trans->discount_type_id===1 ){
                       return $trans->price; 
                     }elseif($trans->discount_type_id===2){
                               return  $trans->price-$trans->discount;  
                                  }elseif($trans->discount_type_id===3){return  $trans->price-$trans->price*($trans->discount/100);    }
                                  
                                  }
              }
              
    }
    //called in transactions/pay / case 4
    public function savetrans($shipping,$bestlnumr, $uid){
                $session= $this->request->session();
                                $prodTable = TableRegistry::get('Products');
                    $products = $prodTable->find();
                          $transTable = TableRegistry::get('Transactions');
              $trans =$transTable->find(); 

                    foreach ($products as $product) {
                        $productname = explode(" ", $product->product_name);
                        $productname1 = implode("", $productname);

                        $colorname1 = $productname1;
                        $name2 = $session->read($colorname1);
                 
                       // $this->set('name2', $name2);

                        if ($product->online_vorhanden && $product->photo && $name2) {
            $transaction =  $transTable->newEntity();
                            $transaction->transaction_type_id = 1;                   //transaction type Verkauf
                            $transaction->product_id = $product->id;
                            $transaction->created_date = Time::now();
                            $transaction->quantity = $name2[$product->id];
                            $transaction->price = $product->price;
                            $transaction->shipping=$shipping;
                            $transaction->user_id = $uid;
                            $transaction->transaction_status_id = 1;
                            $transaction->payment_method_id = 4;
                            $transaction->order_number = $bestlnumr;
   
                     $transTable->save($transaction);
                        $session->write('bestlnumr', $bestlnumr);
                        }
                    }
        
                return 1;
     
    }
    
    public function saverechnungaddress($uid){
              $transTable = TableRegistry::get('UsersDetail');
              $trans =$transTable->find(); 
        
         $usersDetail = $transTable->newEntity();

    $usersDetail->user_id= $uid; 
          $usersDetail->studio_name=$this->request->getData('studio_name');   
        $usersDetail->address_line_1=$this->request->getData('address_line_1');
        $usersDetail->address_line_2=$this->request->getData('address_line_2');
                 $usersDetail->zusatz=$this->request->getData('zusatz');
        $usersDetail->postal_code=$this->request->getData('postal_code');
        $usersDetail->city=$this->request->getData('city');
        $usersDetail->state=$this->request->getData('state');
        $usersDetail->country=$this->request->getData('country');
        $usersDetail->is_similar=1;
        $usersDetail->user_detail_type_id=2;
        $transTable->save($usersDetail);
return true;
}
public function deleteCartItem(){
     $transTable = TableRegistry::get('Products'); 
         $session = $this->request->session();

                $products =$transTable->find();
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
                    //$this->set('name2', $name2);

                    if ($product->online_vorhanden && $product->photo && $name2) {

                        $count1 = $session->read('count');
                       // $this->set('count', $count1);
                        $count2 = $count1 - $name2[$product->id];
                        $session->delete($colorname1);
                        $session->write('count', $count2);
                    }
                }
                return true;
}

public function editToBestellt($uid){
    
         $transTable = TableRegistry::get('Transactions');
              $transaction =$transTable->find('all',['user_id'=>$uid]); 
                $session = $this->request->session();
       $bestlnumr = $session->read('bestlnumr');

        foreach ($transaction as $trans) {
        if($trans->order_number==$bestlnumr){

//                $thistrans = $this->Transactions->get($trans->id, [
//                    'contain' => ['Products']
//                ]);
                // pr($thistrans['transaction_status_id']);die();
                 $trans->transaction_status_id = 2;
                 $trans->updated_date = Time::now();
                $trans->transaction_number = $bestlnumr;

        $transTable->save($trans);
        
        }
        }
             $session->delete($bestlnumr);
}

        }
