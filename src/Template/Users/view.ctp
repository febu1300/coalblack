<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Usergroups'), ['controller' => 'Usergroups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usergroup'), ['controller' => 'Usergroups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users Detail'), ['controller' => 'UsersDetail', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Users Detail'), ['controller' => 'UsersDetail', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Usergroup') ?></th>
            <td><?= $user->has('usergroup') ? $this->Html->link($user->usergroup->id, ['controller' => 'Usergroups', 'action' => 'view', $user->usergroup->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($user->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($user->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Transactions') ?></h4>
        <?php if (!empty($user->transactions)): ?>
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
            <?php foreach ($user->transactions as $transactions): ?>
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
    <div class="related">
        <h4><?= __('Related Users Detail') ?></h4>
        <?php if (!empty($user->users_detail)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Address Line 1') ?></th>
                <th scope="col"><?= __('Address Line 2') ?></th>
                <th scope="col"><?= __('City') ?></th>
                <th scope="col"><?= __('State') ?></th>
                <th scope="col"><?= __('Postal Code') ?></th>
                <th scope="col"><?= __('Country') ?></th>
                <th scope="col"><?= __('Main Address') ?></th>
                <th scope="col"><?= __('Billing Adress 1') ?></th>
                <th scope="col"><?= __('Billing Adress 2') ?></th>
                <th scope="col"><?= __('Billing Postal Code') ?></th>
                <th scope="col"><?= __('Billing City') ?></th>
                <th scope="col"><?= __('Billing State') ?></th>
                <th scope="col"><?= __('Billing Country') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->users_detail as $usersDetail): ?>
            <tr>
                <td><?= h($usersDetail->id) ?></td>
                <td><?= h($usersDetail->user_id) ?></td>
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
                    <?= $this->Html->link(__('View'), ['controller' => 'UsersDetail', 'action' => 'view', $usersDetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UsersDetail', 'action' => 'edit', $usersDetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UsersDetail', 'action' => 'delete', $usersDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersDetail->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
