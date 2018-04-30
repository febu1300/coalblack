<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersDetail $usersDetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Users Detail'), ['action' => 'edit', $usersDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Users Detail'), ['action' => 'delete', $usersDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users Detail'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Users Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="usersDetail view large-9 medium-8 columns content">
    <h3><?= h($usersDetail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $usersDetail->has('user') ? $this->Html->link($usersDetail->user->id, ['controller' => 'Users', 'action' => 'view', $usersDetail->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address Line 1') ?></th>
            <td><?= h($usersDetail->address_line_1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address Line 2') ?></th>
            <td><?= h($usersDetail->address_line_2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($usersDetail->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= h($usersDetail->state) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Postal Code') ?></th>
            <td><?= h($usersDetail->postal_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= h($usersDetail->country) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Billing Adress 1') ?></th>
            <td><?= h($usersDetail->billing_adress_1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Billing Adress 2') ?></th>
            <td><?= h($usersDetail->billing_adress_2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Billing Postal Code') ?></th>
            <td><?= h($usersDetail->billing_postal_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Billing City') ?></th>
            <td><?= h($usersDetail->billing_city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Billing State') ?></th>
            <td><?= h($usersDetail->billing_state) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Billing Country') ?></th>
            <td><?= h($usersDetail->billing_country) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($usersDetail->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Main Address') ?></th>
            <td><?= $usersDetail->main_address ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
