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
    public function display($wh)
    {
        
$ProductsTabel = TableRegistry::get('Products');
//  pr($article_type);die();
$products1=$ProductsTabel->find()
->select(['id','photo','product_description'])
  ->where(['id'=>$wh])

			->limit(2)
			->toArray();
	
              
    $this->set(['products1'=>$products1]);

    }
}
