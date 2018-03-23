<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\View\CellTrait;
/**
 * ProductsCatagories Controller
 *
 * @property \App\Model\Table\ProductsCatagoriesTable $ProductsCatagories
 *
 * @method \App\Model\Entity\ProductsCatagory[] paginate($object = null, array $settings = [])
 */
class DashboardController extends AppController
{  use CellTrait;
  public function beforeFilter(Event $event) {
   
       
      $this->viewBuilder()->setLayout('default');
      // $this->Auth->allow(['index']) ;
        
  } 
 

    // The owner of an article can edit and delete it

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {


    }

}