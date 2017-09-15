<?php
namespace Trois\Fundraising\Controller;

use Trois\Fundraising\Controller\AppController;
use Cake\Mailer\MailerAwareTrait;

/**
* Donations Controller
*
* @property \Trois\Fundraising\Model\Table\DonationsTable $Donations
*
* @method \Trois\Fundraising\Model\Entity\Donation[] paginate($object = null, array $settings = [])
*/
class DonationsController extends AppController
{
  use MailerAwareTrait;

  public function initialize()
  {
    parent::initialize();
    $this->loadComponent('Trois/Fundraising.Stripe');
  }
  /**
  * Add method
  *
  * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
  */
  public function pay()
  {
    if ($this->request->is('post')) {
      $donation = $this->Donations->get($this->request->data['donation_id'], [
        'contain' => ['Contributions']
      ]);

      $charge = $this->Stripe->createChargeSimple(
        $this->request->data['stripeToken'], $donation->amount * 100,  'chf', "Donation n°.".$donation->id." - ".$donation->email
      );

      if($charge->id){
        $donation->transaction_nb = $charge->id;
        $donation->status = $charge->status;
        if($this->Donations->save($donation)){
          if ($this->request->data['confirm_email']) {
            $this->getMailer('Trois/Fundraising.User')->send('thanks', [$donation->email,__('Thanks for your contribution !'), $donation]);
          }
          $this->Flash->success(__('Thanks for you doantion !'));
          if ($this->request->data['success_url']) {
            $this->redirect($this->request->data['success_url']);
          }else{
            $this->redirect("/");
          }
        }
      }else{
        $this->Flash->error(__('Oops we\'ve got a problem!'));
      }
    }
  }
}
