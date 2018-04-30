<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Color $color
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Color'), ['action' => 'edit', $color->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Color'), ['action' => 'delete', $color->id], ['confirm' => __('Are you sure you want to delete # {0}?', $color->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Colors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Color'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Details'), ['controller' => 'ProductsDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Detail'), ['controller' => 'ProductsDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="colors view large-9 medium-8 columns content">
    <h3><?= h($color->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Color') ?></th>
            <td><?= h($color->color) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($color->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Product Details') ?></h4>
        <?php if (!empty($color->product_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Color Id') ?></th>
                <th scope="col"><?= __('Size Id') ?></th>
                <th scope="col"><?= __('Photo Dir') ?></th>
                <th scope="col"><?= __('Photo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($color->product_details as $productDetails): ?>
            <tr>
                <td><?= h($productDetails->id) ?></td>
                <td><?= h($productDetails->product_id) ?></td>
                <td><?= h($productDetails->description) ?></td>
                <td><?= h($productDetails->color_id) ?></td>
                <td><?= h($productDetails->size_id) ?></td>
                <td><?= h($productDetails->photo_dir) ?></td>
                <td><?= h($productDetails->photo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProductDetails', 'action' => 'view', $productDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProductDetails', 'action' => 'edit', $productDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProductDetails', 'action' => 'delete', $productDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
