<?= $this->element('header',['title' => 'View','menus' => [ '<i class="fa fa-list"></i><p>List </p>' => ['action' => 'index'], '<i class="fa fa-plus"></i><p>Add</p>' => ['action' => 'add'], '<i class="fa fa-edit"></i><p>Edit</p>' => ['action' => 'edit', $contribution->id]]]) ?>

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
                <?= __('Contribution') ?>
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
                  <th scope="row"><?= __('Name') ?></th>
                  <td><?= h($contribution->name) ?></td>
                </tr>
                                                                                                                <tr>
                  <th scope="row"><?= __('Id') ?></th>
                  <td><?= $this->Number->format($contribution->id) ?></td>
                </tr>
                                <tr>
                  <th scope="row"><?= __('Amount') ?></th>
                  <td><?= $this->Number->format($contribution->amount) ?></td>
                </tr>
                                                                              </tbody>
            </table>

                                    <div class="row">
               <div class="col-sm-12">
                  <h4><?= __('Description') ?></h4>
                  <?= $this->Text->autoParagraph(h($contribution->description)); ?>
               </div>
            </div>
                        <div class="row">
               <div class="col-sm-12">
                  <h4><?= __('Thanks') ?></h4>
                  <?= $this->Text->autoParagraph(h($contribution->thanks)); ?>
               </div>
            </div>
                        

            <hr/>
            <div class="text-center" style="margin-top: 20px;">
              <div class="btn-group">
                <?= $this->Html->link(__('Cancel'), $referer, ['class' => 'btn btn-sm btn-info btn-fill']) ?>
                <?= $this->Html->link(__('Edit Contribution'), ['action' => 'edit', $contribution->id], ['class'=>'btn btn-info btn-sm btn-fill']) ?>
                <?= $this->Form->postLink(__('Delete Contribution'), ['action' => 'delete', $contribution->id], ['class'=>'btn btn-danger btn-sm btn-fill', 'confirm' => __('Are you sure you want to delete # {0}?', $contribution->id)]) ?>
              </div>
            </div>
          </div>
        </div><!-- end card view -->
      </div> <!-- end col-md-offset-3 col-md-6 -->

      <div class="col-md-12">
                <!-- LIST <?= __('Related Donations') ?> -->
        <?php if (!empty($contribution->donations)): ?>
          <div class="card">

            <!-- HEADER -->
            <div class="header">
              <?= __('Related Donations') ?>
            </div>

            <!-- CONTENT -->
            <div class="content">
              <div class="fresh-datatables">
                <div id="datatables_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                  <!-- TABLE -->
                  <div class="row">
                    <div class="col-sm-12">
                      <table id="datatables" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                        <thead>
                          <tr>
                                                        <th><?= __('Id') ?></th>
                                                        <th><?= __('Created') ?></th>
                                                        <th><?= __('Modified') ?></th>
                                                        <th><?= __('Anonymous') ?></th>
                                                        <th><?= __('First Name') ?></th>
                                                        <th><?= __('Last Name') ?></th>
                                                        <th><?= __('Email') ?></th>
                                                        <th><?= __('Street') ?></th>
                                                        <th><?= __('City') ?></th>
                                                        <th><?= __('Zip') ?></th>
                                                        <th><?= __('Country') ?></th>
                                                        <th><?= __('Amount') ?></th>
                                                        <th><?= __('Currency') ?></th>
                                                        <th><?= __('Status') ?></th>
                                                        <th><?= __('Payment Method') ?></th>
                                                        <th><?= __('Transaction Nb') ?></th>
                                                        <th><?= __('Donationscol') ?></th>
                                                        <th><?= __('Contribution Id') ?></th>
                                                        <th class="actions"><?= __('Actions') ?></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($contribution->donations as $donations): ?>
                            <tr>
                              <td data-title="Id"><?= h($donations->id) ?></td>
                              <td data-title="Created"><?= h($donations->created) ?></td>
                              <td data-title="Modified"><?= h($donations->modified) ?></td>
                              <td data-title="Anonymous"><?= h($donations->anonymous) ?></td>
                              <td data-title="First Name"><?= h($donations->first_name) ?></td>
                              <td data-title="Last Name"><?= h($donations->last_name) ?></td>
                              <td data-title="Email"><?= h($donations->email) ?></td>
                              <td data-title="Street"><?= h($donations->street) ?></td>
                              <td data-title="City"><?= h($donations->city) ?></td>
                              <td data-title="Zip"><?= h($donations->zip) ?></td>
                              <td data-title="Country"><?= h($donations->country) ?></td>
                              <td data-title="Amount"><?= h($donations->amount) ?></td>
                              <td data-title="Currency"><?= h($donations->currency) ?></td>
                              <td data-title="Status"><?= h($donations->status) ?></td>
                              <td data-title="Payment Method"><?= h($donations->payment_method) ?></td>
                              <td data-title="Transaction Nb"><?= h($donations->transaction_nb) ?></td>
                              <td data-title="Donationscol"><?= h($donations->donationscol) ?></td>
                              <td data-title="Contribution Id"><?= h($donations->contribution_id) ?></td>

                              <td data-title="actions" class="actions" class="text-right">
                                <?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Donations', 'action' => 'view', $donations->id],['class' => 'btn btn-simple btn-info btn-icon edit','escape' => false]) ?>
                                <?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Donations', 'action' => 'edit', $donations->id], ['class' => 'btn btn-simple btn-warning btn-icon edit','escape' => false]) ?>
                                <?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'Donations', 'action' => 'delete', $donations->id], ['class' => 'btn btn-simple btn-danger btn-icon remove','escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $donations->id)]) ?>
                              </td>
                            </tr>

                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>

                </div><!-- end dataTables_wrapper-->
              </div><!-- end fresh-datatables-->
            </div><!-- end content-->
          </div><!-- end card-->
        <?php endif; ?><!-- END ASSOC <?= __('Related Donations') ?> -->
              </div>
    </div> <!-- end row -->
  </div> <!-- end container-fluid -->
</div> <!-- end content -->
