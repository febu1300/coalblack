<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SubCatagory $subCatagory
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
  
 
          <li class="nav-item"><?= $this->Html->link(__('Subkatagorieliste'), ['controller' => 'SubCatagories', 'action' => 'index']) ?></li>

         <li class="nav-item"><?= $this->Html->link(__('Produktkatagrieliste'), ['controller' => 'ProductsCatagories', 'action' => 'add']) ?></li>
        <li class="nav-item"><?= $this->Html->link(__('Neue Produktkatagrie'), ['controller' => 'ProductsCatagories', 'action' => 'add']) ?></li>

        <li class="nav-item"><?= $this->Html->link(__('Produktliste'), ['action' => 'index']) ?></li>
        <li class="nav-item"><?= $this->Html->link(__('New Produkt'), ['controller' => 'Products', 'action' => 'add']) ?></li>
      
    
    </ul>

        </div>


<div class="container-fluid">

<div class="col-sm-9 col-md-9 col-lg-9">
    <?= $this->Form->create($subCatagory,['type'=>'file']) ?>
    <fieldset>
        <legend><?= __('Neue Subkatagorie anlegen') ?></legend>
      
       
            <div class="row"> 
       
                <?=$this->Form->label('Subkatagorie')?>
                <?php 
  
            echo $this->Form->control('sub_catagory_name', ['options' => $productsCatagories,'label'=>false]); ?>
            </div>
         <hr>
                <div class="row"> 
                     <div class="col-sm-6 col-md-6 col-lg-6">
                    <?php
                         echo $this->Form->label('Subkatagoriename');
            echo $this->Form->control('sub_catagory_name',['label'=>false]);
       
                    ?>
                     </div>
            
               </div>
       <hr>
       
        <div class="row">
        
           <div class="col-sm-6 col-md-6 col-lg-6">
                 <?php
         
         
       
//            echo $this->Form->label('Produktname');
//            echo $this->Form->control('photo_dir',['label'=>false]);
            echo $this->Form->label('Photo');
            echo $this->Form->control('photo',['type'=>'file','label'=>false]);
        ?>
                  </div>     
        </div> 
       
       
    </fieldset>
    <hr>
    <?= $this->Form->button(__('Speichern'),['class'=>'btn btn-primary btn-lg btn-block']) ?>
    <?= $this->Form->end() ?>
</div>
</div>