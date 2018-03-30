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
<div class="transactions form large-9 medium-8 columns content">
    <?= $this->Form->create($transactions) ?>
    <fieldset>
       
        <?php
           echo $this->Form->label('Menge');
            echo $this->Form->control('quantity',['label'=>false]);
               echo $this->Form->label('Einzelpreise');
            echo $this->Form->control('price',['label'=>false,'type' => 'decimal']);
 
        ?>
    </fieldset>

</div>
         <div class="clearfix"></div>
                <div class="modal-footer">
                        <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
<!--                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>-->
                </div>