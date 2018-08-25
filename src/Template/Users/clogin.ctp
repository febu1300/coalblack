<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

?>
<?= $this->Flash->render() ?>
<div class="row">
    <div class="col-sm-4 col-md-4 col-lg-4">
        
    </div>
        
 
    <div class="row"></div>
     <div class="row">
<div class="form-group">

<?= $this->Form->create() ?>
<fieldset>
    
<legend><?= __('EINLOGGEN') ?></legend>



        <?= $this->Form->control('username',['label'=>false ,'placeholder'=>'E-Mail*','class'=>'form-control bg-light border-color']) ?><br>

<?= $this->Form->control('password',['label'=>false,'placeholder'=>'Passwort*','class'=>'form-control bg-light border-color']) ?>
</fieldset><br>
<?= $this->Form->button(__('Login'),['class'=>'btn btn-primary btn-sm btn-block']); ?>
<?= $this->Form->end() ?>
<br>
   <?= $this->Html->link(__('Neue bei uns? Registrieren'), ['action' => 'cregister'], ['class' => "btn btn-primary btn-block", 'data-toggle' => "modal", 'data-target' => "#creg"]) ?>
  
     
    </div></div>


         <div id="creg" class="modal fade">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                     
                <div class="modal-body">                                       


   
<div class="users form">
    <form method="post" action="/users/cregister">


<label for="title-0">
    <input type="radio" name="title" checked="checked" value="0" id="title-0">Herr</label><br>
<label for="title-1">
    <input type="radio" name="title" value="1" id="title-1">Frau</label><br>
     

        <?= $this->Form->control('username',['label'=>false,'placeholder'=>'E-Mail*','class'=>'form-control bg-light border-color']) ?><br>

        <?= $this->Form->control('fname',['label'=>false,'placeholder'=>'Name*','class'=>'form-control bg-light border-color']) ?><br>

        <?= $this->Form->control('lname',['label'=>false,'placeholder'=>'Vorname*','class'=>'form-control bg-light border-color']) ?><br>

        <?= $this->Form->control('password',['label'=>false,'placeholder'=>'Passwort*','class'=>'form-control bg-light border-color']) ?><br>

        <?= $this->Form->control('cPassword',['label'=>false,'placeholder'=>'Passwort bestätigen*','type'=>'password','class'=>'form-control bg-light border-color']) ?><br>

</fieldset>
<?= $this->Form->button(__('weiter>>'),['class'=>'btn btn-primary btn-sm btn-block']); ?>
</form>
</div>

                    </div>
                    <div class="clearfix"></div>
               
            </div>
        </div>
    </div>
    </div>
<script>

</script>