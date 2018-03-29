<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Userinfo cell
 */
class UserinfoCell extends Cell
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
        $this->loadModel('Users');
        $unread = $this->Users->find() 
                ->select(['id'])  
               
      
                ->distinct('id');
        
        $this->set('unread_count', $unread->count());

    }
}


   