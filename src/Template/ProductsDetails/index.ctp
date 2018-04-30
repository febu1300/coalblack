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
        <li class="nav-item"><?= $this->Html->link(__('Neueproduktdetail'), ['action' => 'detailsindex']) ?></li>
        <li class="nav-item"><?= $this->Html->link(__('Produktliste'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li class="nav-item"><?= $this->Html->link(__('Neueprodukt'), ['controller' => 'Products', 'action' => 'add']) ?></li>
      
 
        
    </ul>
</nav>
        </div>
<div class="col-sm-8 col-md-8 col-lg-8">
    <h3><?= __('Produktdetail') ?></h3>
 <table  class="table  " >
     <tbody>
            <?php foreach ($productsDetails as $productsDetail): ?>
          <tr>
             <td>  <?=h($productsDetail->photo) ?>      </td> 
              <td> <div class="col-sm-8 col-md-8 col-lg-8"><?= $this->Text->autoParagraph(h($productsDetail->description)) ?></div>
                 </td>  

       <td class="actions">
           <div class="col-sm-4 col-md-4 col-lg-4">
                    <?= $this->Html->link(__(' '), ['action' => 'view', $productsDetail->id],['class' => " glyphicon glyphicon-eye-open", 'data-toggle' => "modal", 'data-target' => "#viewSubcatagory"]) ?>
                    <?= $this->Html->link(__(''), ['action' => 'edit', $productsDetail->id], ['class' => "glyphicon glyphicon-edit", 'data-toggle' => "modal", 'data-target' => "#editSubcatagory"]) ?>
                    
                
                    <?= $this->Form->postLink(__(' '), ['action' => 'delete', $productsDetail->id], ['confirm' => __('sind sie sicher dass sie # {0} löschen möchten ?', $productsDetail->id),'class' => "glyphicon glyphicon-trash"]) ?>
           </div>     
           </td>
                        <?php endforeach; ?>
          </tr></tbody>
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
