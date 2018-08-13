<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MainCatagory $mainCatagory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Main Catagory'), ['action' => 'edit', $mainCatagory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Main Catagory'), ['action' => 'delete', $mainCatagory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mainCatagory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Main Catagories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Main Catagory'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products Catagories'), ['controller' => 'ProductsCatagories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Products Catagory'), ['controller' => 'ProductsCatagories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mainCatagories view large-9 medium-8 columns content">
    <h3><?= h($mainCatagory->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Main Catagory Name') ?></th>
            <td><?= h($mainCatagory->main_catagory_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo Dir') ?></th>
            <td><?= h($mainCatagory->photo_dir) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo') ?></th>
            <td><?= h($mainCatagory->photo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mainCatagory->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Products Catagories') ?></h4>
        <?php if (!empty($mainCatagory->products_catagories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Main Catagory Id') ?></th>
                <th scope="col"><?= __('Catagory Name') ?></th>
                <th scope="col"><?= __('Photo Dir') ?></th>
                <th scope="col"><?= __('Photo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($mainCatagory->products_catagories as $productsCatagories): ?>
            <tr>
                <td><?= h($productsCatagories->id) ?></td>
                <td><?= h($productsCatagories->main_catagory_id) ?></td>
                <td><?= h($productsCatagories->catagory_name) ?></td>
                <td><?= h($productsCatagories->photo_dir) ?></td>
                <td><?= h($productsCatagories->photo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProductsCatagories', 'action' => 'view', $productsCatagories->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProductsCatagories', 'action' => 'edit', $productsCatagories->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProductsCatagories', 'action' => 'delete', $productsCatagories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productsCatagories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
