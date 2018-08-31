<?php
   namespace App\Controller;
   use App\Controller\AppController;

   class CartController extends AppController{
      public function retrieveSessionData(){
         $session = $this->request->session();
      
         $name = $session->read('name');
         $this->set('name',$name);
      }
      public function addToCart($film){
         $session = $this->request->session();
         $cart = $session->read('cart');
         array_push($cart,$film);
         $session->write('cart',$cart);
         return $this->redirect(['controller'=>'film'],['action' => 'index']);
      }
      // public function checkSessionData(){
      //    $session = $this->request->session();
      
      //    $name = $session->check('name');
      //    $address = $session->check('address');
      //    $this->set('name',$name);
      //    $this->set('address',$address);
      // }
      public function deleteCart(){
         $session = $this->request->session();
         $session->delete('cart');
      }
      // public function destroySessionData(){
      //    $session = $this->request->session();
         
      //    //destroy session
      //    $session->destroy();
      // }
   }
?>