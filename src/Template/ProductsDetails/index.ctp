<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductsDetail[]|\Cake\Collection\CollectionInterface $productsDetails
 */
?>

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
<div class="row">
        <div class="col-sm-2 col-md-2 col-lg-2">
<nav class="navbar navbar-expand-lg navbar-dark bg-light" id="actions-sidebar">
    <ul class="nav nav-pills flex-column">
        <li class="nav-item"><?= $this->Html->link(__('Neueproduktdetail'), ['action' => 'add']) ?></li>
        <li class="nav-item"><?= $this->Html->link(__('Produktliste'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li class="nav-item"><?= $this->Html->link(__('Neueprodukt'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li  class="nav-item"><?= $this->Html->link(__('Neueprodukt '), ['action' => 'add']) ?></li>
        <li class="nav-item"><?= $this->Html->link(__('Lagerbestandverwalten'), ['controller' => 'Transactions', 'action' => 'bestandsposten']) ?></li>
        <li class="nav-item"><?= $this->Html->link(__('Subkatagorieliste'), ['controller' => 'SubCatagories', 'action' => 'index']) ?></li>
        <li class="nav-item"><?= $this->Html->link(__('Angebotsverwalten'), ['controller' => 'DiscountsTypes', 'action' => 'index']) ?></li>
        
       
 
        
    </ul>
</nav>
        </div>
<div class="productsDetails index large-9 medium-8 columns content">
    <h3><?= __('Produktdetail') ?></h3>
    <table class="table table-sm table-bordered " cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
           
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productsDetails as $productsDetail): ?>
            <tr>
                <td><?= $this->Number->format($productsDetail->id) ?></td>
                <td><?= $productsDetail->has('product') ? $this->Html->link($productsDetail->product->product_name, ['controller' => 'Products', 'action' => 'view', $productsDetail->product->id]) : '' ?></td>
                <td><?= h($productsDetail->description) ?></td>
           
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $productsDetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productsDetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productsDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productsDetail->id)]) ?>
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
