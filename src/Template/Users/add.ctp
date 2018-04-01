<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="navbar navbar-expand-lg  bg-light " >
  <a class="navbar-brand" href="/dashboard">Dashboard</a>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      
      </li>
  
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="/transactions"><span class="glyphicon glyphicon-bell"></span>  <span class="badge badge-secondary bg-danger badge-pill"><?=$this->cell('Notification')?></span></a></li>
     
      <li><a href="/users/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
 <div class="col-sm-3 col-md-3 col-lg-3 ">
 

<ul class="nav nav-pills flex-column">
           <li class="nav-item"><?= $this->Html->link(__('Benützerverwaltung'), ['controller'=>'Users','action' => 'index']) ?></li>
           <li class="nav-item"><?= $this->Html->link(__('Bestandsverwaltung'), ['controller' => 'Transactions', 'action' => 'bestandsposten']) ?></li>
           <li class="nav-item"><?= $this->Html->link(__('Lagerverwaltung'), ['controller' => 'Transactions', 'action' => 'index']) ?></li>
           <hr>

           <li class="nav-item"><?= $this->Html->link(__('Produktliste'), ['controller'=>'products','action' => 'index']) ?></li>
           <li class="nav-item"><?= $this->Html->link(__('Subkatagorieliste'), ['controller'=>'subCatagories','action' => 'index']) ?></li>
     <li class="nav-item"><?= $this->Html->link(__('Haupkatagorieliste'), ['controller'=>'ProductsCatagories','action' => 'index']) ?></li>

   

</ul>


    </div>
<div class="col-sm-9 col-md-9 col-lg-9 ">

<?= $this->Form->create($user) ?>
<fieldset>
     <div class="row">
<legend><?= __('ANMELDEN') ?></legend>
<label for="title-0">
    <input type="radio" name="title" value="0" id="title-0">Herr</label><br>
<label for="title-1">
    <input type="radio" name="title" value="1" id="title-1">Frau</label><br>
    </div> 
    <hr>
       <div class="row">
                      
            <?php echo $this->Form->label('Benützername');
echo $this->Form->control('username',['label'=>false]);?>
       </div>
      <div class="row">
             <?= $this->Form->label('Vorname');?>
<?= $this->Form->control('fname',['label'=>false]) ?>
             <?= $this->Form->label('Nachname');?>
<?= $this->Form->control('lname',['label'=>false]) ?>
        </div>  
    <hr>
        <div class="row">
<?= $this->Form->control('password') ?>
<?= $this->Form->control('cPassword',['type'=>'password']) ?>
        </div> 
    <hr>
    <div class="row">
<?= $this->Form->control('role', [
'options' => ['admin' => 'Admin', 'author' => 'Author']
]) ?>
    </div>
        <hr>
</fieldset>
<?= $this->Form->button(__('Submit')); ?>
<?= $this->Form->end() ?>

 </div>