<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\Time;
/**
 * Newsletter Controller
 *
 * @property \App\Model\Table\NewsletterTable $Newsletter
 *
 * @method \App\Model\Entity\Newsletter[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NewsletterController extends AppController
{
    public function beforeFilter(Event $event)
{
$this->Auth->allow([ 'add']);
}
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $newsletter = $this->paginate($this->Newsletter);

        $this->set(compact('newsletter'));
    }

    /**
     * View method
     *
     * @param string|null $id Newsletter id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $newsletter = $this->Newsletter->get($id, [
            'contain' => []
        ]);

        $this->set('newsletter', $newsletter);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
   //$this->render(false);
        $newsletter = $this->Newsletter->newEntity();
        if ($this->request->is('post')) {
            $newsletter = $this->Newsletter->patchEntity($newsletter, $this->request->getData());
            $newsletter->created_date=Time::now();
            if ($this->Newsletter->save($newsletter)) {
                $this->Flash->success(__('Sie sind jetzt unseren Newsletter abonniert.'));

                return  $this->redirect(['controller'=>'pages','action' => 'display','home']);
            }
            
            $this->Flash->error(__('Diese email wurde schon zur Newsletter Abonnieren verwendet,bitte geben Sie ein neue email ein.'));
                  return  $this->redirect(['controller'=>'pages','action' => 'display','home']);
            }
        $this->set(compact('newsletter'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Newsletter id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $newsletter = $this->Newsletter->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $newsletter = $this->Newsletter->patchEntity($newsletter, $this->request->getData());
            if ($this->Newsletter->save($newsletter)) {
                $this->Flash->success(__('The newsletter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The newsletter could not be saved. Please, try again.'));
        }
        $this->set(compact('newsletter'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Newsletter id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $newsletter = $this->Newsletter->get($id);
        if ($this->Newsletter->delete($newsletter)) {
            $this->Flash->success(__('The newsletter has been deleted.'));
        } else {
            $this->Flash->error(__('The newsletter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller','action' => 'display','home']);
    }
}
