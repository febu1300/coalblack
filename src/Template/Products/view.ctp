<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>

  
<div class="container">
    
    <div class="row">
        
    <div class="col-sm-3 col-md-3 col-lg-3">
    <img src="<?='/'. h($product->photo_dir.'/main/'.$product->photo)?>" style="width:150px; height:150px;">
    </div>
        <div class="col-sm-9 col-md-9 col-lg-9">
            <table class="horizontalSlideShow-table">
   
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
            <td><?= $product->has('sub_catagory') ? $this->Html->link($product->sub_catagory->sub_catagory_name, ['controller' => 'SubCatagories', 'action' => 'view', $product->sub_catagory->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Discounts Type') ?></th>
            <td><?= $product->has('discounts_type') ? $this->Html->link($product->discounts_type->discount_type, ['controller' => 'DiscountsTypes', 'action' => 'view', $product->discounts_type->id]) : '' ?></td>
        </tr>
 
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($product->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->currency($product->price,'EUR') ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Discount') ?></th>
            <td><?= $this->Number->format($product->discount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Datum') ?></th>
            <td><?= h($product->created_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Online Vorhanden') ?></th>
            <td><?= $product->online_vorhanden ? __('Ja') : __('Nein'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('New In') ?></th>
            <td><?= $product->new_in ? __('Ja') : __('Nein'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sale') ?></th>
            <td><?= $product->sale ? __('Ja') : __('Nein'); ?></td>
        </tr>
    </table>  
        </div>    
        </div>
      <div class="row">
   
  

      </div>
 
       
   
</div>
   <div class="clearfix"></div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary">Save changes</button>
    </div>