<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Inventory cell
 */
class InventoryCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display($prodId)
    {
         
        
        
        
              $this->loadModel('Transactions');
        $unread = $this->Transactions->find() 
         
                ->select(['order_number','sent','id','product_id','transaction_status_id','quantity'])  
                ->where(['product_id'=>$prodId]) 
                ->where(['transaction_type_id'=>1]) ;

            
        
        $this->set('unread_count', $unread->sumOf('quantity'));
                $unread1 = $this->Transactions->find() 
         
                ->select(['order_number','sent','id','product_id','transaction_status_id','quantity'])  
                ->where(['product_id'=>$prodId]) 
                ->where(['transaction_type_id'=>2]) ;
                      

            
        
        $this->set('unread_count1', $unread1->sumOf('quantity'));
    }
}
