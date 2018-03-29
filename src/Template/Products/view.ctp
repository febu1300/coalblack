<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sub Catagories'), ['controller' => 'SubCatagories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sub Catagory'), ['controller' => 'SubCatagories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Discounts Types'), ['controller' => 'DiscountsTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Discounts Type'), ['controller' => 'DiscountsTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Details'), ['controller' => 'ProductsDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Detail'), ['controller' => 'ProductsDetails', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Prices'), ['controller' => 'ProductPrices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Price'), ['controller' => 'ProductPrices', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="products view large-9 medium-8 columns content">

    <img src="<?='/'. h($product->photo_dir.'/main/'.$product->photo)?>">
    <h3><?= h($product->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Product Name') ?></th>
            <td><?= h($product->product_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Title') ?></th>
            <td><?= h($product->product_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Description') ?></th>
            <td><?= h($product->product_description) ?></td>
        </tr>
            <tr>
            <th scope="row"><?= __('Unit') ?></th>
            <td><?= h($product->unit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sub Catagory') ?></th>
            <td><?= $product->has('sub_catagory') ? $this->Html->link($product->sub_catagory->id, ['controller' => 'SubCatagories', 'action' => 'view', $product->sub_catagory->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Discounts Type') ?></th>
            <td><?= $product->has('discounts_type') ? $this->Html->link($product->discounts_type->id, ['controller' => 'DiscountsTypes', 'action' => 'view', $product->discounts_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo Dir') ?></th>
            <td><?= h($product->photo_dir) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo') ?></th>
            <td><?= h($product->photo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($product->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($product->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Discount') ?></th>
            <td><?= $this->Number->format($product->discount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created Date') ?></th>
            <td><?= h($product->created_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Online Vorhanden') ?></th>
            <td><?= $product->online_vorhanden ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('New In') ?></th>
            <td><?= $product->new_in ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sale') ?></th>
            <td><?= $product->sale ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Product Details') ?></h4>
        <?php if (!empty($product->product_details)): ?>
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
            <?php foreach ($product->product_details as $productDetails): ?>
            <tr>
                <td><?= h($productDetails->id) ?></td>
                <td><?= h($productDetails->product_id) ?></td>
                <td><?= h($productDetails->description) ?></td>
                
                <td><?= h($productDetails->color_id) ?></td>
                <td><?= h($productDetails->size_id) ?></td>
                <td><?= h($productDetails->photo_dir) ?></td>
                <td><?= h($productDetails->photo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProductsDetails', 'action' => 'view', $productDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProductsDetails', 'action' => 'edit', $productDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProductsDetails', 'action' => 'delete', $productDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Transactions') ?></h4>
        <?php if (!empty($product->transactions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Transaction Type Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Transaction Date') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Transaction Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->transactions as $transactions): ?>
            <tr>
                <td><?= h($transactions->id) ?></td>
                <td><?= h($transactions->transaction_type_id) ?></td>
                <td><?= h($transactions->product_id) ?></td>
                <td><?= h($transactions->user_id) ?></td>
                <td><?= h($transactions->transaction_date) ?></td>
                <td><?= h($transactions->quantity) ?></td>
                <td><?= h($transactions->price) ?></td>
                <td><?= h($transactions->transaction_status) ?></td>
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
        <h4><?= __('Related Product Prices') ?></h4>
        <?php if (!empty($product->product_prices)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Products Id') ?></th>
                <th scope="col"><?= __('Valid From') ?></th>
                <th scope="col"><?= __('Expire At') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->product_prices as $productPrices): ?>
            <tr>
                <td><?= h($productPrices->id) ?></td>
                <td><?= h($productPrices->products_id) ?></td>
                <td><?= h($productPrices->valid_from) ?></td>
                <td><?= h($productPrices->Expire_at) ?></td>
                <td><?= h($productPrices->price) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProductPrices', 'action' => 'view', $productPrices->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProductPrices', 'action' => 'edit', $productPrices->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProductPrices', 'action' => 'delete', $productPrices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productPrices->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
