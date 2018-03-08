<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transaction $transaction
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Transactions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Transaction Types'), ['controller' => 'TransactionTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transaction Type'), ['controller' => 'TransactionTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Transactions Status'), ['controller' => 'TransactionsStatus', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transactions Status'), ['controller' => 'TransactionsStatus', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="transactions form large-9 medium-8 columns content">
    <?= $this->Form->create($transaction) ?>
    <fieldset>
        <legend><?= __('Add Transaction') ?></legend>
        <?php
            echo $this->Form->control('transaction_type_id', ['options' => $transactionTypes]);
            echo $this->Form->control('product_id', ['options' => $products]);
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('created_date');
            echo $this->Form->control('updated_date', ['empty' => true]);
            echo $this->Form->control('canceled_date', ['empty' => true]);
            echo $this->Form->control('quantity');
            echo $this->Form->control('price');
            echo $this->Form->control('transaction_number');
            echo $this->Form->control('transaction_status_id', ['options' => $transactionsStatus]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
