<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DiscountsTypes Controller
 *
 * @property \App\Model\Table\DiscountsTypesTable $DiscountsTypes
 *
 * @method \App\Model\Entity\DiscountsType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DiscountsTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $discountsTypes = $this->paginate($this->DiscountsTypes);

        $this->set(compact('discountsTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Discounts Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $discountsType = $this->DiscountsTypes->get($id, [
            'contain' => []
        ]);

        $this->set('discountsType', $discountsType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $discountsType = $this->DiscountsTypes->newEntity();
        if ($this->request->is('post')) {
            $discountsType = $this->DiscountsTypes->patchEntity($discountsType, $this->request->getData());
            if ($this->DiscountsTypes->save($discountsType)) {
                $this->Flash->success(__('The discounts type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The discounts type could not be saved. Please, try again.'));
        }
        $this->set(compact('discountsType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Discounts Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $discountsType = $this->DiscountsTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $discountsType = $this->DiscountsTypes->patchEntity($discountsType, $this->request->getData());
            if ($this->DiscountsTypes->save($discountsType)) {
                $this->Flash->success(__('The discounts type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The discounts type could not be saved. Please, try again.'));
        }
        $this->set(compact('discountsType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Discounts Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $discountsType = $this->DiscountsTypes->get($id);
        if ($this->DiscountsTypes->delete($discountsType)) {
            $this->Flash->success(__('The discounts type has been deleted.'));
        } else {
            $this->Flash->error(__('The discounts type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
