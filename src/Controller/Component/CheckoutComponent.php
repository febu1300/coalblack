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
    

public function findEmail($useremail){
      $usersTable = TableRegistry::get('Users');
      
      $product =$usersTable->get($useremail);
   return $product->username;
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
              $usersTable = TableRegistry::get('Transactions');
              $product =$usersTable->find(); 
              foreach($product as $trans){
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
    
}
