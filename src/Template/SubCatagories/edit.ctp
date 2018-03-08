<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SubCatagory $subCatagory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $subCatagory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $subCatagory->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sub Catagories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Products Catagories'), ['controller' => 'ProductsCatagories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Products Catagory'), ['controller' => 'ProductsCatagories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="subCatagories form large-9 medium-8 columns content">
    <?= $this->Form->create($subCatagory) ?>
    <fieldset>
        <legend><?= __('Edit Sub Catagory') ?></legend>
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
