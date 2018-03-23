<?php
namespace App\View\Cell;

use Cake\View\Cell;
use Cake\ORM\TableRegistry;
/**
 * Billingadd cell
 */
class BillingaddCell extends Cell
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
                $UsersDetailTable = TableRegistry::get('UsersDetail');
//  pr($article_type);die();
$products1=$UsersDetailTable->find()
->select(['id','user_id','address_line_1','address_line_2','user_detail_type_id'])
        ->where((['user_detail_type_id'=>2]))
  ->where((['user_id'=>$this->request->session()->read('Auth.User.id')]))

			->limit(1)
			->toArray();
	
              
    $this->set(['products1'=>$products1]);
    }
}
