<?php
namespace App\View\Cell;

use Cake\View\Cell;
use Cake\ORM\TableRegistry;
/**
 * Orders cell
 */
class OrdersCell extends Cell
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
      $UsersDetailTable = TableRegistry::get('Transactions');
//  pr($article_type);die();
$products1=$UsersDetailTable->find()
->select(['id','user_id','transaction_status_id','order_number'])
        ->where((['transaction_status_id'=>1]))
  ->where((['user_id'=>$this->request->session()->read('Auth.User.id')]))

			->limit(10)
			->toArray();
	
              
    $this->set(['products1'=>$products1]);
    }
}
