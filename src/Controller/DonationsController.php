<?php
namespace Trois\Fundraising\Controller;

use Trois\Fundraising\Controller\AppController;
use Cake\Mailer\Email;

/**
* Donations Controller
*
* @property \Trois\Fundraising\Model\Table\DonationsTable $Donations
*
* @method \Trois\Fundraising\Model\Entity\Donation[] paginate($object = null, array $settings = [])
*/
class DonationsController extends AppController
{

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
        $this->request->data['stripeToken'], $donation->amount * 100,  'chf', $donation->email
      );

      if($charge->id){
        $donation->transaction_nb = $charge->id;
        $donation->status = $charge->status;
        if($this->Donations->save($donation)){

          if ($this->request->data['confirm_email']) {
            $this->_email_notification($donation->id);
          }

          $this->Flash->success(__('Thanks for you doantion !.'));

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

  public function invoice($donation_id){

  }


  private function _email_notification($donation_id){
    $donation = $this->Donations->get($donation_id,[
      'contain'=>['Contributions']
    ]);
    $email = new Email();
    $email->emailFormat('html');
    $email->to($donation->email);
    $email->viewVars(['donation'=>$donation]);
    if($donation->payment_method == 'stripe'){
      $email->template('thanks', 'default');
    }else{
      $email->template('invoice', 'default');
    }
    $email->send();
  }
}
