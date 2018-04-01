<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Subcatagory cell
 */
class SubcatagoryCell extends Cell
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
         
        $this->loadModel('SubCatagories');
         $wh = $this->request->query('wh');   
         
		//$total_products = $this->Products->find()->count();

//  pr($article_type);die();
		$products1=$this->SubCatagories->find()
                        
                        
                     ->select(['id','products_catagory_id','photo','photo_dir','sub_catagory_name'])
                   
                     //      ->where(!(['new'=>NULL]))
   ->where((['products_catagory_id'=>$wh]))
			
			->limit(8)
			->toArray();
              
    $this->set(['products1'=>$products1]);
   
    }
}
