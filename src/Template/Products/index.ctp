<?php
use Cake\I18n\I18n;
I18n::setLocale('de_DE');
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
 */
?><div class="container-fluid">
<nav class="navbar navbar-expand-lg navbar-dark bg-light " >
  <a class="navbar-brand" href="#">Navbar</a>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
  
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="/transactions"><span class="glyphicon glyphicon-bell"></span>  <span class="badge badge-secondary bg-danger badge-pill"><?=$this->cell('Notification')?></span></a></li>
     
      <li><a href="/users/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
<div class="row">
        <div class="col-sm-2 col-md-2 col-lg-2">
<nav class="navbar navbar-expand-lg navbar-dark bg-light" id="actions-sidebar">
    <ul class="nav nav-pills flex-column">

        <li  class="nav-item"><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?></li>
        <li  class="nav-item"><?= $this->Html->link(__('List Sub Catagories'), ['controller' => 'SubCatagories', 'action' => 'index']) ?></li>
        <li  class="nav-item"><?= $this->Html->link(__('New Sub Catagory'), ['controller' => 'SubCatagories', 'action' => 'add']) ?></li>
        <li  class="nav-item"><?= $this->Html->link(__('List Discounts Types'), ['controller' => 'DiscountsTypes', 'action' => 'index']) ?></li>
        <li  class="nav-item"><?= $this->Html->link(__('New Discounts Type'), ['controller' => 'DiscountsTypes', 'action' => 'add']) ?></li>
                <li  class="nav-item"><?= $this->Html->link(__('List Colors'), ['controller' => 'Colors', 'action' => 'index']) ?></li>
                <li  class="nav-item"><?= $this->Html->link(__('List Sizes'), ['controller' => 'Sizes', 'action' => 'index']) ?></li>

        <li  class="nav-item"><?= $this->Html->link(__('List Product Details'), ['controller' => 'ProductsDetails', 'action' => 'index']) ?></li>
        <li  class="nav-item"><?= $this->Html->link(__('New Product Detail'), ['controller' => 'ProductsDetails', 'action' => 'add']) ?></li>
        <li  class="nav-item"><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?></li>
        <li  class="nav-item"><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?></li>
        <li  class="nav-item"><?= $this->Html->link(__('List Product Prices'), ['controller' => 'ProductPrices', 'action' => 'index']) ?></li>
        <li  class="nav-item"><?= $this->Html->link(__('New Product Price'), ['controller' => 'ProductPrices', 'action' => 'add']) ?></li>
    </ul>
</nav>
        </div>
<div class="col-sm-10 col-md-10 col-lg-10">
    <h3><?= __('Produkte') ?></h3>
    <table class="table table-sm table-bordered "  cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sub_catagory_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('unit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('online_vorhanden') ?></th>
                <th scope="col"><?= $this->Paginator->sort('new_in') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sale') ?></th>
                <th scope="col"><?= $this->Paginator->sort('discount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('discount_type_id') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('size_id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('color_id') ?></th>
   
                <th scope="col"><?= $this->Paginator->sort('photo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $this->Number->format($product->id) ?></td>
                <td><?= h($product->product_name) ?></td>
                <td><?= h($product->product_title) ?></td>
                <td><?= h($product->product_description) ?></td>
                <td><?= $product->has('sub_catagory') ? $this->Html->link($product->sub_catagory->sub_catagory_name, ['controller' => 'SubCatagories', 'action' => 'view', $product->sub_catagory->id]) : '' ?></td>
                <td><?= h($product->created_date) ?></td>
                <td><?= $this->Number->currency($product->price,'EUR') ?></td>
               <td><?= h($product->unit) ?></td>
               <td><?=  h($product->online_vorhanden) ? __('<span class="badge badge-success">Ja</span>') : __('<span class="badge badge-pill badge-primary">Nein</span>'); ?></td>
               <td><?=  h($product->new_in) ? __('<span class="badge badge-success">Ja</span>') : __('<span class="badge badge-pill badge-primary">Nein</span>'); ?></td>
               <td><?=  h($product->sale) ? __('<span class="badge badge-success">Ja</span>') : __('<span class="badge badge-pill badge-primary">Nein</span>'); ?></td>

                <td><?= $this->Number->format($product->discount) ?></td>
                <td><?= $product->has('discounts_type') ? $this->Html->link($product->discounts_type->discount_type, ['controller' => 'DiscountsTypes', 'action' => 'view', $product->discounts_type->id]) : '' ?></td>
                                <td><?= $product->has('size') ? $this->Html->link($product->size->id, ['controller' => 'Size', 'action' => 'view', $product->size->id]) : '' ?></td>
                <td><?= $product->has('color') ? $this->Html->link($product->color->id, ['controller' => 'Color', 'action' => 'view', $product->color->id]) : '' ?></td>

    <td><img src="<?='/'. h($product->photo_dir.'/thumb/'.$product->photo)?>"></td>
                <td class="actions">
                             <?= $this->Html->link(__(' '), ['action' => 'view', $product->id],['class'=>" glyphicon glyphicon-eye-open",'data-toggle'=>"modal",'data-target'=>"#viewProduct"]) ?>
                    <?= $this->Html->link(__(' '), ['action' => 'edit', $product->id],['class'=>"glyphicon glyphicon-edit",'data-toggle'=>"modal",'data-target'=>"#editProduct"]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Seite {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
</div></div>


    <div id="viewProduct" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                     
                <div class="modal-body">                                       
   

   


                    </div>
                    <div class="clearfix"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

       
    
<!--        Edit Products-->
    <div id="editProduct" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                     
                <div class="modal-body">   




               </div>
                    <div class="clearfix"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
