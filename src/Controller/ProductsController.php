<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\I18n\I18n;
   
// Prior to 3.5 use I18n::locale()

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
       public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
    public function beforeFilter(Event $event)
{
   
        I18n::setLocale('de_DE');

}
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
         I18n::setLocale('de_DE');
        
              if($this->request->is('json')){
   
        $products = $this->Products->find();
        $this->set(compact('products'));
        //$this->set('_serialize', ['products']);  
    } else{
        $this->paginate = [
           'contain' => ['SubCatagories', 'DiscountsTypes','sizes','colors']
        ];
        $products = $this->paginate($this->Products);

        $this->set(compact('products'));
    $this->set('_serialize', ['products']);
 
    
    }
    }
    

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['SubCatagories', 'DiscountsTypes','Sizes','Colors', 'ProductsDetails', 'Transactions','Pictures']
        ]);

        $this->set('product', $product);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
              $product->created_date=Time::now();
              // the next 3 lines are added to call component upload
            
            $product->photo_dir="img/".$this->name.'/'.$product->product_name;
            $product->photo=$this->request->getData('photo.name');
            $this->Filemanager->doUpload($product); 
            //
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $subCatagories = $this->Products->SubCatagories->find('list', ['limit' => 200]);
        $discountsTypes = $this->Products->DiscountsTypes->find('list', ['limit' => 200]);
        $this->set(compact('product', 'subCatagories', 'discountsTypes','sizes','colors'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $subCatagories = $this->Products->SubCatagories->find('list', ['limit' => 200]);
        $discountsTypes = $this->Products->DiscountsTypes->find('list', ['limit' => 200]);
        $this->set(compact('product', 'subCatagories', 'discountsTypes','sizes','colors'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
                     //this line is added to delete a Photo
        $this->Filemanager->doDelete($product);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
