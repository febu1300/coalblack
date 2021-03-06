<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>

<div class="container-fluid">

    
<div class="col-sm-9 col-md-9 col-lg-9">
    <?= $this->Form->create($product) ?>
    <fieldset>
     <legend><?= __('Edit Products ')?></legend>
      
       
            <div class="row"> 
                <?php 
            echo $this->Form->label('Subkatagorie');
            echo $this->Form->control('sub_catagory_id', ['options' => $subCatagories,'empty'=>true,'label'=>false]); ?>
            </div>
         <hr>
                <div class="row"> 
                     <div class="col-sm-4 col-md-4 col-lg-4">
                    <?php
                         echo $this->Form->label('Produktname');
            echo $this->Form->control('product_name',['label'=>false]);
                        echo $this->Form->label('Produkttitle');
            echo $this->Form->control('product_title',['label'=>false]);
           echo $this->Form->label('InitialStock');
            echo $this->Form->control('initial_stock',['label'=>false, 'type'=>'number','step'=>'1']);
                    ?>
                     </div>
                         <div class="col-sm-4 col-md-4 col-lg-4">
                             
               <?php
             echo $this->Form->label('Size');
            echo $this->Form->control('size',['label'=>false]);
            ?>     
                <?php
             echo $this->Form->label('Colors');
            echo $this->Form->control('color',['label'=>false]);
            ?>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
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
            echo $this->Form->control('price',['label'=>false, 'step'=>'1.00']);
         
     
         
            echo $this->Form->label('Coalblack Produkte');
            echo $this->Form->control('coalblack_produkte');
         
     
            ?> 
             
            </div>
           <div class="col-sm-6 col-md-6 col-lg-6">
                 <?php
            echo $this->Form->label('Online Vorhanden');
            echo $this->Form->control('online_vorhanden');
           
         
       
//            echo $this->Form->label('Produktname');
//            echo $this->Form->control('photo_dir',['label'=>false]);
         
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