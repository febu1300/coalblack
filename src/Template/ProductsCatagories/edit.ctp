<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductsCatagory $productsCatagory
 */
?>
    <div class="col-sm-1 col-md-1 col-lg-1"></div>
    <div class="col-sm-9 col-md-9 col-lg-9">

    <?= $this->Form->create($productsCatagory) ?>
    <fieldset>
        <legend><?= __('Edit Products Catagory') ?></legend>
        <?php
            echo $this->Form->control('catagory_name');
            echo $this->Form->control('photo_dir');
            echo $this->Form->control('photo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
</div>