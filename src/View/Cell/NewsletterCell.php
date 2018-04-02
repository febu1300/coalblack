<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Newsletter cell
 */
class NewsletterCell extends Cell
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
        $this->loadModel('Newsletter');
        $unread = $this->Newsletter->find() 
                ->select(['id'])  
               
      
                ->distinct('id');
        
        $this->set('unread_count', $unread->count());

    }
}
