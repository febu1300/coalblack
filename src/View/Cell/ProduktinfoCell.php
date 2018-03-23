<?php
namespace App\View\Cell;

use Cake\View\Cell;
use Cake\ORM\TableRegistry;
/**
 * Produktinfo cell
 */
class ProduktinfoCell extends Cell
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
 	$this->loadModel('Products');
         
         
		//$total_products = $this->Products->find()->count();
$ProductsTabel = TableRegistry::get('Products');
//  pr($article_type);die();
$products1=$ProductsTabel->find()
->select(['id','product_name','photo','photo_dir','new_in','online_vorhanden','price','product_description'])
        
  ->where((['id'=>$wh]))
        ->order(['id'=>'ASC'])
			->limit(8)
			->toArray();

	$ProductsdetTabel = TableRegistry::get('ProductsDetails');
//  pr($article_type);die();
$products2=$ProductsdetTabel->find()
->select(['id','product_id','photo','photo_dir','description'])
  ->where((['product_id'=>$wh]))

			->limit(8)
			->toArray();
	
              
    $this->set(['products2'=>$products2]);
              
    $this->set(['products1'=>$products1]);


    //

  
    }
}
