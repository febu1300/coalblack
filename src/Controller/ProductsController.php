<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
   use Cake\ORM\TableRegistry;

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
 public function beforeFilter(Event $event) {
         $this->Auth->allow(['autocomplete']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    { 


      
      if($this->request->is('json')){
   
        $products = $this->Products->find();
        $this->set(compact('products'));
        //$this->set('_serialize', ['products']);  
    } else{
        $this->paginate = [
           'contain' => ['SubCatagories', 'DiscountsTypes']
        ];
        $products = $this->paginate($this->Products);

        
        $this->set(compact('products','SubCatagories'));
        $this->set('_serialize', ['products','SubCatagories']);
 
//     $query = $this->Products
//        // Use the plugins 'search' custom finder and pass in the
//        // processed query params
//        ->find('search', ['search' => $this->request->getQueryParams()])
//        // You can add extra things to the query if you need to
//        ->contain(['SubCatagories', 'DiscountsTypes','sizes','colors'])
//        ->where(['product_name IS NOT' => null]);
//
//    $this->set('products', $this->paginate($query));
        
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
            'contain' => ['SubCatagories', 'DiscountsTypes', 'ProductsDetails', 'Transactions','Pictures']
        ]);

        $this->set('product', $product);
    }
   public function upload($id = null){
         $product = $this->Products->get($id, [
            'contain' => ['Pictures']
        ]);
                 $picture = $this->Pictures->newEntity();
                if($this->request->is('post')){
                    pr($this->request->getData());
                    die('test');
             }
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
            $pics= array_slice($this->request->getData('photo'),1);
            
            if($this->request->getData('sub_catagory_id')){
             $product->sub_catagory_id=$this->request->getData('sub_catagory_id');
            }else{   
             $product->sub_catagory_id=NULL;
                
            }
                //$product->product_name=$this->request->getData('product_name');
        //$product->sub_catagory_id=$this->request->getData('sub_catagory_id');
            $product->created_date=Time::now();
         
              // the next 3 lines are added to call component upload

            $product->photo_dir="img/".$this->name.'/'.$product->product_name;

            $product->photo=$this->request->getData('photo.0.name');
     
       
             $this->Filemanager->doUploadMultiple($product);   
            //array_slice($a,2)
            if ($this->Products->save($product)) {   

      foreach( $pics as $key=>$keyVal){    
                  $pictureTable = TableRegistry::get('Pictures');
                    $picture = $pictureTable->newEntity();
        
                     $picture->product_id=$product->id;
                     $picture->photo_dir="img/".'Pictures'.'/'. $product->id; 
                     $picture->photo=$keyVal['name'];
                     $this->Filemanager->doUploadPic($keyVal,$picture->photo_dir,$key+1); 
                       
                      $pictureTable->save($picture);
                   }        
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
  
        $subCatagories = $this->Products->SubCatagories->find('list', ['limit' => 200]);
        $discountsTypes = $this->Products->DiscountsTypes->find('list', ['limit' => 200]);
        $this->set(compact('product', 'subCatagories', 'discountsTypes'));
    }
public function changepic($id=null){
// 
           $product = $this->Products->get($id, [
            'contain' => []
        ]);
           $productToDelete=$product;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
                $this->Filemanager->doDelete($productToDelete);      
   
        $product->photo_dir="img/".$this->name.'/'.$product->product_name;
        $product->photo=$this->request->getData('photo1.name');

   
   
// this line is added to call component upload
        $this->Filemanager->doChange($product);   
            
            
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The products catagory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The products catagory could not be saved. Please, try again.'));
        }
        $this->set(compact('product'));
    
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
            $product->created_date=Time::now();
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $subCatagories = $this->Products->SubCatagories->find('list', ['limit' => 200]);
        $discountsTypes = $this->Products->DiscountsTypes->find('list', ['limit' => 200]);
        $this->set(compact('product', 'subCatagories', 'discountsTypes'));
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
      if ($this->request->is('post')) {
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
        
public function autocomplete() {
    $this->autoRender=false;   
 
       $total = 0;
        $pro = [];
          $s=[];
//$ordNo= uniqid();
        $session = $this->request->session();
        $count = $session->read('count');
        if ($count) {
            $products = $this->Products->find();

            foreach ($products as $product) {
                $productname = explode(" ", $product->product_name);
                $productname1 = implode("", $productname);

                $colorname1 = $productname1;
                $name2 = $session->read($colorname1);
                $this->set('name2', $name2);

                if ($product->online_vorhanden && $product->photo && $name2) {
            //$s[$product->id]=[[]$product->id,$name2[$product->id],$product->product_name];
                  $newprice = $this->Preiseangebote->discountarten($product->id);
$s[] =  array('Name'=>$product->product_name,'Menge' => $name2[$product->id], 'Preise' => $newprice);
          
//  $total = $total + ($name2[$product->id] * $newprice);
                } else {
                    
                }
//            }}
                $this->paginate($this->Products);

                //$this->set(compact('colors'));
         $this->set(compact('products', $products));
                //$this->set(compact('sizes'));
//        $this->set('_serialize', ['products']);
//        $this->set(compact('pro'));
            }
        } 
        echo json_encode($s);
    
    
//         $query= $transTable->find();
//       
//        foreach($query as $q){
//            $s[]=$q->id;
//        }
 
	
				
	}
}
