<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProductsDetails Controller
 *
 * @property \App\Model\Table\ProductsDetailsTable $ProductsDetails
 *
 * @method \App\Model\Entity\ProductsDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsDetailsController extends AppController
{
public function initialize() {
        parent::initialize();
        $this->loadModel('subCatagories');
        $this->loadModel('Products');
        $this->loadModel('Transactions');
        $this->loadModel('UsersDetail');
//          $this->loadModel('Colors');
//        $this->loadModel('Sizes');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Products'],
             'limit' => 2
        ];
        $productsDetails = $this->paginate($this->ProductsDetails);

        $this->set(compact('productsDetails'));
    }

    /**
     * View method
     *
     * @param string|null $id Products Detail id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productsDetail = $this->ProductsDetails->get($id, [
            'contain' => ['Products']
        ]);

        $this->set('productsDetail', $productsDetail);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productsDetail = $this->ProductsDetails->newEntity();
        if ($this->request->is('post')) {
            $productsDetail = $this->ProductsDetails->patchEntity($productsDetail, $this->request->getData());
            if ($this->ProductsDetails->save($productsDetail)) {
                $this->Flash->success(__('The products detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The products detail could not be saved. Please, try again.'));
        }
        $products = $this->ProductsDetails->Products->find('list', ['limit' => 200]);
        $this->set(compact('productsDetail', 'products'));
    }
    
        public function detailsindex() {




        //$this->set('_serialize', ['products']);  

        $this->paginate = [
            'contain' => ['SubCatagories', 'DiscountsTypes', 'sizes', 'colors']
        ];
        $products = $this->paginate($this->Products);

        $this->set(compact('products'));
        $this->set('_serialize', ['products']);

        $this->set(compact('transactions'));
    }
        public function bearbeiten($id=null)
    {  $prodIdfetched = $id;

$productsDetail=$this->ProductsDetails->newEntity();
$productsDetail->product_id= $prodIdfetched;
        if ($this->request->is('post')) {
        
            for($i=0;$i<2;$i++){
            
            if($i==0){
    $productsDet=$this->ProductsDetails->newEntity();
        $prdId =$this->request->getData('product_id');
            $prdodet=$this->request->getData('details');
                              $prdode1=$this->request->getData('retoure');
                              
       $w= $this->ProductsDetails->patchEntity(  $productsDet,$this->request->getData());
              $w->product_id=$prodIdfetched;
                $w->description=$prdodet;
              $w->photo='details';
        
                $this->ProductsDetails->save( $w);
           
            }elseif($i==1){
                    $productsDet=$this->ProductsDetails->newEntity();
                   $w= $this->ProductsDetails->patchEntity($productsDet,$this->request->getData());
        $w->product_id=$prodIdfetched;
                $w->description=$prdode1; 
             $w->photo='retoure';
        
                $this->ProductsDetails->save( $w);
        if ($this->ProductsDetails->save($w)) {
               $this->Flash->success(__('The products detail has been saved.'));

                return $this->redirect(['action' => 'index']);
        }
            }
            }
  
        }
        $products = $this->ProductsDetails->Products->find('list', ['limit' => 200]);
        $this->set(compact('productsDetail', 'products'));
         $this->set(compact('prodIdfetched ') );
    }

    /**
     * Edit method
     *
     * @param string|null $id Products Detail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productsDetail = $this->ProductsDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productsDetail = $this->ProductsDetails->patchEntity($productsDetail, $this->request->getData());
            if ($this->ProductsDetails->save($productsDetail)) {
                $this->Flash->success(__('The products detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The products detail could not be saved. Please, try again.'));
        }
        $products = $this->ProductsDetails->Products->find('list', ['limit' => 200]);
        $this->set(compact('productsDetail', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Products Detail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productsDetail = $this->ProductsDetails->get($id);
        if ($this->ProductsDetails->delete($productsDetail)) {
            $this->Flash->success(__('The products detail has been deleted.'));
        } else {
            $this->Flash->error(__('The products detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
