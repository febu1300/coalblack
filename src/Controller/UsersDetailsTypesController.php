<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UsersDetailsTypes Controller
 *
 * @property \App\Model\Table\UsersDetailsTypesTable $UsersDetailsTypes
 *
 * @method \App\Model\Entity\UsersDetailsType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersDetailsTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $usersDetailsTypes = $this->paginate($this->UsersDetailsTypes);

        $this->set(compact('usersDetailsTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Users Details Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersDetailsType = $this->UsersDetailsTypes->get($id, [
            'contain' => []
        ]);

        $this->set('usersDetailsType', $usersDetailsType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usersDetailsType = $this->UsersDetailsTypes->newEntity();
        if ($this->request->is('post')) {
            $usersDetailsType = $this->UsersDetailsTypes->patchEntity($usersDetailsType, $this->request->getData());
            if ($this->UsersDetailsTypes->save($usersDetailsType)) {
                $this->Flash->success(__('The users details type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The users details type could not be saved. Please, try again.'));
        }
        $this->set(compact('usersDetailsType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Users Details Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usersDetailsType = $this->UsersDetailsTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersDetailsType = $this->UsersDetailsTypes->patchEntity($usersDetailsType, $this->request->getData());
            if ($this->UsersDetailsTypes->save($usersDetailsType)) {
                $this->Flash->success(__('The users details type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The users details type could not be saved. Please, try again.'));
        }
        $this->set(compact('usersDetailsType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Users Details Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usersDetailsType = $this->UsersDetailsTypes->get($id);
        if ($this->UsersDetailsTypes->delete($usersDetailsType)) {
            $this->Flash->success(__('The users details type has been deleted.'));
        } else {
            $this->Flash->error(__('The users details type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
