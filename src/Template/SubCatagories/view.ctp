<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SubCatagory $subCatagory
 */
?>
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