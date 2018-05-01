<?php
namespace App\Controller;
use Cake\I18n\Time;
use Cake\Auth\DefaultPasswordHasher;
use App\Controller\AppController;
use Cake\Event\Event;
use Facebook;
use Cake\ORM\TableRegistry;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
     public function initialize() {
        parent::initialize();
      
        $this->loadModel('Products');
      
//          $this->loadModel('Colors');
//        $this->loadModel('Sizes');
        $session = $this->request->session();
    }
public function beforeFilter(Event $event)
{
parent::beforeFilter($event);
$this->Auth->allow(['add', 'logout','login','clogin','cregister','hregister','hlogin','ologin']);
}
//    public function login()
//        {
//            if ($this->request->is('post')) {
//                //$x=$this->Passhashvalid->checkpass('fac3b00k');
//                //pr($x);die();
//               $user = $this->Auth->identify();
//        
//            if ($user) {
//                $this->Auth->setUser($user);
//            return $this->redirect($this->Auth->redirectUrl());
//            }
//        $this->Flash->error(__('ungültiger Benutzername oder Passwort, versuchen Sie noch einmal'));
//        }
//        }
         public function ologin()
        { $this->render(false);                     // after hloging if user goes to warenkorb
  
       
            if ($this->request->is('post')) {
                
  
 
     
                //$x=$this->Passhashvalid->checkpass('fac3b00k');
                //pr($x);die();
         $session = $this->request->session();
      


            if ($this->Auth->user('id')) {
                 
           
  
             
          if($this->Checkout->verifyAddress($this->Auth->user('id'))===1){
        
          return $this->redirect(['controller'=>'Transactions','action' => 'pay']);
        
            }else{
                     return   $this->redirect(
           [ 
                  "controller" => "UsersDetail", 
                  "action" => "sendadress"  ] );
            }
          //return $this->redirect(['controller'=>'UsersDetail','action' => 'sendadress']);
            }
        return $this->redirect(['controller'=>'Users','action' => 'clogin']);
        }
          
    return $this->redirect(['controller'=>'Pages','action' => 'display','home']);
        }
            public function clogin()
        {

                $this->viewBuilder()->setLayout('frontlayout');
                      $session = $this->request->session();
                     if($this->Auth->user('id')){
                           return $this->redirect(['controller'=>'Pages','action' => 'display','home']);
                     }else{
            if ($this->request->is('post')) {
              
                //$x=$this->Passhashvalid->checkpass('fac3b00k');
                //pr($x);die();
               $user = $this->Auth->identify();
        
            if ($user) {
                $this->Auth->setUser($user);
              
                         $session = $this->request->session();
                 // if ($this->request->session()->read('Auth.User.id')) {
          
                
        $products = $this->Products->find();
//         $colors = $this->Colors->find();
//             $sizes = $this->Sizes->find();
        foreach ($products as $product) {
             $productname = explode(" ", $product->product_name);
            $productname1 = implode("", $productname);
//            foreach ($colors as $color) {
//            foreach ($sizes as $size) {
             
            //$colorname1 =  $productname1."_".$color->color."_".$size->size;
             $colorname1 =  $productname1;
            $name2 = $session->read($colorname1);
            $this->set('name2', $name2);

            if ($product->online_vorhanden && $product->photo && $name2) {
             
 
    if($this->Checkout->verifyAddress($this->Auth->user('id'))===1){
        
          return $this->redirect(['controller'=>'Transactions','action' => 'pay']);
        
            }else{
                     return   $this->redirect(
           [ 
                  "controller" => "UsersDetail", 
                  "action" => "sendadress"  ] );
            }
            
        

            }
           
        
            }

        }}
        
        }}
         public function cregister()
    {
             $this->viewBuilder()->setLayout('benutzerlayout');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
          $user->role='customer';
       
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Der Benutzer wurde gespeichert. Sie können sich jetzt einloggen.'));

                return $this->redirect(['action' => 'clogin']);
            }
            $this->Flash->error(__('ungültiger Benutzername oder Passwort, versuchen Sie noch einmal.'));
        }
       $this->set('user', $user);
    }
     public function login()
    {
        if ($this->request->is('post') || $this->request->query('provider')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }
    public function hlogin()
        {
//                $session = $this->request->session();
//        $session->destroy();
        
                $this->viewBuilder()->setLayout('frontlayout');
                
//                
//   $fb = new Facebook\Facebook([
//  'app_id' => '1653299681414959', // Replace {app-id} with your app id
//  'app_secret' => '0836400da33fe1a0e42ba8eb543b55e6',
//  'default_graph_version' => 'v2.2',
//  ]);
//
//$helper = $fb->getRedirectLoginHelper();
//
//$permissions = ['email']; // Optional permissions
//$loginUrl = $helper->getLoginUrl('https://example.com/fb-callback.php', $permissions);
//
//echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';

            if ($this->request->is('post')) {
                //$x=$this->Passhashvalid->checkpass('fac3b00k');
                //pr($x);die();
               $user = $this->Auth->identify();
        
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect(['controller'=>'/']);
           // return $this->redirect($this->Auth->redirectUrl());
            }
        $this->Flash->error(__('ungültiger Benutzername oder Passwort, versuchen Sie noch einmal.'));
        }
        }
          public function hregister()
    {
             $this->viewBuilder()->setLayout('benutzerlayout');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
        
          $user->role='customer';
       
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Der Benutzer wurde gespeichert. Sie können sich jetzt einloggen.'));

                return $this->redirect(['controller'=>'Pages','action'=>'display','anmelden']);
            }
            $this->Flash->error(__('ungültiger Benutzername oder Passwort, versuchen Sie noch einmal.'));
        }
       $this->set('user', $user);
    }
public function logout()
{
    
return $this->redirect($this->Auth->logout());
}
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Transactions', 'UsersDetail']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
          
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Der Benutzer wurde gespeichert. Sie können sich jetzt einloggen.'));

                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('ungültiger Benutzername oder Passwort, versuchen Sie noch einmal.'));
        }
       $this->set('user', $user);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Der Benutzer wurde gespeichert. Sie können sich jetzt einloggen.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('ungültiger Benutzername oder Passwort, versuchen Sie noch einmal.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Der Benutzer wurde gelöscht.'));
        } else {
            $this->Flash->error(__('ungültiger Benutzername oder Passwort, versuchen Sie noch einmal.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
