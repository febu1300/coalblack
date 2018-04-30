<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SubCatagory $subCatagory
 */
?>

<div class="container-fluid">
      <div class="modal-header pull-left">
              
                   <legend><?= __('Subkatagorie ändern')?></legend>
                   
                </div>
    <div class="col-sm-1 col-md-1 col-lg-1"></div>
<div class="col-sm-9 col-md-9 col-lg-9">

    <?= $this->Form->create($subCatagory) ?>
    <fieldset>
   
        <?php
            echo $this->Form->control('products_catagory_id', ['options' => $productsCatagories]);
            echo $this->Form->control('sub_catagory_name');
            echo $this->Form->control('photo_dir');
            echo $this->Form->control('photo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>

</div>
</div>
   <div class="clearfix"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Abschließen</button>

                </div>