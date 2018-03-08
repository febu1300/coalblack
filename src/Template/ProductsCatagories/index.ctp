<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductsCatagory[]|\Cake\Collection\CollectionInterface $productsCatagories
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Products Catagory'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sub-Catagories'), ['controller' => 'SubCatagories', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="productsCatagories index large-9 medium-8 columns content">
    <h3><?= __('Products Catagories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('catagory_name') ?></th>
          
                <th scope="col"><?= $this->Paginator->sort('photo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productsCatagories as $productsCatagory): ?>
            <tr>
                <td><?= $this->Number->format($productsCatagory->id) ?></td>
                <td><?= h($productsCatagory->catagory_name) ?></td>
               <td><img src="<?='/'. h($productsCatagory->photo_dir.'/thumb/'.$productsCatagory->photo)?>"></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $productsCatagory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productsCatagory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productsCatagory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productsCatagory->id)]) ?>
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
