<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Catagorydisplay cell
 */
class CatagorydisplayCell extends Cell
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
          		$this->loadModel('ProductsCatagories');
           
         
		//$total_products = $this->Products->find()->count();

//  pr($article_type);die();
		$products1=$this->ProductsCatagories->find()
                        
                        
                     ->select(['id','catagory_name','photo','photo_dir'])
                   
                      ->where((['id'=>54]))                  // important!! set coalblack Produkte id 53
//                   
	
			->limit(1)
			->toArray();
              
    $this->set(['products1'=>$products1]);
   
    }
}
