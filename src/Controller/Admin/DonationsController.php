<?php
namespace Trois\Fundraising\Controller\Admin;

use Trois\Fundraising\Controller\AppController;

/**
 * Donations Controller
 *
 * @property \Trois\Fundraising\Model\Table\DonationsTable $Donations
 *
 * @method \Trois\Fundraising\Model\Entity\Donation[] paginate($object = null, array $settings = [])
 */
class DonationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Contributions']
        ];
        $donations = $this->paginate($this->Donations);

        $this->set(compact('donations'));
        $this->set('_serialize', ['donations']);
    }

    /**
     * View method
     *
     * @param string|null $id Donation id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $donation = $this->Donations->get($id, [
            'contain' => ['Contributions']
        ]);

        $this->set('donation', $donation);
        $this->set('_serialize', ['donation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $donation = $this->Donations->newEntity();
        if ($this->request->is('post')) {
            $donation = $this->Donations->patchEntity($donation, $this->request->getData());
            if ($this->Donations->save($donation)) {
                $this->Flash->success(__('The donation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The donation could not be saved. Please, try again.'));
        }
        $contributions = $this->Donations->Contributions->find('list', ['limit' => 200]);
        $this->set(compact('donation', 'contributions'));
        $this->set('_serialize', ['donation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Donation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $donation = $this->Donations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $donation = $this->Donations->patchEntity($donation, $this->request->getData());
            if ($this->Donations->save($donation)) {
                $this->Flash->success(__('The donation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The donation could not be saved. Please, try again.'));
        }
        $contributions = $this->Donations->Contributions->find('list', ['limit' => 200]);
        $this->set(compact('donation', 'contributions'));
        $this->set('_serialize', ['donation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Donation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $donation = $this->Donations->get($id);
        if ($this->Donations->delete($donation)) {
            $this->Flash->success(__('The donation has been deleted.'));
        } else {
            $this->Flash->error(__('The donation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
