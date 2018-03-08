<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductDetail $productDetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product Detail'), ['action' => 'edit', $productDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product Detail'), ['action' => 'delete', $productDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productDetails view large-9 medium-8 columns content">
    <h3><?= h($productDetail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $productDetail->has('product') ? $this->Html->link($productDetail->product->id, ['controller' => 'Products', 'action' => 'view', $productDetail->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($productDetail->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo Dir') ?></th>
            <td><?= h($productDetail->photo_dir) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo') ?></th>
            <td><?= h($productDetail->photo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($productDetail->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Color Id') ?></th>
            <td><?= $this->Number->format($productDetail->color_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Size Id') ?></th>
            <td><?= $this->Number->format($productDetail->size_id) ?></td>
        </tr>
    </table>
</div>
