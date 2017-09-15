<?php
namespace Trois\Fundraising\Mailer;

use Cake\Mailer\Mailer;

class UserMailer extends Mailer
{

  public function thanks($email, $subject, $donation)
  {
    $this
    ->to($email)
    ->subject($subject)
    ->emailFormat('html')
    ->template('thanks', 'Trois/Fundraising.newsletter_layout')
    ->helpers(['Attachment.Attachment'])
    ->viewVars(['donation'=>$donation]);
  }

  public function invoice($email, $subject, $donation)
  {
    $this
    ->to($email)
    ->subject($subject)
    ->emailFormat('html')
    ->template('invoice', 'Trois/Fundraising.newsletter_layout')
    ->helpers(['Attachment.Attachment'])
    ->viewVars(['donation'=>$donation]);
  }
}
