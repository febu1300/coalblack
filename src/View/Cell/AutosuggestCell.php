<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Autosuggest cell
 */
class AutosuggestCell extends Cell
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
  
    public function display($wh)
    { 


            $this->loadModel('Products');
           
         
		//$total_products = $this->Products->find()->count();

//  pr($article_type);die();
		$products1=$this->Products->find()
                        
                        
                     ->select('product_name')
                     ->select('id')
                      ->where(['product_name LIKE'=>'%'.$wh.'%'])
                     ->limit(5)
                     ->toArray();
 
           

	
 $this->set(['products1'=>$products1]);



              
              
    }
  
}
