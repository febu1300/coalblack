<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Coalblack cell
 */
class CoalblackCell extends Cell
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
         
             ->select(['id','online_vorhanden','product_name','product_title','photo','photo_dir','discount','discount_type_id','coalblack_produkte','price','product_description','discount','discount_type_id','sale'])
             ->where((['coalblack_produkte'=>1]))
             ->where((['online_vorhanden'=>1]))
		
	
			->toArray();
              
    $this->set(['products1'=>$products1]);
   
    }
}
