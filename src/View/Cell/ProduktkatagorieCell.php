<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Produktkatagroie cell
 */
class ProduktkatagorieCell extends Cell
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
         $wh = $this->request->query('wh');   
         
		//$total_products = $this->Products->find()->count();

//  pr($article_type);die();
		$products1=$this->ProductsCatagories->find()
                        
                        
                     ->select(['id','main_catagory_id','photo','photo_dir','catagory_name'])
                   
                     //      ->where(!(['new'=>NULL]))
   ->where((['main_catagory_id'=>$wh]))
			

			->toArray();
              
    $this->set(['products1'=>$products1]);
    }
}
