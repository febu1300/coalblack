<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class='col-sm-4 col-md-4 col-lg-4'>
<div class="users form">
<?= $this->Form->create($user) ?>
<fieldset>
<legend><?= __('DEINE VORTEILE') ?></legend>
<p>>Schneller und einfacher Bestellvorgang</p>
<p>>Schneller Zugang zu Bestellungen und Status</p>
<label for="title-0">
    <input type="radio" name="title" value="0" id="title-0">Herr</label><br>
<label for="title-1">
    <input type="radio" name="title" value="1" id="title-1">Frau</label><br>
     

        <?= $this->Form->control('username',['label'=>false,'placeholder'=>'E-Mail*','class'=>'form-control bg-light border-color']) ?><br>

        <?= $this->Form->control('fname',['label'=>false,'placeholder'=>'Name*','class'=>'form-control bg-light border-color']) ?><br>

        <?= $this->Form->control('lname',['label'=>false,'placeholder'=>'Vorname*','class'=>'form-control bg-light border-color']) ?><br>

        <?= $this->Form->control('password',['label'=>false,'placeholder'=>'Passwort*','class'=>'form-control bg-light border-color']) ?><br>

        <?= $this->Form->control('cPassword',['label'=>false,'placeholder'=>'Passwort bestätigen*','type'=>'password','class'=>'form-control bg-light border-color']) ?><br>

</fieldset>
<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary btn-sm btn-block']); ?>
<?= $this->Form->end() ?>
</div>
</div>