<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users form">
<?= $this->Flash->render() ?>
<?= $this->Form->create() ?>
<fieldset>
<legend><?= __('EINLOGGEN') ?></legend>
<?= $this->Form->control('username') ?>
<?= $this->Form->control('password') ?>
</fieldset>
<?= $this->Form->button(__('Login')); ?>
<?= $this->Form->end() ?>
</div>