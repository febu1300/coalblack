<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Usergroups Controller
 *
 * @property \App\Model\Table\UsergroupsTable $Usergroups
 *
 * @method \App\Model\Entity\Usergroup[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsergroupsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $usergroups = $this->paginate($this->Usergroups);

        $this->set(compact('usergroups'));
    }

    /**
     * View method
     *
     * @param string|null $id Usergroup id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usergroup = $this->Usergroups->get($id, [
            'contain' => []
        ]);

        $this->set('usergroup', $usergroup);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usergroup = $this->Usergroups->newEntity();
        if ($this->request->is('post')) {
            $usergroup = $this->Usergroups->patchEntity($usergroup, $this->request->getData());
            if ($this->Usergroups->save($usergroup)) {
                $this->Flash->success(__('The usergroup has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usergroup could not be saved. Please, try again.'));
        }
        $this->set(compact('usergroup'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Usergroup id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usergroup = $this->Usergroups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usergroup = $this->Usergroups->patchEntity($usergroup, $this->request->getData());
            if ($this->Usergroups->save($usergroup)) {
                $this->Flash->success(__('The usergroup has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usergroup could not be saved. Please, try again.'));
        }
        $this->set(compact('usergroup'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Usergroup id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usergroup = $this->Usergroups->get($id);
        if ($this->Usergroups->delete($usergroup)) {
            $this->Flash->success(__('The usergroup has been deleted.'));
        } else {
            $this->Flash->error(__('The usergroup could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
