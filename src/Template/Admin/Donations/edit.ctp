<?= $this->element('header',['title' => __('Edit Donation'),'menus' => ['<i class="fa fa-list"></i><p>List </p>' => ['action' => 'index']]]) ?>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">

        <!-- LIST ELEMENT -->
        <div class="card">

          <!-- CONTENT -->
          <div class="content">

            <!-- FORM -->
            <?= $this->Form->create($donation); ?>
            <?php
            echo $this->Form->input('anonymous', ['class' => 'form-control']);
            echo $this->Form->input('first_name', ['class' => 'form-control']);
            echo $this->Form->input('last_name', ['class' => 'form-control']);
            echo $this->Form->input('email', ['class' => 'form-control']);
            echo $this->Form->input('street', ['class' => 'form-control']);
            echo $this->Form->input('city', ['class' => 'form-control']);
            echo $this->Form->input('zip', ['class' => 'form-control']);
            echo $this->Form->input('country', ['class' => 'form-control']);
            echo $this->Form->input('amount', ['class' => 'form-control']);
            echo $this->Form->input('currency', ['class' => 'form-control']);
            echo $this->Form->input('status', ['class' => 'form-control', 'type'=>'select', 'options'=>['pending'=>'pending','succeeded'=>'succeeded', 'canceled'=>'canceled']]);
            echo $this->Form->input('payment_method', ['class' => 'form-control', 'type'=>'select', 'options'=>['invoice'=>'Virement bancaire','stripe'=>'Carte de crédit']]);
            echo $this->Form->input('bank_account', ['class' => 'form-control']);
            echo $this->Form->input('transaction_nb', ['class' => 'form-control']);
            echo $this->Form->input('contribution_id', ['options' => $contributions, 'class' => 'form-control']);
            ?>
            <div class="btn-group">
              <?= $this->Html->link(__('Cancel'), $referer, ['class' => 'btn btn-sm btn-info btn-fill']) ?>
              <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-sm btn-success btn-fill']) ?>
            </div>

            <?= $this->Form->end() ?>

          </div><!-- end content-->
        </div><!-- end card-->
      </div><!-- end col-md-8 col-md-offset-2-->
    </div><!-- end row-->
  </div><!-- end container-fluid-->
</div><!-- end content-->
