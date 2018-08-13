<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Notification cell
 */
class NotificationCell extends Cell
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
    public function display()
    {
        $this->loadModel('Transactions');
        $unread = $this->Transactions->find() 
                ->select(['order_number','sent','id','transaction_status_id']) 
                ->having(['transaction_status_id'=>2]) 
                ->having(['sent'=>0])
                ->distinct('order_number');
    
        
        $this->set('unread_count', $unread->count());
    }
}
