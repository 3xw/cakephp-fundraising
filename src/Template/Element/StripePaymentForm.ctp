<script src="https://js.stripe.com/v3/"></script>
<?= $this->Form->create('Stripe', ['novalidate', 'id'=>'payment-form', 'url'=>['controller'=>'fundraising/donations', 'action'=>'pay'] ]) ?>
<?php echo $this->Form->input('donation_id', ['type' => 'hidden', 'value'=> $donation_id]);?>
<?php echo $this->Form->input('success_url', ['type' => 'hidden', 'value'=> $success_url]);?>
<?php echo $this->Form->input('amount', ['type' => 'hidden', 'value'=> $amount]);?>
<?php echo $this->Form->input('confirm_email', ['type' => 'hidden', 'value'=> $confirm_email]);?>
<label for="card-element">Entrez votre numéro de carte de crédit</label>
<div id="card-element">
  <!-- a Stripe Element will be inserted here. -->
</div>
<!-- Used to display form errors -->
<div id="card-errors"></div>
<div class="btn-group">
  <?= $this->Html->link(__('Cancel'), $referer, ['class' => 'btn btn-sm btn-info btn-fill']) ?>
  <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-sm btn-success btn-fill']) ?>
</div>
</form>


<script type="text/javascript">
var stripe = Stripe('<?=$key?>');
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    lineHeight: '24px',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element
var card = elements.create('card', {style: style, hidePostalCode:true});

// Add an instance of the card Element into the `card-element` <div>
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server
      stripeTokenHandler(result.token);
    }
  });
});

function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
  $('#myModal').modal({ keyboard: false })
}
</script>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="myModal">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      loading...
    </div>
  </div>
</div>
