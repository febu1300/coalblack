<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usergroup $usergroup
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Usergroup'), ['action' => 'edit', $usergroup->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Usergroup'), ['action' => 'delete', $usergroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usergroup->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Usergroups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usergroup'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="usergroups view large-9 medium-8 columns content">
    <h3><?= h($usergroup->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= h($usergroup->role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($usergroup->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($usergroup->id) ?></td>
        </tr>
    </table>
</div>
