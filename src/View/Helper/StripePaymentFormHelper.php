<?php
namespace Trois\Fundraising\View\Helper;

use Cake\View\Helper;
use Cake\View\View;
use Cake\Controller\Component;
use Stripe\Stripe;

/**
* StripePaymentForm helper
*/
class StripePaymentFormHelper extends Helper
{

  /**
  * Default configuration.
  *
  * @var array
  */
  protected $_defaultConfig = [];



  public function getForm($key, $donation_id, $amount = null, $success_url = null, $confirm_email = false)
  {

    return $this->_View->element(
      'Trois/Fundraising.StripePaymentForm',
      [
        'donation_id'=>$donation_id,
        'key'=>$key,
        'success_url'=>$success_url,
        'confirm_email'=>$confirm_email,
        'amount'=>$amount
      ]
    );
  }
}
