<?php
namespace App\View\Cell;

use Cake\View\Cell;
use Cake\ORM\TableRegistry;
use Cake\View\Helper;
/**
 * ViewCart cell
 */
class ViewCartCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];
public function initialize()
{
    parent::initialize();
    $this->loadComponent('RequestHandler');
}

public function beforeRender(Event $event)
{
    $this->RequestHandler->renderAs($this, 'json');
    if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
}
    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
 $this->autoRender = false;
        $productTable=TableRegistry::get('Products');
        $products=$productTable->find();
   


//             if($product->discount_type_id===2){
//                   $newprice =$product->price-$product->discount;
//              }
//                  elseif($product->discount_type_id===3){
//                    
//                     $newprice =$product->price-$product->price*$product->discount/100 ;
//                  }else {
//                       $newprice =$product->price;}
//                    
//       
//                    $total = $total + ($name2[$product->id] * $newprice);
       
        //json_encode($products);

echo json_encode(compact('products'));
        //;}

    } 
}
