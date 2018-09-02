<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Reservation Controller
 *
 * @property \App\Model\Table\ReservationTable $Reservation
 *
 * @method \App\Model\Entity\Reservation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReservationController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $reservation = $this->paginate($this->Reservation);

        $this->set(compact('reservation'));
    }

    /**
     * View method
     *
     * @param string|null $id Reservation id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reservation = $this->Reservation->get($id, [
            'contain' => []
        ]);

        $this->set('reservation', $reservation);
    }

    public function createReservation()
    {
        $session = $this->request->session();
        $cart = $session->read('cart');
        $user = $session->read('Auth.User')['id'];
        foreach($cart as $v)
        {
            $reservation = $this->Reservation->newEntity();
            $reservation->idUser = $user;
            $reservation->idFilm = $v['id'];
            $this->Reservation->save($reservation);

            require_once "FilmController.php";
            $Films = new FilmController;
            $Films->toggleDispo($v['id']);

        }
        $session->write('cart', []);
        return $this->redirect(['controller'=>'film','action'=>'filmuser']);
    }

    public function deleteReservation($idResa,$idFilm)
    {
        $reservation = $this->Reservation->get($idResa);
        if ($this->Reservation->delete($reservation)) {
            $this->Flash->success(__('You gave it back with success'));
        } else {
            $this->Flash->error(__('Error. Please, try again.'));
        }

        require_once "FilmController.php";
        $Films = new FilmController;
        $Films->toggleDispo($idFilm);

        return $this->redirect(['controller'=>'film','action'=>'filmuser']);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reservation = $this->Reservation->newEntity();
        if ($this->request->is('post')) {
            $reservation = $this->Reservation->patchEntity($reservation, $this->request->getData());
            if ($this->Reservation->save($reservation)) {
                $this->Flash->success(__('The reservation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reservation could not be saved. Please, try again.'));
        }
        $this->set(compact('reservation'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Reservation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reservation = $this->Reservation->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reservation = $this->Reservation->patchEntity($reservation, $this->request->getData());
            if ($this->Reservation->save($reservation)) {
                $this->Flash->success(__('The reservation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reservation could not be saved. Please, try again.'));
        }
        $this->set(compact('reservation'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Reservation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reservation = $this->Reservation->get($id);
        if ($this->Reservation->delete($reservation)) {
            $this->Flash->success(__('The reservation has been deleted.'));
        } else {
            $this->Flash->error(__('The reservation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
