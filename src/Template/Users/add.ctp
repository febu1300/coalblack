<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users form">
<?= $this->Form->create($user) ?>
<fieldset>
<legend><?= __('ANMELDEN') ?></legend>
<label for="title-0">
    <input type="radio" name="title" value="0" id="title-0">Herr</label><br>
<label for="title-1">
    <input type="radio" name="title" value="1" id="title-1">Frau</label><br>
<?= $this->Form->control('username') ?>
<?= $this->Form->control('fname') ?>
<?= $this->Form->control('lname') ?>
<?= $this->Form->control('password') ?>
<?= $this->Form->control('cPassword',['type'=>'password']) ?>
<?= $this->Form->control('role', [
'options' => ['admin' => 'Admin', 'author' => 'Author']
]) ?>
</fieldset>
<?= $this->Form->button(__('Submit')); ?>
<?= $this->Form->end() ?>
</div>