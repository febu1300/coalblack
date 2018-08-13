<?php
namespace App\Controller;

use App\Controller\AppController;

   use Cake\ORM\TableRegistry; 
/**
 * Pictures Controller
 *
 * @property \App\Model\Table\PicturesTable $Pictures
 *
 * @method \App\Model\Entity\Picture[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PicturesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Products'],
     
        ];

        $pictures = $this->paginate($this->Pictures);

        $this->set(compact('pictures','products'));
    }

    /**
     * View method
     *
     * @param string|null $id Picture id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $picture = $this->Pictures->get($id, [
            'contain' => ['Products']
        ]);

        $this->set('picture', $picture);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $picture = $this->Pictures->newEntity();
        if ($this->request->is('post')) {
            $picture = $this->Pictures->patchEntity($picture, $this->request->getData());
      
                   // this line is added to call component upload
           $picture->photo_dir="img/".$this->name.'/'.$picture->product_id;
       $picture->photo=$this->request->getData('photo.name');
      
        $this->Filemanager->doUpload($picture);  
            if ($this->Pictures->save($picture)) {
                $this->Flash->success(__('The picture has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The picture could not be saved. Please, try again.'));
        }
        $products = $this->Pictures->Products->find('list', ['limit' => 200]);
        $this->set(compact('picture', 'products'));
    }

       public function upload(){
               //$this->autoRender=false;
       $this->request->is('ajax');
  $pictures = $this->Pictures->find();
  $this->set(['pictures' => $pictures]);
        
      }
 
    public function edit($id = null)
    {
        $picture = $this->Pictures->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $picture = $this->Pictures->patchEntity($picture, $this->request->getData());
            if ($this->Pictures->save($picture)) {
                $this->Flash->success(__('The picture has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The picture could not be saved. Please, try again.'));
        }
        $products = $this->Pictures->Products->find('list', ['limit' => 200]);
        $this->set(compact('picture', 'products'));
    }
public function changepic($id=null){
// 
            $picture = $this->Pictures->get($id, [
            'contain' => []
        ]);
           $productToDelete= $picture;
        if ($this->request->is(['patch', 'post', 'put'])) {
             $picture = $this->Pictures->patchEntity( $picture, $this->request->getData());
                $this->Filemanager->doDelete($productToDelete);      
             $picture->id=$this->request->getData('id');
         $picture->photo_dir="img/".$this->name.'/'. $picture->id;
         $picture->photo=$this->request->getData('photo1.name');

   
   
// this line is added to call component upload
        $this->Filemanager->doChange( $picture);   
            
            
            if ($this->Pictures->save( $picture)) {
                $this->Flash->success(__('The products catagory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The products catagory could not be saved. Please, try again.'));
        }
        $this->set(compact('picture'));
    
}
    /**
     * Delete method
     *
     * @param string|null $id Picture id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $picture = $this->Pictures->get($id);
            //this line is added to delete a Photo
        $this->Filemanager->doDelete($picture);
        if ($this->Pictures->delete($picture)) {
            $this->Flash->success(__('The picture has been deleted.'));
        } else {
            $this->Flash->error(__('The picture could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    

}
