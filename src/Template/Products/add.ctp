<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
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
        <div class="col-sm-3 col-md-3 col-lg-3">

    <ul class="nav nav-pills flex-column">
  
        <li class="nav-item"><?= $this->Html->link(__('Produktliste'), ['action' => 'index']) ?></li>
        <li class="nav-item"><?= $this->Html->link(__('Lagerbestandverwalten'), ['controller' => 'Transactions', 'action' => 'bestandsposten']) ?></li>
        <li class="nav-item"><?= $this->Html->link(__('Subkatagorieliste'), ['controller' => 'SubCatagories', 'action' => 'index']) ?></li>
        <li class="nav-item"><?= $this->Html->link(__('Angebotsverwalten'), ['controller' => 'DiscountsTypes', 'action' => 'index']) ?></li>
        <li class="nav-item"><?= $this->Html->link(__('Produktdetailbearbeiten'), ['controller' => 'ProductsDetails', 'action' => 'index']) ?></li>
       <li class="nav-item"><?= $this->Html->link(__('Neueproduktdetail'), ['controller' => 'ProductsDetails', 'action' => 'add']) ?></li>
      
    
    </ul>

        </div>
<div class="col-sm-9 col-md-9 col-lg-9">
    <?= $this->Form->create($product,['type'=>'file']) ?>
    <fieldset>
        <legend><?= __('Neue Produkt hinzufügen') ?></legend>
      
       
            <div class="row"> 
                <?php 
            echo $this->Form->label('Subkatagorie');
            echo $this->Form->control('sub_catagory_id', ['options' => $subCatagories,'label'=>false]); ?>
            </div>
         <hr>
                <div class="row"> 
                     <div class="col-sm-6 col-md-6 col-lg-6">
                    <?php
                         echo $this->Form->label('Produktname');
            echo $this->Form->control('product_name',['label'=>false]);
                        echo $this->Form->label('Produkttitle');
            echo $this->Form->control('product_title',['label'=>false]);
           echo $this->Form->label('Einheit');
            echo $this->Form->control('unit',['label'=>false]);
                    ?>
                     </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                    <?php
        
            echo $this->Form->label('Produktsbeschreibung');
            echo $this->Form->control('product_description',['label'=>false,'style'=>'width:300px']);
 
                    ?> 
                    </div>
               </div>
       <hr>
       
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                         <?php
            echo $this->Form->label('Verkaufspreise');
            echo $this->Form->control('price',['label'=>false,'type' => 'decimal']);
         
     
            ?>
            </div>
           <div class="col-sm-6 col-md-6 col-lg-6">
                 <?php
            echo $this->Form->label('Online Vorhanden');
            echo $this->Form->control('online_vorhanden');
           
         
       
//            echo $this->Form->label('Produktname');
//            echo $this->Form->control('photo_dir',['label'=>false]);
            echo $this->Form->label('Photo');
            echo $this->Form->control('photo',['type'=>'file','label'=>false]);
        ?>
                  </div>     
        </div> 
       <div class="row">
             <div class="col-sm-6 col-md-6 col-lg-6">
             <?php
              echo $this->Form->label('Newin anmerken');
            echo $this->Form->control('new_in');
            ?></div>
                   <div class="col-sm-6 col-md-6 col-lg-6">
                <?php
            echo $this->Form->label('Sale anmerken');
            echo $this->Form->control('sale');
             ?>
                       </div>
       </div><hr>
            <div class="row">
             <div class="col-sm-6 col-md-6 col-lg-6">
             <?php
             echo $this->Form->label('Angebotname');
            echo $this->Form->control('discount_type_id', ['options' => $discountsTypes,'label'=>false]);
            ?></div>
                   <div class="col-sm-6 col-md-6 col-lg-6">
                <?php
                echo $this->Form->label('Angebotsbetrag');
            echo $this->Form->control('discount',['label'=>false]);
             ?>
                       </div>
       </div>
    </fieldset>
    <hr>
    <?= $this->Form->button(__('Speichern'),['class'=>'btn btn-primary btn-lg btn-block']) ?>
    <?= $this->Form->end() ?>
</div>
</div>