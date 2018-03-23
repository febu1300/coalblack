<?php
namespace App\View\Cell;

use Cake\View\Cell;
use Cake\ORM\TableRegistry;
/**
 * Productinfo2 cell
 */
class Productinfo2Cell extends Cell
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
          $wh = $this->request->query('wh');
$ProductsTabel = TableRegistry::get('ProductsDetails');
//  pr($article_type);die();
$products1=$ProductsTabel->find()
->select(['id','product_id','photo','photo_dir','description'])
  ->where((['product_id'=>$wh]))

			->limit(8)
			->toArray();
	
              
    $this->set(['products1'=>$products1]);

    }
}
