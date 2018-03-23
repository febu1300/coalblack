<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Cart cell
 */
class SaleCell extends Cell
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
           
         
		//$total_products = $this->Products->find()->count();

//  pr($article_type);die();
		$products1=$this->Products->find()
                        
                        
                     ->select(['id','product_name','photo','photo_dir','new_in','price','product_description'])
                   
                         ->where((['sale'=>true]))
//                   
		
			->limit(8)
			->toArray();
              
    $this->set(['products1'=>$products1]);
   
 //$this->set(['products1'=>$products1]);
    }
}
