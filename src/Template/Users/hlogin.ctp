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
<?= $this->Form->label('username','Email') ?>
<?= $this->Form->control('username',['label'=>false ,'class'=>'form-control bg-light border-color']) ?>
<?= $this->Form->label('password','Password') ?>
<?= $this->Form->control('password',['label'=>false,'class'=>'form-control bg-light border-color']) ?>
</fieldset><br>
<?= $this->Form->button(__('Login'),['class'=>'btn btn-primary btn-sm btn-block']); ?>
<?= $this->Form->end() ?>

    <a href="/users/cregister">Anmelden</a>
</div>
<?php echo $this->Form->postLink(
    'Login with Facebook',
    [
        'prefix' => false,
        'plugin' => 'ADmad/SocialAuth',
        'controller' => 'Auth',
        'action' => 'login',
        'provider' => 'facebook',
        '?' => ['redirect' => $this->request->getQuery('redirect')]
    ]
);?>