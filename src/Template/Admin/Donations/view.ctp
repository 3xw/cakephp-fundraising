<?= $this->element('header',['title' => 'View','menus' => [ '<i class="fa fa-list"></i><p>List </p>' => ['action' => 'index'], '<i class="fa fa-plus"></i><p>Add</p>' => ['action' => 'add'], '<i class="fa fa-edit"></i><p>Edit</p>' => ['action' => 'edit', $donation->id]]]) ?>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-offset-3 col-md-6">

        <div class="card card-user">
          <div class="image">
            <img src="<?= $this->Url->build('/img/admin/bg.jpg') ?>" alt="...">
          </div>
          <div class="content">
            <p class="description text-center">
              <h4 class="title text-center">
                <?= __('Donation') ?>
              </h4>
            </p>

            <table class="table">
              <thead>
                <tr>
                  <th><?= __('Key') ?></th>
                  <th><?= __('Value') ?></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row"><?= __('Id') ?></th>
                  <td><?= h($donation->id) ?></td>
                </tr>
                <tr>
                  <th scope="row"><?= __('First Name') ?></th>
                  <td><?= h($donation->first_name) ?></td>
                </tr>
                <tr>
                  <th scope="row"><?= __('Last Name') ?></th>
                  <td><?= h($donation->last_name) ?></td>
                </tr>
                <tr>
                  <th scope="row"><?= __('Email') ?></th>
                  <td><?= h($donation->email) ?></td>
                </tr>
                <tr>
                  <th scope="row"><?= __('Street') ?></th>
                  <td><?= h($donation->street) ?></td>
                </tr>
                <tr>
                  <th scope="row"><?= __('City') ?></th>
                  <td><?= h($donation->city) ?></td>
                </tr>
                <tr>
                  <th scope="row"><?= __('Zip') ?></th>
                  <td><?= h($donation->zip) ?></td>
                </tr>
                <tr>
                  <th scope="row"><?= __('Country') ?></th>
                  <td><?= h($donation->country) ?></td>
                </tr>
                <tr>
                  <th scope="row"><?= __('Currency') ?></th>
                  <td><?= h($donation->currency) ?></td>
                </tr>
                <tr>
                  <th scope="row"><?= __('Status') ?></th>
                  <td><?= h($donation->status) ?></td>
                </tr>
                <tr>
                  <th scope="row"><?= __('Payment Method') ?></th>
                  <td><?= h($donation->payment_method) ?></td>
                </tr>
                <tr>
                  <th scope="row"><?= __('Bank Account') ?></th>
                  <td><?= h($donation->bank_account) ?></td>
                </tr>
                <tr>
                  <th scope="row"><?= __('Transaction Nb') ?></th>
                  <td><?= h($donation->transaction_nb) ?></td>
                </tr>
                <tr>
                  <th scope="row"><?= __('Contribution') ?></th>
                  <td><?= $donation->has('contribution') ? $this->Html->link($donation->contribution->name, ['controller' => 'Contributions', 'action' => 'view', $donation->contribution->id]) : '' ?></td>
                </tr>

                <tr>
                  <th scope="row"><?= __('Amount') ?></th>
                  <td><?= $this->Number->format($donation->amount) ?></td>
                </tr>
                <tr>
                  <th scope="row"><?= __('Created') ?></th>
                  <td><?= h($donation->created) ?></td>
                </tr>
                <tr>
                  <th scope="row"><?= __('Modified') ?></th>
                  <td><?= h($donation->modified) ?></td>
                </tr>
                <tr>
                  <th scope="row"><?= __('Anonymous') ?></th>
                  <td><?= $donation->anonymous ? __('Yes') : __('No'); ?></td>
                </tr>
              </tbody>
            </table>



            <hr/>
            <div class="text-center" style="margin-top: 20px;">
              <div class="btn-group">
                <?= $this->Html->link(__('Cancel'), $referer, ['class' => 'btn btn-sm btn-info btn-fill']) ?>
                <?= $this->Html->link(__('Edit Donation'), ['action' => 'edit', $donation->id], ['class'=>'btn btn-info btn-sm btn-fill']) ?>
                <?= $this->Form->postLink(__('Delete Donation'), ['action' => 'delete', $donation->id], ['class'=>'btn btn-danger btn-sm btn-fill', 'confirm' => __('Are you sure you want to delete # {0}?', $donation->id)]) ?>
              </div>
            </div>
          </div>
        </div><!-- end card view -->
      </div> <!-- end col-md-offset-3 col-md-6 -->

      <div class="col-md-12">
      </div>
    </div> <!-- end row -->
  </div> <!-- end container-fluid -->
</div> <!-- end content -->
