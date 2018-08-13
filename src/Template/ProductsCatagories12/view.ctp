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








<div class="modal-header pull-left">
        <h3><?= h($subCatagory->id) ?>.<?= h($subCatagory->sub_catagory_name) ?></h3>
</div>


<div class="container">
    
    <div class="row">
        
    <div class="col-sm-3 col-md-3 col-lg-3">
    <img src="<?='/'. h($subCatagory->photo_dir.'/main/'.$subCatagory->photo)?>">

      </div>
   <div class="col-sm-9 col-md-9 col-lg-9">
            <table class="horizontalSlideShow-table">
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
         </div>    
        </div>

   
    <div class="related">
        <h4><?= __('verwandete Artikeln') ?></h4>
        <?php if (!empty($subCatagory->products)): ?>
        <table table table-sm table-bordered  cellpadding="0" cellspacing="0">
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
             
    
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    </div>
<div class="clearfix"></div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary">Save changes</button>
    </div>

