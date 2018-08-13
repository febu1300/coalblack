<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
/**
 * ProductsCatagories Controller
 *
 * @property \App\Model\Table\ProductsCatagoriesTable $ProductsCatagories
 *
 * @method \App\Model\Entity\ProductsCatagory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsCatagoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ParentProductsCatagories']
        ];
        $productsCatagories = $this->paginate($this->ProductsCatagories);

        $this->set(compact('productsCatagories'));
        
    }

    /**
     * View method
     *
     * @param string|null $id Products Catagory id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productsCatagory = $this->ProductsCatagories->get($id, [
            'contain' => ['ParentProductsCatagories', 'ChildProductsCatagories', 'SubCatagories']
        ]);

        $this->set('productsCatagory', $productsCatagory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
      
        $productsCatagory = $this->ProductsCatagories->newEntity();
        if ($this->request->is('post')) {
            
        $productsCatagory->catagory_name=$this->request->getData('catagory_name');
        $productsCatagory->photo_dir="img/".$this->name.'/'.$productsCatagory->catagory_name;
        $productsCatagory->photo=$this->request->getData('photo.name');
      
       
// this line is added to call component upload
        $this->Filemanager->doUpload($productsCatagory);    
            if ($this->ProductsCatagories->save($productsCatagory)) {
                $this->Flash->success(__('The products catagory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The products catagory could not be saved. Please, try again.'));
        }
        $parentProductsCatagories = $this->ProductsCatagories->ParentProductsCatagories->find('list', ['limit' => 200]);
        $this->set(compact('productsCatagory', 'parentProductsCatagories'));
 
        }
    
public function changepic($id=null){

           $productsCatagory = $this->ProductsCatagories->get($id, [
            'contain' => []
        ]);
         
           $productToDelete=$productsCatagory;
        if ($this->request->is(['patch', 'post', 'put'])) {
        
            $productsCatagory = $this->ProductsCatagories->patchEntity($productsCatagory, $this->request->getData());
                $this->Filemanager->doDelete($productToDelete);      
            $productsCatagory->catagory_name=$this->request->getData('catagory_name');
        $productsCatagory->photo_dir="img/".$this->name.'/'.$productsCatagory->catagory_name;
        $productsCatagory->photo=$this->request->getData('photo1.name');

   
   
// this line is added to call component upload
        $this->Filemanager->doChange($productsCatagory);   
            
            
            if ($this->ProductsCatagories->save($productsCatagory)) {
                $this->Flash->success(__('The products catagory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The products catagory could not be saved. Please, try again.'));
        }
        $this->set(compact('productsCatagory'));
    
}
    /**
     * Edit method
     *
     * @param string|null $id Products Catagory id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productsCatagory = $this->ProductsCatagories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productsCatagory = $this->ProductsCatagories->patchEntity($productsCatagory, $this->request->getData());
            if ($this->ProductsCatagories->save($productsCatagory)) {
                $this->Flash->success(__('The products catagory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The products catagory could not be saved. Please, try again.'));
        }
        $parentProductsCatagories = $this->ProductsCatagories->ParentProductsCatagories->find('list', ['limit' => 200]);
        $this->set(compact('productsCatagory', 'parentProductsCatagories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Products Catagory id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productsCatagory = $this->ProductsCatagories->get($id);
              $this->Filemanager->doDelete($productsCatagory);
        if ($this->ProductsCatagories->delete($productsCatagory)) {
            $this->Flash->success(__('The products catagory has been deleted.'));
        } else {
            $this->Flash->error(__('The products catagory could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
