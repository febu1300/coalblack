<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Allproducte cell
 */
class AllproducteCell extends Cell
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

//  pr($article_type);die();
		$products1=$this->Products->find()
                        
                        
                     ->select(['id','sub_catagory_id','product_name','photo','photo_dir','new_in','sale','price','product_description'])
                   
                  ->where(['sub_catagory_id'=>$wh])
//                   
		->order(['id'=>'ASC'])
			->limit(8)
			->toArray();
              
    $this->set(['products1'=>$products1]);
    }
}
