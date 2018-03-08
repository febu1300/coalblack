<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductDetail $productDetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $productDetail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $productDetail->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Product Details'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($productDetail) ?>
    <fieldset>
        <legend><?= __('Edit Product Detail') ?></legend>
        <?php
            echo $this->Form->control('product_id', ['options' => $products]);
            echo $this->Form->control('description');
            echo $this->Form->control('color_id');
            echo $this->Form->control('size_id');
            echo $this->Form->control('photo_dir');
            echo $this->Form->control('photo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
