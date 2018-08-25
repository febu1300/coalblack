<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
/**
 * UsersDetail Controller
 *
 * @property \App\Model\Table\UsersDetailTable $UsersDetail
 *
 * @method \App\Model\Entity\UsersDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersDetailController extends AppController
{
public function beforeFilter(Event $event)
{
parent::beforeFilter($event);
$this->Auth->allow(['add','sendadress','rechenadress','addrechenadres']);
}
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $usersDetail = $this->paginate($this->UsersDetail,['id'=>33]);

        $this->set(compact('usersDetail'));
        
 
    }

    /**
     * View method
     *
     * @param string|null $id Users Detail id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersDetail = $this->UsersDetail->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('usersDetail', $usersDetail);
    }
 public function adressepruefen()
    {         $sid=$this->request->query('theId');
              $usersDetail = $this->UsersDetail->find('all', ['id'=>$sid,'contain' => ['Users']]);

  $this->set(compact('usersDetail','sid')); 
     $uid=$this->Checkout->userdetUserid($sid);
  if($this->request->is('post')){
       
         $this->Checkout->editToBestellt($uid);
  $this->Checkout->deleteCartItem();
  return   $this->redirect(["controller" => "dashboard", "action" => "index"]); 
  }
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usersDetail = $this->UsersDetail->newEntity();
        if ($this->request->is('post')) {
            $usersDetail = $this->UsersDetail->patchEntity($usersDetail, $this->request->getData());
            if ($this->UsersDetail->save($usersDetail)) {
                $this->Flash->success(__('The users detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The users detail could not be saved. Please, try again.'));
        }
        $users = $this->UsersDetail->Users->find('list', ['limit' => 200]);
        $this->set(compact('usersDetail', $usersDetail));
    }
  public function sendadress()
    {    $this->viewBuilder()->setLayout('frontlayout');
    
         $session = $this->request->session();
     
//       $theUser=$this->Checkout->finduser($user);
//        $this->set(compact('theUser', $theUser));

 
      
    $usersDetail = $this->UsersDetail->newEntity();
   
        if ($this->request->is('post')) {
       $usersDetail->user_id=$this->Auth->user('id');
          $usersDetail->studio_name=$this->request->getData('studio_name');
        $usersDetail->address_line_1=$this->request->getData('address_line_1');
        $usersDetail->address_line_2=$this->request->getData('address_line_2');
        $usersDetail->zusatz=$this->request->getData('zusatz');
        $usersDetail->postal_code=$this->request->getData('postal_code');
        $usersDetail->city=$this->request->getData('city');
        $usersDetail->state=$this->request->getData('state');
        $usersDetail->country=$this->request->getData('country');
         $usersDetail->user_detail_type_id=1;
        $this->UsersDetail->save($usersDetail);
       
 $this->set(compact('usersDetail', 'users','usersDetailsTypes'));
                            return   $this->redirect(
           [ 
                  "controller" => "UsersDetail", 
                  "action" => "rechenadress",
               "?"=>["theId"=>$usersDetail->id]
               ] ); 
        }
          
   
    }
    
      public function sendadressreg()
    {  
          $idusers=$this->request->query('theId');
$userTable = TableRegistry::get('Users');
$user=$userTable->get($idusers);//->where(['id'=>$id]);
   
//       $user = $this->Users->get($id, [
//            'contain' => ['Transactions', 'UsersDetail']
//        ]);
//

//       $theUser=$this->Checkout->finduser($user);
//        $this->set(compact('theUser', $theUser));

 
      
    $usersDetail = $this->UsersDetail->newEntity();

        if ($this->request->is('post')) {
                      
    $usersDetail->user_id=$user->id; 
          $usersDetail->studio_name=$this->request->getData('studio_name');   
        $usersDetail->address_line_1=$this->request->getData('address_line_1');
        $usersDetail->address_line_2=$this->request->getData('address_line_2');
                $usersDetail->zusatz=$this->request->getData('zusatz');
        $usersDetail->postal_code=$this->request->getData('postal_code');
        $usersDetail->city=$this->request->getData('city');
        $usersDetail->state=$this->request->getData('state');
        $usersDetail->country=$this->request->getData('country');
         $usersDetail->user_detail_type_id=1;
        $this->UsersDetail->save($usersDetail);
   
 //$this->set(compact('usersDetail', 'users','usersDetailsTypes'));
                            return   $this->redirect(
           [ 
                  "controller" => "UsersDetail", 
                  "action" => "rechenadressreg",
               "?"=>["theId"=>$usersDetail->id]
               ] ); 
        }
              $this->set('user', $user);  
   
    }
        public function rechenadress()
    { $id=$this->request->query('theId');
  
    $this->viewBuilder()->setLayout('frontlayout');
      $usersDetail = $this->UsersDetail->get($id, [
            'contain' => []
        ]);
        
   $this->set(compact('usersDetail','users','usersDetailsTypes'));
   
  
      
    }
    
    
    
    
           public function rechenadressreg()
    { //from sendardress_reg()/userdet_id
               $id=$this->request->query('theId');
  

      $sendaddId = $this->UsersDetail->get($id, [
            'contain' => [ 'users','usersDetailsTypes']
        ]);
   

   //$this->set(compact('usersDetail','users','usersDetailsTypes'));
//     if ($this->request->is('post')) {
//
//            $this->Checkout->saverechnungaddress($uid);
//
//                            return   $this->redirect(
//           [ 
//                  "controller" => "dashboard", 
//                  "action" => "dashboard"]
//                ); 
//            }
       $this->set(compact('sendaddId','usersDetail', 'users','usersDetailsTypes'));
    }
        public function rechenaddresSave(){  
            $this->render(false);
         $this->viewBuilder()->setLayout('frontlayout');
         //from user id from rechenadressreg/user_id used in send adress
         $id=$this->request->query('theId');
         $uid=$this->Checkout->userdetUserid($id); 
      
        $usersDetail = $this->UsersDetail->newEntity();
        if ($this->request->is('post')) {
            $usersDetail = $this->UsersDetail->patchEntity($usersDetail, $this->request->getData());
            $usersDetail->user_id=$uid;
            $usersDetail->user_detail_type_id=2;
            if ($this->UsersDetail->save($usersDetail)) {
                $this->Checkout->editToBestellt($uid);
                $this->Checkout->deleteCartItem();
               // $this->Flash->success(__('The users detail has been saved.'));
          return   $this->redirect(["controller" => "dashboard", "action" => "index"]); 
               
            }
            $this->Flash->error(__('The users detail could not be saved. Please, try again.'));
        }
        //$users = $this->UsersDetail->Users->find('list', ['limit' => 200]);
      //  $this->set(compact('usersDetail', $usersDetail));
      
    }
    public function addrechenadres(){
            $this->render(false);
         $this->viewBuilder()->setLayout('frontlayout');
        
        $usersDetail = $this->UsersDetail->newEntity();
        if ($this->request->is('post')) {
            $usersDetail = $this->UsersDetail->patchEntity($usersDetail, $this->request->getData());
            $usersDetail->user_id=$this->Auth->user('id');
            $usersDetail->user_detail_type_id=2;
            if ($this->UsersDetail->save($usersDetail)) {
               // $this->Flash->success(__('The users detail has been saved.'));

                return $this->redirect(['controller'=>'Transactions','action' => 'pay']);
            }
            $this->Flash->error(__('The users detail could not be saved. Please, try again.'));
        }
        $users = $this->UsersDetail->Users->find('list', ['limit' => 200]);
        $this->set(compact('usersDetail', $usersDetail));
      
    }
    /**
     * Edit method
     *
     * @param string|null $id Users Detail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usersDetail = $this->UsersDetail->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersDetail = $this->UsersDetail->patchEntity($usersDetail, $this->request->getData());
            if ($this->UsersDetail->save($usersDetail)) {
                $this->Flash->success(__('The users detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The users detail could not be saved. Please, try again.'));
        }
        $users = $this->UsersDetail->Users->find('list', ['limit' => 200]);
        $this->set(compact('usersDetail', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Users Detail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usersDetail = $this->UsersDetail->get($id);
        if ($this->UsersDetail->delete($usersDetail)) {
            $this->Flash->success(__('The users detail has been deleted.'));
        } else {
            $this->Flash->error(__('The users detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
