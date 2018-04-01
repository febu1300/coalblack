<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * InventoryIn cell
 */
class InventoryInCell extends Cell
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
               ->where(['transaction_type_id'=>2]) ;

        
        $this->set('unread_count', $unread->sumOf('quantity'));
    }
}
