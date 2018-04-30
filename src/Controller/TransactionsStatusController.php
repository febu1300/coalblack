<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TransactionsStatus Controller
 *
 * @property \App\Model\Table\TransactionsStatusTable $TransactionsStatus
 *
 * @method \App\Model\Entity\TransactionsStatus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TransactionsStatusController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $transactionsStatus = $this->paginate($this->TransactionsStatus);

        $this->set(compact('transactionsStatus'));
    }

    /**
     * View method
     *
     * @param string|null $id Transactions Status id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transactionsStatus = $this->TransactionsStatus->get($id, [
            'contain' => ['Transactions']
        ]);

        $this->set('transactionsStatus', $transactionsStatus);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transactionsStatus = $this->TransactionsStatus->newEntity();
        if ($this->request->is('post')) {
            $transactionsStatus = $this->TransactionsStatus->patchEntity($transactionsStatus, $this->request->getData());
            if ($this->TransactionsStatus->save($transactionsStatus)) {
                $this->Flash->success(__('The transactions status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transactions status could not be saved. Please, try again.'));
        }
        $this->set(compact('transactionsStatus'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Transactions Status id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transactionsStatus = $this->TransactionsStatus->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transactionsStatus = $this->TransactionsStatus->patchEntity($transactionsStatus, $this->request->getData());
            if ($this->TransactionsStatus->save($transactionsStatus)) {
                $this->Flash->success(__('The transactions status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transactions status could not be saved. Please, try again.'));
        }
        $this->set(compact('transactionsStatus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Transactions Status id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transactionsStatus = $this->TransactionsStatus->get($id);
        if ($this->TransactionsStatus->delete($transactionsStatus)) {
            $this->Flash->success(__('The transactions status has been deleted.'));
        } else {
            $this->Flash->error(__('The transactions status could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
