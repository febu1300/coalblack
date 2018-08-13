<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
/**
 * MainCatagories Controller
 *
 * @property \App\Model\Table\MainCatagoriesTable $MainCatagories
 *
 * @method \App\Model\Entity\MainCatagory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MainCatagoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $mainCatagories = $this->paginate($this->MainCatagories);

        $this->set(compact('mainCatagories'));
    }

    /**
     * View method
     *
     * @param string|null $id Main Catagory id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mainCatagory = $this->MainCatagories->get($id, [
            'contain' => ['ProductsCatagories']
        ]);

        $this->set('mainCatagory', $mainCatagory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mainCatagory = $this->MainCatagories->newEntity();
        if ($this->request->is('post')) {
            $mainCatagory = $this->MainCatagories->patchEntity($mainCatagory, $this->request->getData());
            $mainCatagory->photo_dir="img/".$this->name.'/'. $mainCatagory->main_catagory_name;
      
            $mainCatagory->photo=$this->request->getData('photo.name');
            $this->Filemanager->doUpload($mainCatagory); 
                    
            if ($this->MainCatagories->save($mainCatagory)) {
                $this->Flash->success(__('The main catagory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The main catagory could not be saved. Please, try again.'));
        }
        $this->set(compact('mainCatagory'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Main Catagory id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mainCatagory = $this->MainCatagories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mainCatagory = $this->MainCatagories->patchEntity($mainCatagory, $this->request->getData());
            if ($this->MainCatagories->save($mainCatagory)) {
                $this->Flash->success(__('The main catagory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The main catagory could not be saved. Please, try again.'));
        }
        $this->set(compact('mainCatagory'));
    }
 public function changepic($id=null){
// 
           $mainCatagory = $this->MainCatagories->get($id, [
            'contain' => []
        ]);
           $productToDelete= $mainCatagory;
        if ($this->request->is(['patch', 'post', 'put'])) {
       $mainCatagory = $this->MainCatagories->patchEntity($mainCatagory, $this->request->getData());
        $this->Filemanager->doDelete($productToDelete);      

       $mainCatagory->photo_dir="img/".$this->name.'/'.$mainCatagory->sub_catagory_name;
       $mainCatagory->photo=$this->request->getData('photo1.name');

   
   
// this line is added to call component upload
        $this->Filemanager->doChange($mainCatagory);   
               
         if ($this->MainCatagories->save($mainCatagory)) {
                $this->Flash->success(__('The products catagory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The products catagory could not be saved. Please, try again.'));
        }
        $this->set(compact('mainCatagory'));
 
}
    /**
     * Delete method
     *
     * @param string|null $id Main Catagory id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mainCatagory = $this->MainCatagories->get($id);
        if ($this->MainCatagories->delete($mainCatagory)) {
            $this->Flash->success(__('The main catagory has been deleted.'));
        } else {
            $this->Flash->error(__('The main catagory could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
