<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductsCatagory $productsCatagory
 */
?>
 

              

   
   <div class="container-fluid">

<div class="col-sm-9 col-md-9 col-lg-9">
    <?= $this->Form->create($productsCatagory) ?>
    <fieldset>
        <legend><?= __('Edit Product Catagory') ?></legend>
     

                <div class="row"> 
                     <div class="col-sm-6 col-md-6 col-lg-6">
                    <?php
                         echo $this->Form->label('Hauptkatagorie');
         echo $this->Form->control('main_catagory_id', ['options' => $mainCatagories,'empty' => true, 'label'=>false]);

       
                    ?>
                     </div>
            
               </div>
                <div class="row"> 
                     <div class="col-sm-6 col-md-6 col-lg-6">
                    <?php
                         echo $this->Form->label('Products catagory name');
            echo $this->Form->control('catagory_name',['label'=>false]);
       
                    ?>
                     </div>
            
               </div>
       <hr>
       
        <div class="row">
        
           <div class="col-sm-6 col-md-6 col-lg-6">
                 <?php
         
         
            echo $this->Form->control('photo_dir',['type'=>'hidden']);

        
            echo $this->Form->control('photo',['type'=>'hidden']);
        ?>
                  </div>     
        </div> 
       
       
    </fieldset>
    <hr>
    <?= $this->Form->button(__('Speichern'),['class'=>'btn btn-primary btn-lg btn-block']) ?>
    <?= $this->Form->end() ?>
</div>
</div>
   