<?php
namespace App\View\Cell;

use Cake\View\Cell;
use Cake\ORM\TableRegistry;

/**
 * Shippingadd cell
 */
class ShippingaddCell extends Cell
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
->select(['id','user_id','studio_name','address_line_1','address_line_2','city','state','postal_code','country','main_address','is_similar','user_detail_type_id'])
          ->where((['user_detail_type_id'=>1]))
  ->where((['user_id'=>$this->request->session()->read('Auth.User.id')]))

			->limit(5)
			->toArray();
	
              
    $this->set(['products1'=>$products1]);

    }
}
