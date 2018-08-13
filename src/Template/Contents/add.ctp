<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Content $content
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
        <div class="col-sm-3 col-md-3 col-lg-3">

    <ul class="nav nav-pills flex-column">
        
 <li><?= $this->Html->link(__('List Contents'), ['action' => 'index']) ?></li>
    
    </ul>

        </div>

<div class="container-fluid">

<div class="col-sm-9 col-md-9 col-lg-9">
   <?= $this->Form->create($content,['type'=>'file']) ?>
    <fieldset>
        <legend><?= __('Add Content') ?></legend>
        <?php
        echo $this->Form->control('lable');
            echo $this->Form->control('link_page',['options'=>$files, 'empty'=>true]);
            echo $this->Form->control('photo_dir',['type'=>'hidden']);
             echo $this->Form->label('Photo');
            echo $this->Form->control('photo',['type'=>'file','label'=>false]);
        ?>
    </fieldset>
    <hr>
    <?= $this->Form->button(__('Speichern'),['class'=>'btn btn-primary btn-lg btn-block']) ?>
    <?= $this->Form->end() ?>
</div>
</div>

