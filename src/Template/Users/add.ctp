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


    
    
<style>
   .down{margin-top:10%;}
</style>


<div class="col-sm-1 col-md-1 col-lg-1 "></div>
<div class="col-sm-4 col-md-4 col-lg-4 ">
<?= $this->Form->create($user) ?>
<fieldset>
     <div class="row">
<legend><?= __('ANMELDEN') ?></legend>
<label for="title-0">
    <input type="radio" name="title" value="0" id="title-0">Herr</label><br>
<label for="title-1">
    <input type="radio" name="title" value="1" id="title-1">Frau</label><br>
    <hr>
     </div> 
   <div class="row">

        <?= $this->Form->control('username',['label'=>false,'placeholder'=>'E-Mail*','class'=>'form-control bg-light border-color']) ?>  </div>

     <div class="row">     <?= $this->Form->control('fname',['label'=>false,'placeholder'=>'Name*','class'=>'form-control bg-light border-color']) ?>  </div>

    <div class="row">      <?= $this->Form->control('lname',['label'=>false,'placeholder'=>'Vorname*','class'=>'form-control bg-light border-color']) ?>  </div>
      <div class="row">    <?= $this->Form->control('password',['label'=>false,'placeholder'=>'Passwort*','class'=>'form-control bg-light border-color']) ?>  </div>

      <div class="row">    <?= $this->Form->control('cPassword',['label'=>false,'placeholder'=>'Passwort bestätigen*','type'=>'password','class'=>'form-control bg-light border-color']) ?>  </div>

   
      <div class="row">
<?= $this->Form->control('role', [
'options' => ['admin' => 'Admin', 'author' => 'customer']
]) ?>
        <hr></div>
        </fieldset> 
            <div class="row">
    <div class="col-sm-4 col-md-4 col-lg-4 ">

        <?= $this->Form->button(__('Speichern'),['class'=>'btn btn-primary btn-sm btn-block']); ?>
<?= $this->Form->end() ?>
 
   </div>
    </div>
    </div>
  


