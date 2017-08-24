<?php
namespace Trois\Fundraising\Controller\Admin;

use Trois\Fundraising\Controller\AppController;

/**
 * Contributions Controller
 *
 * @property \Trois\Fundraising\Model\Table\ContributionsTable $Contributions
 *
 * @method \Trois\Fundraising\Model\Entity\Contribution[] paginate($object = null, array $settings = [])
 */
class ContributionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $contributions = $this->paginate($this->Contributions);

        $this->set(compact('contributions'));
        $this->set('_serialize', ['contributions']);
    }

    /**
     * View method
     *
     * @param string|null $id Contribution id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contribution = $this->Contributions->get($id, [
            'contain' => ['Donations']
        ]);

        $this->set('contribution', $contribution);
        $this->set('_serialize', ['contribution']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contribution = $this->Contributions->newEntity();
        if ($this->request->is('post')) {
            $contribution = $this->Contributions->patchEntity($contribution, $this->request->getData());
            if ($this->Contributions->save($contribution)) {
                $this->Flash->success(__('The contribution has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contribution could not be saved. Please, try again.'));
        }
        $this->set(compact('contribution'));
        $this->set('_serialize', ['contribution']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contribution id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contribution = $this->Contributions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contribution = $this->Contributions->patchEntity($contribution, $this->request->getData());
            if ($this->Contributions->save($contribution)) {
                $this->Flash->success(__('The contribution has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contribution could not be saved. Please, try again.'));
        }
        $this->set(compact('contribution'));
        $this->set('_serialize', ['contribution']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contribution id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contribution = $this->Contributions->get($id);
        if ($this->Contributions->delete($contribution)) {
            $this->Flash->success(__('The contribution has been deleted.'));
        } else {
            $this->Flash->error(__('The contribution could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
