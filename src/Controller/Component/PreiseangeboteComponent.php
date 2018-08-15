<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\ORM\TableRegistry;
/**
 * Preiseangebote component
 */
class PreiseangeboteComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    public function   discountarten($ProdId) {
            $usersTable = TableRegistry::get('Products');
              $product =$usersTable->get($ProdId); 
  
              if($product->discount_type_id===1){
                   return  $product->price;
              }
              elseif($product->discount_type_id===2){
                  return $product->price-$product->discount;
              }
                  elseif($product->discount_type_id===3){
                    
                      return $product->price-$product->price*$product->discount/100 ;
                  }else {
                return  $product->price;}
                  
          
              }
}
