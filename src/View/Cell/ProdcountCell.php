<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Prodcount cell
 */
class ProdcountCell extends Cell
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
        $this->loadModel('Products');
        $unread = $this->Products->find() 
                ->select(['id'])  
               
      
                ->distinct('id');
        
        $this->set('unread_count', $unread->count());

    }
  
}
