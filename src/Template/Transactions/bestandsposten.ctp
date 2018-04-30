<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
 */
?> 
<style>
@media (min-width: 768px) {
  .modal-dialog {
    width: 600;
    margin: 30px auto;
  }
  .modal-content {
    -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
  }
  .modal-sm {
    width: 300px;
  }
}
</style>
<div class="container-fluid">
<nav class="navbar navbar-expand-lg  bg-light " >
  <a class="navbar-brand" href="/dashboard">Dashboard</a>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      
      </li>
  
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="/transactions"><span class="glyphicon glyphicon-bell"></span>  <span class="badge badge-secondary bg-danger badge-pill"><?=$this->cell('Notification')?></span></a></li>
     
      <li><a href="/users/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>

    <div class="col-sm-3 col-md-3 col-lg-3">
<nav class="navbar navbar-expand-lg navbar-dark bg-light" id="actions-sidebar">
    <ul class="nav nav-pills flex-column">
             <li class="nav-item"><?= $this->Html->link(__('Produktliste'), ['controller' => 'Products', 'action' => 'index']) ?></li>
       <li class="nav-item"><?= $this->Html->link(__('Neue Produkt'), ['controller'=>'products','action' => 'add']) ?></li>
        <li class="nav-item"><?= $this->Html->link(__('List Sub Catagories'), ['controller' => 'SubCatagories', 'action' => 'index']) ?></li>
        <li class="nav-item"><?= $this->Html->link(__('New Sub Catagory'), ['controller' => 'SubCatagories', 'action' => 'add']) ?></li>
        <li class="nav-item"><?= $this->Html->link(__('List Discounts Types'), ['controller' => 'DiscountsTypes', 'action' => 'index']) ?></li>
        <li class="nav-item"><?= $this->Html->link(__('New Discounts Type'), ['controller' => 'DiscountsTypes', 'action' => 'add']) ?></li>


        <li class="nav-item"><?= $this->Html->link(__('List Product Details'), ['controller' => 'ProductsDetails', 'action' => 'index']) ?></li>
        <li class="nav-item"><?= $this->Html->link(__('New Product Detail'), ['controller' => 'ProductsDetails', 'action' => 'add']) ?></li>
        <li class="nav-item"><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?></li>
        <li class="nav-item"><?= $this->Html->link(__('List Product Prices'), ['controller' => 'ProductPrices', 'action' => 'index']) ?></li>
        <li class="nav-item"><?= $this->Html->link(__('New Product Price'), ['controller' => 'ProductPrices', 'action' => 'add']) ?></li>
    </ul>
</nav>
</div>
    <div class="col-sm-9 col-md-9 col-lg-9">
 <h3><?= __('Lagerbestandverwaltung') ?></h3>
    <table class="table table-sm table-bordered">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Produktname') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('Foto') ?></th>
                
                <th scope="col"><?= $this->Paginator->sort('Eingänge') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Ausgänge') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('Lagerbestand') ?></th>
                       <th scope="col"><?= $this->Paginator->sort('Einheit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Verkaufpreise') ?></th>
        
                <th scope="col" class="actions"><?= __('Warenaufnahmen') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $this->Number->format($product->id) ?></td>
                 <td><?= h($product->product_name) ?></td>
                <td><img src="<?='/'. h($product->photo_dir.'/thumb/'.$product->photo)?>"></td>
         <td><?=$this->cell('InventoryIn',[$product->id])?></td>
                <td><?=$this->cell('InventoryOut',[$product->id])?></td>
                <td> <?=$this->cell('Inventory',[$product->id])?></td>
     
           <td><?= h($product->unit) ?></td>
                <td><?= $this->Number->currency($product->price,'EUR') ?></td>
              
      

         
                <td class="actions">
                 
                    <?= $this->Html->link(__(' '), ['action' => 'edit', $product->id],['class'=>"glyphicon glyphicon-plus",'data-toggle'=>"modal",'data-target'=>"#editProduct"]) ?>
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
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>

 </div>
    
</div>

<!--        Edit Products-->
    <div id="editProduct" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                     
                <div class="modal-body">   


<div class="transactions form large-9 medium-8 columns content">
  
</div>

               </div>
           
            </div>
        </div>
    </div>
