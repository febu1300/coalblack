<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SubCatagory[]|\Cake\Collection\CollectionInterface $subCatagories
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sub Catagory'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products Catagories'), ['controller' => 'ProductsCatagories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Products Catagory'), ['controller' => 'ProductsCatagories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="subCatagories index large-9 medium-8 columns content">
    <h3><?= __('Sub Catagories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('products_catagory_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sub_catagory_name') ?></th>
            
                <th scope="col"><?= $this->Paginator->sort('photo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($subCatagories as $subCatagory): ?>
            <tr>
                <td><?= $this->Number->format($subCatagory->id) ?></td>
                <td><?= $subCatagory->has('products_catagory') ? $this->Html->link($subCatagory->products_catagory->id, ['controller' => 'ProductsCatagories', 'action' => 'view', $subCatagory->products_catagory->id]) : '' ?></td>
                <td><?= h($subCatagory->sub_catagory_name) ?></td>
            <td><img src="<?='/'. h($subCatagory->photo_dir.'/thumb/'.$subCatagory->photo)?>"></td>
     
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $subCatagory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $subCatagory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $subCatagory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subCatagory->id)]) ?>
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
