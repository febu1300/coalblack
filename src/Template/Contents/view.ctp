<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Content $content
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Content'), ['action' => 'edit', $content->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Content'), ['action' => 'delete', $content->id], ['confirm' => __('Are you sure you want to delete # {0}?', $content->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Contents'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Content'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="contents view large-9 medium-8 columns content">
    <h3><?= h($content->id) ?></h3>
    <table class="vertical-table">

        <tr>
            <th scope="row"><?= __('Lable') ?></th>
            <td><?= h($content->lable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link Page') ?></th>
            <td><?= h($content->link_page) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo Dir') ?></th>
            <td><?= h($content->photo_dir) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo') ?></th>
            <td><?= h($content->photo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($content->id) ?></td>
        </tr>
    </table>
</div>
