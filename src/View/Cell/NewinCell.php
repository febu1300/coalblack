<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Cart cell
 */
class NewinCell extends Cell
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
                        
                        
                ->select(['id','product_name','product_title','photo','photo_dir','new_in','discount','discount_type_id','price','product_description'])
                   
                 ->where((['new_in'=>1]))
           ->where((['online_vorhanden'=>1]))

			->limit(8)
			->toArray();
              
    $this->set(['products1'=>$products1]);
   
 //$this->set(['products1'=>$products1]);
    }
}
