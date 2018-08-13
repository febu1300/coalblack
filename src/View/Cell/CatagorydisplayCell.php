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
          	$this->loadModel('Contents');
           
         
		//$total_products = $this->Products->find()->count();

//  pr($article_type);die();
		$products1=$this->Contents->find()
                        
                        
                ->select(['id','lable','link_page','photo_dir','photo'])
                   
                 ->where((['id'=>6]))
        

			->limit(1)
			->toArray();
              
    $this->set(['products1'=>$products1]);
   
    }
}
