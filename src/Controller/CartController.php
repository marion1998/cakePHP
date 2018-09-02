<?php
   namespace App\Controller;
   use App\Controller\AppController;

   class CartController extends AppController{
      
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
         $session->write('cart',$cart);
         return $this->redirect(['controller'=>'film','action' => 'filmuser']);
      }
      
      public function deleteCart(){
         $session = $this->request->session();
         $session->delete('cart');
      }
      
   }
?>