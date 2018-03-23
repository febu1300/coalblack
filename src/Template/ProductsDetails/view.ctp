<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductsDetail $productsDetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Products Detail'), ['action' => 'edit', $productsDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Products Detail'), ['action' => 'delete', $productsDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productsDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Products Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Products Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productsDetails view large-9 medium-8 columns content">
    <h3><?= h($productsDetail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $productsDetail->has('product') ? $this->Html->link($productsDetail->product->id, ['controller' => 'Products', 'action' => 'view', $productsDetail->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($productsDetail->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo Dir') ?></th>
            <td><?= h($productsDetail->photo_dir) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo') ?></th>
            <td><?= h($productsDetail->photo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($productsDetail->id) ?></td>
        </tr>
    </table>
</div>
