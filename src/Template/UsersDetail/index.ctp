<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersDetail[]|\Cake\Collection\CollectionInterface $usersDetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Users Detail'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="usersDetail index large-9 medium-8 columns content">
    <h3><?= __('Users Detail') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address_line_1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address_line_2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city') ?></th>
                <th scope="col"><?= $this->Paginator->sort('state') ?></th>
                <th scope="col"><?= $this->Paginator->sort('postal_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('country') ?></th>
                <th scope="col"><?= $this->Paginator->sort('main_address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('billing_adress_1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('billing_adress_2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('billing_postal_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('billing_city') ?></th>
                <th scope="col"><?= $this->Paginator->sort('billing_state') ?></th>
                <th scope="col"><?= $this->Paginator->sort('billing_country') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usersDetail as $usersDetail): ?>
            <tr>
                <td><?= $this->Number->format($usersDetail->id) ?></td>
                <td><?= $usersDetail->has('user') ? $this->Html->link($usersDetail->user->id, ['controller' => 'Users', 'action' => 'view', $usersDetail->user->id]) : '' ?></td>
                <td><?= h($usersDetail->address_line_1) ?></td>
                <td><?= h($usersDetail->address_line_2) ?></td>
                <td><?= h($usersDetail->city) ?></td>
                <td><?= h($usersDetail->state) ?></td>
                <td><?= h($usersDetail->postal_code) ?></td>
                <td><?= h($usersDetail->country) ?></td>
                <td><?= h($usersDetail->main_address) ?></td>
                <td><?= h($usersDetail->billing_adress_1) ?></td>
                <td><?= h($usersDetail->billing_adress_2) ?></td>
                <td><?= h($usersDetail->billing_postal_code) ?></td>
                <td><?= h($usersDetail->billing_city) ?></td>
                <td><?= h($usersDetail->billing_state) ?></td>
                <td><?= h($usersDetail->billing_country) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $usersDetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usersDetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usersDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersDetail->id)]) ?>
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
