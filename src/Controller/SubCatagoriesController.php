<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SubCatagories Controller
 *
 * @property \App\Model\Table\SubCatagoriesTable $SubCatagories
 *
 * @method \App\Model\Entity\SubCatagory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SubCatagoriesController extends AppController
{
   
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ProductsCatagories']
        ];
        $subCatagories = $this->paginate($this->SubCatagories);

        $this->set(compact('subCatagories'));
    }
public function closemodal()
    {         if ($this->request->is('post')) {
    return $this->redirect(['action' => 'index']);}
    }
    /**
     * View method
     *
     * @param string|null $id Sub Catagory id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $subCatagory = $this->SubCatagories->get($id, [
            'contain' => ['ProductsCatagories', 'Products']
        ]);

        $this->set('subCatagory', $subCatagory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $subCatagory = $this->SubCatagories->newEntity();
        if ($this->request->is('post')) {
            $subCatagory = $this->SubCatagories->patchEntity($subCatagory, $this->request->getData());
             
            // this line is added to call component upload
            $subCatagory->photo_dir="img/".$this->name.'/'.$subCatagory->catagory_name;
        $subCatagory->photo=$this->request->getData('photo.name');
      
       

        $this->Filemanager->doUpload($subCatagory);    
            if ($this->SubCatagories->save($subCatagory)) {
                $this->Flash->success(__('The sub catagory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sub catagory could not be saved. Please, try again.'));
        }
        $productsCatagories = $this->SubCatagories->ProductsCatagories->find('list', ['limit' => 200]);
        $this->set(compact('subCatagory', 'productsCatagories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sub Catagory id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $subCatagory = $this->SubCatagories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $subCatagory = $this->SubCatagories->patchEntity($subCatagory, $this->request->getData());
            if ($this->SubCatagories->save($subCatagory)) {
                $this->Flash->success(__('The sub catagory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sub catagory could not be saved. Please, try again.'));
        }
        $productsCatagories = $this->SubCatagories->ProductsCatagories->find('list', ['limit' => 200]);
        $this->set(compact('subCatagory', 'productsCatagories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sub Catagory id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $subCatagory = $this->SubCatagories->get($id);
                //this line is added to delete a Photo
        $this->Filemanager->doDelete($subCatagory);
        if ($this->SubCatagories->delete($subCatagory)) {
     
            $this->Flash->success(__('The sub catagory has been deleted.'));
        } else {
            $this->Flash->error(__('The sub catagory could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
