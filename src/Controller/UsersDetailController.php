<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UsersDetail Controller
 *
 * @property \App\Model\Table\UsersDetailTable $UsersDetail
 *
 * @method \App\Model\Entity\UsersDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersDetailController extends AppController
{

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
        $usersDetail = $this->paginate($this->UsersDetail);

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
        $this->set(compact('usersDetail', 'users'));
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
