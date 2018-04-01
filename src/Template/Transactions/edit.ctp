<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transaction $transaction
 */
?>
        
                <div class="modal-header">
<!--                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>-->
                 <legend><?= __('Bestandsaufnahme') ?></legend>
                </div>
             

<div class="col-sm-9 col-md-9 col-lg-9">

    <?= $this->Form->create($transactions) ?>
    <fieldset>
    
        <?php
           echo $this->Form->label('Menge');
            echo $this->Form->control('quantity',['label'=>false]);
               echo $this->Form->label('Einzelpreise');
            echo $this->Form->control('price',['label'=>false,'type' => 'decimal']);
 
        ?>
    </fieldset>
   <hr>         <?= $this->Form->button(__('Speichern'),['class'=>"btn btn-primary"]) ?>
    <?= $this->Form->end() ?>
</div>
         <div class="clearfix"></div>
                <div class="modal-footer">

<!--                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>-->
                </div>