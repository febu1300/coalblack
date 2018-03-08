<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductDetail[]|\Cake\Collection\CollectionInterface $productDetails
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Product Detail'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productDetails index large-9 medium-8 columns content">
    <h3><?= __('Product Details') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('color_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('size_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo_dir') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productDetails as $productDetail): ?>
            <tr>
                <td><?= $this->Number->format($productDetail->id) ?></td>
                <td><?= $productDetail->has('product') ? $this->Html->link($productDetail->product->id, ['controller' => 'Products', 'action' => 'view', $productDetail->product->id]) : '' ?></td>
                <td><?= h($productDetail->description) ?></td>
                <td><?= $this->Number->format($productDetail->color_id) ?></td>
                <td><?= $this->Number->format($productDetail->size_id) ?></td>
                <td><?= h($productDetail->photo_dir) ?></td>
                <td><?= h($productDetail->photo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $productDetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productDetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productDetail->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
