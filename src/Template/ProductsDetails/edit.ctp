<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductsDetail $productsDetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $productsDetail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $productsDetail->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Products Details'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productsDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($productsDetail) ?>
    <fieldset>
        <legend><?= __('Edit Products Detail') ?></legend>
        <?php
            echo $this->Form->control('product_id', ['options' => $products]);
            echo $this->Form->control('description');
            echo $this->Form->control('photo_dir');
            echo $this->Form->control('photo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
