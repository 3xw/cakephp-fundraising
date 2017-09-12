<?php
namespace Trois\Fundraising\Controller;

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
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function pay()
    {

      $donation = $this->Donations->get($donation_id, [
        'contain' => ['Contributions']
      ]);

        if ($this->request->is('post')) {

          if(isset($this->request->data['stripeToken'])){
            debug($this->request->data);
            $charge = $this->Stripe->createChargeSimple(
              $this->request->data['stripeToken'], $donation->product->price * 100,  'chf', $donation->email
            );
            if($charge->id){
              $donation->transaction_nb = $charge->id;
              $donation->status = $charge->status;
              if($this->Donations->save($donation)){
                $this->getMailer('User')->send('thanks', [$donation->email,'Merci !', $donation]);
                //$this->getMailer('User')->send('notification', ['Nouveau don !', $donation]);
                $this->redirect(['action' => 'thanks', $product_id, $donation->id]);
              }
            }
          }
        }
        $this->set('donation', $donation);
        $this->set('key', Configure::read('Stripe.dev.public'));
        $this->set('method', '/donations/stripe');
    }
}
