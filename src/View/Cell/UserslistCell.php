<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Userslist cell
 */
class UserslistCell extends Cell
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
    //used in /transaction/pay
    public function display()
    {
 
     $this->loadModel('Users');
        $userlist = $this->Users->find() 
                ->select(['id','fname','lname','username','role'])
                ->where(['role'=>'customer'])
                
                ->order(['fname'=>'ASC']);

               

        
        $this->set('userlist', $userlist); 
        }
}
