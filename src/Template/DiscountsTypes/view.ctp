<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DiscountsType $discountsType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Discounts Type'), ['action' => 'edit', $discountsType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Discounts Type'), ['action' => 'delete', $discountsType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $discountsType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Discounts Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Discounts Type'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="discountsTypes view large-9 medium-8 columns content">
    <h3><?= h($discountsType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Discount Type') ?></th>
            <td><?= h($discountsType->discount_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($discountsType->id) ?></td>
        </tr>
    </table>
</div>
