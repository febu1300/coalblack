<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SubCatagory $subCatagory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sub Catagory'), ['action' => 'edit', $subCatagory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sub Catagory'), ['action' => 'delete', $subCatagory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subCatagory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sub Catagories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sub Catagory'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products Catagories'), ['controller' => 'ProductsCatagories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Products Catagory'), ['controller' => 'ProductsCatagories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="subCatagories view large-9 medium-8 columns content">
    <img src="<?='/'. h($subCatagory->photo_dir.'/main/'.$subCatagory->photo)?>">
    <h3><?= h($subCatagory->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Products Catagory') ?></th>
            <td><?= $subCatagory->has('products_catagory') ? $this->Html->link($subCatagory->products_catagory->id, ['controller' => 'ProductsCatagories', 'action' => 'view', $subCatagory->products_catagory->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sub Catagory Name') ?></th>
            <td><?= h($subCatagory->sub_catagory_name) ?></td>
        </tr>
 
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($subCatagory->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Products') ?></h4>
        <?php if (!empty($subCatagory->products)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Product Name') ?></th>
                <th scope="col"><?= __('Product Title') ?></th>
                <th scope="col"><?= __('Product Description') ?></th>
                <th scope="col"><?= __('Sub Catagory Id') ?></th>
                <th scope="col"><?= __('Created Date') ?></th>
                <th scope="col"><?= __('Online Vorhanden') ?></th>
                <th scope="col"><?= __('New In') ?></th>
                <th scope="col"><?= __('Sale') ?></th>
                <th scope="col"><?= __('Photo Dir') ?></th>
                <th scope="col"><?= __('Photo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($subCatagory->products as $products): ?>
            <tr>
                <td><?= h($products->id) ?></td>
                <td><?= h($products->product_name) ?></td>
                <td><?= h($products->product_title) ?></td>
                <td><?= h($products->product_description) ?></td>
                <td><?= h($products->sub_catagory_id) ?></td>
                <td><?= h($products->created_date) ?></td>
                <td><?= h($products->online_vorhanden) ?></td>
                <td><?= h($products->new_in) ?></td>
                <td><?= h($products->sale) ?></td>
             
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $products->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $products->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Products', 'action' => 'delete', $products->id], ['confirm' => __('Are you sure you want to delete # {0}?', $products->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
