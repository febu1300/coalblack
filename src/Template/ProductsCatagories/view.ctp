<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductsCatagory $productsCatagory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Products Catagory'), ['action' => 'edit', $productsCatagory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Products Catagory'), ['action' => 'delete', $productsCatagory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productsCatagory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Products Catagories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Products Catagory'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productsCatagories view large-9 medium-8 columns content">
    <img src="<?='/'. h($productsCatagory->photo_dir.'/main/'.$productsCatagory->photo)?>">
    <h3><?= h($productsCatagory->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Catagory Name') ?></th>
            <td><?= h($productsCatagory->catagory_name) ?></td>
        </tr>
        <tr>
<!--            <th scope="row"><?php// __('Photo Dir') ?></th>
            <td><?php// h($productsCatagory->photo_dir) ?></td>-->
        </tr>
        <tr>
<!--            <th scope="row"><?php// __('Photo') ?></th>
            <td><?php// h($productsCatagory->photo_dir.$productsCatagory->photo)?> </td>-->
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($productsCatagory->id) ?></td>
        </tr>
    </table>
</div>
