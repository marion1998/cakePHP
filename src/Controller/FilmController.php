<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Film Controller
 *
 * @property \App\Model\Table\FilmTable $Film
 *
 * @method \App\Model\Entity\Film[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FilmController extends AppController
{
    public $paginate = [
        'limit' => 10,
    ];
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $film = $this->paginate($this->Film);
        $this->set(compact('film'));
    }
    
    public function filmuser(){
        $film = $this->paginate($this->Film);
        $session = $this->request->session();
        $cart = $session->read('cart');

        $this->set(compact('film'));
        $this->set('cart', $cart);

        $user = $session->read('Auth.User');

        $Reservation = TableRegistry::get('reservation');
        $query = $Reservation->find()
        ->where(['idUser' => $user['id']])
        ->join([
            'table' => 'film',
            'alias' => 'f',
            'type' => 'LEFT',
            'conditions' => 'f.idFilm = reservation.idFilm'
        ])
        ->all()
        ->toList();

        $resaSession = [];
        foreach($query as $v)
        {
            array_push($resaSession,['idFilm'=>$v['idFilm'],'idReservation'=>$v['idReservation']]);
        }

        $session->write('reservation',$resaSession);
        $this->set('borrowed', $session->read('reservation'));

    }

    /**
     * View method
     *
     * @param string|null $id Film id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $film = $this->Film->get($id, [
            'contain' => []
        ]);

        $this->set('film', $film);
    }

    public function viewuser($id = null)
    {
        $film = $this->Film->get($id, [
            'contain' => []
        ]);

        $this->set('film', $film);
        $session = $this->request->session();
        $cart = $session->read('cart');
        $this->set('cart',$cart);
        $this->set('borrowed', $session->read('reservation'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    
    public function addbefore()
    {
         if ($this->request->is('post')) {
             $titlemov = $this->request->getData('titre');
             return $this->redirect(['action' => 'add', $titlemov]);
         }
    }
    
    public function add($titlesub = null)
    {
        $film = $this->Film->newEntity();
        if ($this->request->is('post')) {
            $film = $this->Film->patchEntity($film, $this->request->getData());
            if ($this->Film->save($film)) {
                $this->Flash->success(__('The film has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The film could not be saved. Please, try again.'));
        }
        $this->set('titlesub', $titlesub);
        $this->set(compact('film'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Film id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $film = $this->Film->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $film = $this->Film->patchEntity($film, $this->request->getData());
            if ($this->Film->save($film)) {
                $this->Flash->success(__('The film has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The film could not be saved. Please, try again.'));
        }
        $this->set(compact('film'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Film id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $film = $this->Film->get($id);
        if ($this->Film->delete($film)) {
            $this->Flash->success(__('The film has been deleted.'));
        } else {
            $this->Flash->error(__('The film could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function filter()
    {
        if ($this->request->is('post')){
            $titre = $this->request->getData();
        }

        $list = $this->paginate($this->Film
            ->find()
            ->where(['titre LIKE' => '%'.$titre['Keyword'].'%'])
            ->orWhere(['synopsis LIKE' => '%'.$titre['Keyword'].'%']));

        $session = $this->request->session();
        $cart = $session->read('cart');

        $this->set('cart', $cart);

        $this->set(compact('list', $list));
    }

    public function toggleDispo($id)
    {
        $film = $this->Film->get($id);
        $film->DISPO=="1"?$film->DISPO="0":$film->DISPO="1";
        $this->Film->save($film);
    }
}
