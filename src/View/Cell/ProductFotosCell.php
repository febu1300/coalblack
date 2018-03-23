<?php
namespace App\View\Cell;

use Cake\View\Cell;
use Cake\ORM\TableRegistry;
/**
 * ProductFotos cell
 */
class ProductFotosCell extends Cell
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
$ProductsTabel = TableRegistry::get('Pictures');
//  pr($article_type);die();
$productsfoto1=$ProductsTabel->find()
->select(['id','product_id','photo','photo_dir'])
  ->where((['product_id'=>$wh]))

			->limit(4)
			->toArray();
	
              
    $this->set(['productsfoto1'=>$productsfoto1]);
    }
}
