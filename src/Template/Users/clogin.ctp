<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

?>
<div class="row">
    <div class="col-sm-4 col-md-4 col-lg-4">
        
    </div>
        
 
<div class="form-group">
<?= $this->Flash->render() ?>
<?= $this->Form->create() ?>
<fieldset>
    
<legend><?= __('EINLOGGEN') ?></legend>



        <?= $this->Form->control('username',['label'=>false ,'placeholder'=>'E-Mail*','class'=>'form-control bg-light border-color']) ?><br>

<?= $this->Form->control('password',['label'=>false,'placeholder'=>'Passwort*','class'=>'form-control bg-light border-color']) ?>
</fieldset><br>
<?= $this->Form->button(__('Login'),['class'=>'btn btn-primary btn-sm btn-block']); ?>
<?= $this->Form->end() ?>

    <a href="/users/cregister">Anmelden</a>
</div>
    </div>
<?php
echo $this->Form->postLink(
        'Login with Facebook', [
    'prefix' => false,
    'plugin' => 'ADmad/SocialAuth',
    'controller' => 'Auth',
    'action' => 'login',
    'provider' => 'facebook',
    '?' => ['redirect' => $this->request->getQuery('redirect')]
        ]
);
?>
<script>

</script>