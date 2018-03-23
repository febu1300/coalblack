<div class="users form">
<?= $this->Flash->render() ?>
    <form method='post' action='/users/hlogin'>
<fieldset>
<legend><?= __('EINLOGGEN') ?></legend>
<?= $this->Form->label('username','Email') ?>
<?= $this->Form->control('username',['label'=>false ,'class'=>'form-control bg-light border-color']) ?>
<?= $this->Form->label('password','Password') ?>
<?= $this->Form->control('password',['label'=>false,'class'=>'form-control bg-light border-color']) ?>
</fieldset><br>
<?= $this->Form->button(__('Login'),['value'=>"Login",'class'=>'btn btn-primary btn-sm btn-block']); ?>
</form>


</div>