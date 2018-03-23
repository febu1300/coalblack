<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use App\Controller\AppController;
use App\Form\SearchForm;

/**
 * Description of SearchController
 *
 * @author buruk
 */
class SearchController extends AppController{
 
    
    
       public function index()
    {
       $contact = new SearchForm();
        if ($this->request->is('post')) {
              pr($contact);die();
            if ($contact->execute($this->request->getData())) {
              
                $this->Flash->success('We will get back to you soon.');
            } else {
                $this->Flash->error('There was a problem submitting your form.');
            }
        }
        $this->set('contact', $contact);
        
//              if($this->request->is('json')){
//   
//        $products = $this->Products->find();
//        $this->set(compact('products'));
//        pr(      $this->set(compact('products')));die();
//        //$this->set('_serialize', ['products']);  
//    } else{
//        $this->paginate = [
//           'contain' => ['SubCatagories', 'DiscountsTypes','sizes','colors']
//        ];
//        $products = $this->paginate($this->Products);
//
//        $this->set(compact('products'));
//    $this->set('_serialize', ['products']);
 
    
    }
    
}
