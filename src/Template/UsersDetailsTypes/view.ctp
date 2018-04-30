<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersDetailsType $usersDetailsType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Users Details Type'), ['action' => 'edit', $usersDetailsType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Users Details Type'), ['action' => 'delete', $usersDetailsType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersDetailsType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users Details Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Users Details Type'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="usersDetailsTypes view large-9 medium-8 columns content">
    <h3><?= h($usersDetailsType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Addres Type') ?></th>
            <td><?= h($usersDetailsType->addres_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($usersDetailsType->id) ?></td>
        </tr>
    </table>
</div>
