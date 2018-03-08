<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductsCatagory $productsCatagory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Products Catagories'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="productsCatagories form large-9 medium-8 columns content">
    <?= $this->Form->create($productsCatagory,['type'=>'file']) ?>
    <fieldset>
        <legend><?= __('Add Products Catagory') ?></legend>
        <?php
            echo $this->Form->control('catagory_name');
            echo $this->Form->control('photo_dir');
            echo $this->Form->input('photo',['type'=>'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
