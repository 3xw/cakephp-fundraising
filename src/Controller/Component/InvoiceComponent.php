<?php
namespace Trois\Fundraising\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Mailer\MailerAwareTrait;


/**
* Invoice component
*/
class InvoiceComponent extends Component
{
  use MailerAwareTrait;
  /**
  * Default configuration.
  *
  * @var array
  */
  protected $_defaultConfig = [];

  public function initialize(array $config)
  {
    parent::initialize($config);
  }


  public function generatePdfInvoice($donation_id){
    //to to
  }


  public function sendInvoice($donation){
    //$this->loadModel('Donations');
    $this->getMailer('Trois/Fundraising.User')->send('invoice', [$donation->email,'Information de paiement', $donation]);
  }

}
