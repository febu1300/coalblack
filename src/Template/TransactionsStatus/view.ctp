<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TransactionsStatus $transactionsStatus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Transactions Status'), ['action' => 'edit', $transactionsStatus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Transactions Status'), ['action' => 'delete', $transactionsStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transactionsStatus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Transactions Status'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transactions Status'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="transactionsStatus view large-9 medium-8 columns content">
    <h3><?= h($transactionsStatus->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($transactionsStatus->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($transactionsStatus->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Transactions') ?></h4>
        <?php if (!empty($transactionsStatus->transactions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Transaction Type Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Created Date') ?></th>
                <th scope="col"><?= __('Updated Date') ?></th>
                <th scope="col"><?= __('Canceled Date') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Transaction Number') ?></th>
                <th scope="col"><?= __('Transaction Status Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($transactionsStatus->transactions as $transactions): ?>
            <tr>
                <td><?= h($transactions->id) ?></td>
                <td><?= h($transactions->transaction_type_id) ?></td>
                <td><?= h($transactions->product_id) ?></td>
                <td><?= h($transactions->user_id) ?></td>
                <td><?= h($transactions->created_date) ?></td>
                <td><?= h($transactions->updated_date) ?></td>
                <td><?= h($transactions->canceled_date) ?></td>
                <td><?= h($transactions->quantity) ?></td>
                <td><?= h($transactions->price) ?></td>
                <td><?= h($transactions->transaction_number) ?></td>
                <td><?= h($transactions->transaction_status_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Transactions', 'action' => 'view', $transactions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Transactions', 'action' => 'edit', $transactions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Transactions', 'action' => 'delete', $transactions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transactions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
