<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductsDetail[]|\Cake\Collection\CollectionInterface $productsDetails
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Products Detail'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productsDetails index large-9 medium-8 columns content">
    <h3><?= __('Products Details') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo_dir') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productsDetails as $productsDetail): ?>
            <tr>
                <td><?= $this->Number->format($productsDetail->id) ?></td>
                <td><?= $productsDetail->has('product') ? $this->Html->link($productsDetail->product->id, ['controller' => 'Products', 'action' => 'view', $productsDetail->product->id]) : '' ?></td>
                <td><?= h($productsDetail->description) ?></td>
                <td><?= h($productsDetail->photo_dir) ?></td>
                <td><?= h($productsDetail->photo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $productsDetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productsDetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productsDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productsDetail->id)]) ?>
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
