<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Picture $picture
 */
?>
<div class="container-fluid">
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
<div class="row">
        <div class="col-sm-2 col-md-2 col-lg-2">
<nav class="navbar navbar-expand-lg navbar-dark bg-light" id="actions-sidebar">
    <ul class="nav nav-pills flex-column">
 <li class="nav-item"><?= $this->Html->link(__('Bilderauflisten'), ['action' => 'index']) ?></li>
        <li class="nav-item"><?= $this->Html->link(__('Produkte'), ['controller' => 'Products', 'action' => 'index']) ?></li>

        
    </ul>
</nav>
        </div>
<div class="col-sm-10 col-md-10 col-lg-10">


        <?= $this->Form->create($picture,['type'=>'file']) ?>
    <?= $this->Form->create($picture) ?>
    <fieldset>
        <legend><?= __('Add Picture') ?></legend>
        <?php
            echo $this->Form->control('product_id', ['options' => $products]);
            echo $this->Form->control('photo_dir');
            echo $this->Form->control('photo',['type'=>'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary btn-lg btn-default']) ?>
    <?= $this->Form->end() ?>
</div>
