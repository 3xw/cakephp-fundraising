<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

class UserMailer extends Mailer
{

  public function newsletter($newsletter, $to_emails, $to_bcc = null)
  {
    $this
    ->to($to_emails)
    ->bcc($to_bcc)
    ->subject($newsletter->subject)
    ->emailFormat('html')
    ->helpers(['Attachment.Attachment'])
    ->template('newsletter', 'bilat')
    ->viewVars(['newsletter'=> $newsletter]);
  }


  public function contact($contact)
  {
    $this
    ->to('info@bonpourlatete.com')
    //->to('cyril@3xw.ch')
    ->from([$contact->email => $contact->firstname." ".$contact->lastname])
    ->subject($contact->subject)
    ->emailFormat('html')
    ->template('contact', 'bilat')
    ->viewVars(['message'=>$contact->message]);
  }


  public function thanks($email, $subject, $donation)
  {
    $this
    ->to($email)
    ->subject($subject)
    ->emailFormat('html')
    ->template('thanks', 'bilat')
    ->helpers(['Attachment.Attachment'])
    ->viewVars(['donation'=>$donation]);
  }

  public function invoice($email, $subject, $donation)
  {
    $this
    ->to($email)
    ->subject($subject)
    ->emailFormat('html')
    ->template('invoice', 'bilat')
    ->helpers(['Attachment.Attachment'])
    ->viewVars(['donation'=>$donation]);
  }
}
