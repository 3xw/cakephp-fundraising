<?php
namespace Trois\Fundraising\Controller\Component;

use Cake\Controller\Component;
use Cake\Core\Configure;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Plan;
use Stripe\Subscription;
use Stripe\Event;
use Stripe\Balance;
use Stripe\BalanceTransaction;
use Stripe\Invoice;
use Stripe\Payout;

class StripeComponent extends Component
{
   public function initialize(array $config)
   {
      parent::initialize($config);
      Stripe::setApiKey(Configure::read('Stripe.secret'));
      $this->public_key = Configure::read('Stripe.public');
   }

   /**events**/
   public function events(){
      $events = Event::all(['limit'=>100]);
      $events = $events->data;
      return $events;
   }

   public function eventRetrieve($event_id){
      $event = Event::retrieve($event_id);
      return $event;
   }


   /**events**/
   public function payouts(){
      $payouts = Payout::all();
      $payouts = $payouts->data;
      return $payouts;
   }

   /** charges **/
   public function charges(){
      $charges = Charge::all(array("limit" => 100));
      $charges = $charges->data;
      return $charges;
   }

   public function createCharge($customer_id, $amount, $currency = 'chf'){
      $charge = Charge::create([
         'customer' => $customer_id,
         'amount'   => $amount,
         'currency' => $currency
      ]);

      return $charge;
   }

   public function createChargeSimple($token, $amount, $currency = 'chf', $description){
      $charge = Charge::create([
         'amount'   => $amount,
         'currency' => $currency,
         "source" => $token,
         "description" =>$description
      ]);

      return $charge;
   }


   /** invoice **/
   public function retrieveCustomerInvoices($customer_id){
     $invoices = Invoice::all(array(
       "customer" => $customer_id,
     ));
     return $invoices;
   }

   public function invoices(){
     $invoices = Invoice::all(array("limit" => 1000));
     $retuned_invoices;
     $i=0;
     foreach ( $invoices->data as $invoice) {
       # code...
       $retuned_invoices[$i]['period_start'] = $invoice['period_start'];
       $retuned_invoices[$i]['period_end'] = $invoice['period_end'];
       $retuned_invoices[$i]['paid'] = $invoice['paid'];
       $retuned_invoices[$i]['total'] = $invoice['total'];
       $i++;
     }

     return $retuned_invoices;
   }

   /** subscriptions**/
   public function subscriptions(){
      $subscriptions = Subscription::all(array("limit" => 100));
      $subscriptions = $subscriptions->data;
      return $subscriptions;
   }

   public function cancelSubscription($sub_id, $cancel_at_end){
      $sub = Subscription::retrieve($sub_id);
      $sub->cancel([
        'at_period_end'=>$cancel_at_end
      ]);
      return $sub;
   }

   public function retrieveSubscription($sub_id){
      $sub = Subscription::retrieve($sub_id);
      return $sub;
   }

   public function retrieveCustomerInvoice($customer_id){
      $invoices = Invoice::all(array('customer'=>$customer_id));
      return $invoices->data;
   }

   public function retrieveCustomerSubscription($customer_id){

      $subscriptions = Subscription::all(array('customer'=>$customer_id, 'active'=>true));
      return $subscriptions;
   }

   public function subscribe($customer, $plan){
      $subscription = Subscription::create(array(
         "customer" => $customer->id,
         "plan" => $plan,
      ));
      return $subscription->id;
   }


   public function updateSubscription($sub_id, $plan){
     $sub = Subscription::retrieve($sub_id);
     $subscription->plan = $plan;
     $subscription->save();
     return $subscription;
   }

   /** customers **/
   public function createCustomer($id = "donation", $email, $description){
      $customer = Customer::create(array(
         "email" => $email,
         "description" => $description,
         'metadata'=>[
            'bplt_id'=>$id
            ]
         )
      );
      return $customer->id;
   }

   public function retrieveCustomer($stripe_id){
      return Customer::retrieve($stripe_id);
   }


   /** plan **/
   public function createPlan($name, $plan_id, $interval, $interval_count, $currency, $amount){
      $plan = Plan::create(array(
         "name" => $name,
         "id" => $plan_id,
         "interval" => $interval,
         "interval_count" => $interval_count,
         "currency" => $currency,
         "amount" => $amount
      ));
   }

   /** source **/
   public function createSource($customer, $token){
      $customer->sources->create(array("source" =>$token));
      return $customer;
   }

   /** key **/
   public function getPublicKey(){
      return $this->public_key;
   }

   /** balance **/
   public function balance(){
      $balance = Balance::retrieve();
      return $balance;
   }

}
