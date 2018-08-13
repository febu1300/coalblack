<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
/**
 * Contents Controller
 *
 * @property \App\Model\Table\ContentsTable $Contents
 *
 * @method \App\Model\Entity\Content[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => []
        ];
        $contents = $this->paginate($this->Contents);

        $this->set(compact('contents'));
    }

    /**
     * View method
     *
     * @param string|null $id Content id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $content = $this->Contents->get($id, [
            'contain' => []
        ]);

        $this->set('content', $content);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dir = new Folder('../src/Template/Pages');
        $tmp = $dir->find('.*\.ctp');
       
    
        foreach($tmp as $k=>$v){
            
        $files[]=basename($v,".ctp"); 
      
        }
         
        $content = $this->Contents->newEntity();
        if ($this->request->is('post')) {
            $content = $this->Contents->patchEntity($content, $this->request->getData());
       $content->link_page=$files[$this->request->getData('link_page')];
          $content->photo_dir="img/".$this->name.'/'. $content->catagory_name;
        $content->photo=$this->request->getData('photo.name');
      
    // this line is added to call component upload
        $this->Filemanager->doUpload( $content);    
            if ($this->Contents->save($content)) {
                $this->Flash->success(__('The content has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The content could not be saved. Please, try again.'));
        }

        $this->set(compact('content','files'));
    }
public function changepic($id=null){
 $dir = new Folder('../src/Template/Pages');
        $tmp = $dir->find('.*\.ctp');
       
    
        foreach($tmp as $k=>$v){
            
        $files[]=basename($v,".ctp"); 
      
        }
             $content = $this->Contents->get($id, [
            'contain' => []
        ]);
         
           $productToDelete=  $content;
        if ($this->request->is(['patch', 'post', 'put'])) {
        
          $content = $this->Contents->patchEntity(  $content, $this->request->getData());
          $this->Filemanager->doDelete($productToDelete);      
          $content->link_page=$files[$this->request->getData('link_page')];

          $content->photo_dir="img/".$this->name.'/'.$content->id;
          $content->photo=$this->request->getData('photo1.name');

   
   
// this line is added to call component upload
        $this->Filemanager->doChange($content);   
            
            
            if ($this->Contents->save($content)) {
                $this->Flash->success(__('The products catagory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The products catagory could not be saved. Please, try again.'));
        }
        $this->set(compact('content','files'));
    
}
    /**
     * Edit method
     *
     * @param string|null $id Content id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $content = $this->Contents->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $content = $this->Contents->patchEntity($content, $this->request->getData());
            if ($this->Contents->save($content)) {
                $this->Flash->success(__('The content has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The content could not be saved. Please, try again.'));
        }
    
        $this->set(compact('content'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Content id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $content = $this->Contents->get($id);
        if ($this->Contents->delete($content)) {
            //this line is added to delete a Photo
            $this->Filemanager->doDelete($content);
    
            $this->Flash->success(__('The content has been deleted.'));
        } else {
            $this->Flash->error(__('The content could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
