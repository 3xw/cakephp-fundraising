<p class="small small--line-small">
  <strong>% <?= __('somme récoltée') ?></strong>
</p>
<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
    <span class="sr-only">60% Complete</span>
  </div>
</div>
<br>
<? foreach($contributions as $contribution): ?>
  <?
    $title = (empty($contribution->amount))? $contribution->name : $contribution->amount;
  ?>
  <?= $this->Html->link($title, '#', ['class' => 'btn btn--white btn--full']) ?>
  <br><br>
<? endforeach ?>
