<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<style>
   .down{margin-top:10%;}
</style>

<div class="row down">
    <div class="col-sm-4 col-md-4 col-lg-4 "></div>
<div class="col-sm-4 col-md-4 col-lg-4 ">
<div class="users form">
<?= $this->Flash->render() ?>
<?= $this->Form->create() ?>
<fieldset>
<legend><?= __('EINLOGGEN') ?></legend>



        <?= $this->Form->control('username',['label'=>false ,'placeholder'=>'E-Mail*','class'=>'form-control bg-light border-color']) ?><br>

<?= $this->Form->control('password',['label'=>false,'placeholder'=>'Passwort*','class'=>'form-control bg-light border-color']) ?>
</fieldset><br>
<?= $this->Form->button(__('Login'),['class'=>'btn btn-primary btn-sm btn-block']); ?>
<?= $this->Form->end() ?>


</div>
    </div>
</div>