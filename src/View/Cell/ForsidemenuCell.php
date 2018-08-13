<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Forsidemenu cell
 */
class ForsidemenuCell extends Cell
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
        $this->loadModel('MainCatagories');
           
         
		//$total_products = $this->Products->find()->count();

//  pr($article_type);die();
		$products1=$this->MainCatagories->find()
                        
                        
                     ->select(['id','main_catagory_name'])
                   
                
//                   
		->order(['id'=>'ASC'])
		
			->toArray();
              
    $this->set(['products1'=>$products1]);
    }
}
