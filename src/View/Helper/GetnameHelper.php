<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\View\Helper;
use Cake\View\Helper;
use Cake\ORM\TableRegistry;
/**
 * Description of GetnameHelper
 *
 * @author buruk
 */
class GetnameHelper extends Helper {

    public function initialize(array $config) {
  

        parent::initialize($config);
    }
         public function trans_status($q)
    {       $t="";
            
    $payMethT= TableRegistry::get('TransactionsStatus');  
    $method=$payMethT->find()
            ->where(['id'=>$q]);
	
              foreach($method as $methods){
              $t=$methods->status;

              }

    return $t;
    }
            public function trans_type($q)
    {       $t="";
            
    $payMethT= TableRegistry::get('TransactionTypes');  
    $method=$payMethT->find()
            ->where(['id'=>$q]);
	
              foreach($method as $methods){
              $t=$methods->transaction_type_name;

              }

    return $t;
    }
    
     public function paymentmethod($q)
    {       $t="";
            
    $payMethT= TableRegistry::get('PaymentMethods');  
    $method=$payMethT->find()
            ->where(['id'=>$q]);
	
              foreach($method as $methods){
              $t=$methods->method;
          
              
              }

    return $t;
    }
    
    //Get Users
                public function users($q)
    {       $t="";
            
    $payMethT= TableRegistry::get('Users');  
    $method=$payMethT->find()
            ->where(['id'=>$q]);
	
              foreach($method as $methods){
              $t=$methods->fname.' '.$methods->lname;

              }

    return $t;
    }
    
                    public function prods_name($q)
    {       $t="";
            
    $payMethT= TableRegistry::get('Products');  
    $method=$payMethT->find()
            ->where(['id'=>$q]);
	
              foreach($method as $methods){
              $t=$methods->product_name;

              }

    return $t;
    }
    // Cell ViewCart
 
    //put your code here
}
