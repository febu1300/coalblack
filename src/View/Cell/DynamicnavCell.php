<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Dynamicnav cell
 */
class DynamicnavCell extends Cell
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

		$products1=$this->MainCatagories->find()

                     ->select(['id','main_catagory_name',])
//                   
		->order(['id'=>'ASC'])
		
			->toArray();
              
    $this->set(['products1'=>$products1]);

    }
}
