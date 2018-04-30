<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersDetailsType[]|\Cake\Collection\CollectionInterface $usersDetailsTypes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Users Details Type'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="usersDetailsTypes index large-9 medium-8 columns content">
    <h3><?= __('Users Details Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('addres_type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usersDetailsTypes as $usersDetailsType): ?>
            <tr>
                <td><?= $this->Number->format($usersDetailsType->id) ?></td>
                <td><?= h($usersDetailsType->addres_type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $usersDetailsType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usersDetailsType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usersDetailsType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersDetailsType->id)]) ?>
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
