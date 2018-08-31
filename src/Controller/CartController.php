<?php
   namespace App\Controller;
   use App\Controller\AppController;

   class CartController extends AppController{
      // public function retrieveSessionData(){
      //    $session = $this->request->session();
      
      //    $name = $session->read('name');
      //    $this->set('name',$name);
      // }
      public function addToCart($id,$title){
         $session = $this->request->session();
         $cart = $session->read('cart');
         array_push($cart,['id'=>$id,'title'=>$title]);
         $session->write('cart',$cart);
         return $this->redirect(['controller'=>'film','action' => 'filmuser']);
      }

      public function removeFromCart($id){
         $session = $this->request->session();
         $cart = $session->read('cart');
         foreach($cart as $k => $v){
            if($v['id']==$id){
               unset($cart[$k]);
            }
         }
         //$result = array_diff($cart,['id'=>$id]);
         $session->write('cart',$cart);
         print_r($cart);
         return $this->redirect(['controller'=>'film','action' => 'filmuser']);
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