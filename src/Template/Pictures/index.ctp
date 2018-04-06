<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Picture[]|\Cake\Collection\CollectionInterface $pictures
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
        <li><a href="/transactions"><span class="glyphicon glyphicon-bell"></span>  <span class="badge badge-secondary bg-danger badge-pill"><?= $this->cell('Notification') ?></span></a></li>
     
      <li><a href="/users/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
<div class="row">
        <div class="col-sm-2 col-md-2 col-lg-2">
<nav class="navbar navbar-expand-lg navbar-dark bg-light" id="actions-sidebar">
    <ul class="nav nav-pills flex-column">

        
              <li  class="nav-item"><?= $this->Html->link(__('Produktenliste'), ['controller' => 'Products', 'action' => 'index']) ?></li>
          <li  class="nav-item"><?= $this->Html->link(__('Neue Produkte'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    
   
        <li class="nav-item"><?= $this->Html->link(__('New Picture'), ['action' => 'add']) ?></li>
        <li class="nav-item"><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li class="nav-item"><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    
    </ul>
</nav>
        </div>

<div class="col-sm-10 col-md-10 col-lg-10">
    <h3><?= __('Pictures') ?></h3>
    <table table table-sm table-bordered cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo_dir') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pictures as $picture): ?>
            <tr>
                <td><?= $this->Number->format($picture->id) ?></td>
                <td><?= $picture->has('product') ? $this->Html->link($picture->product->id, ['controller' => 'Products', 'action' => 'view', $picture->product->id]) : '' ?></td>
                <td><?= h($picture->photo_dir) ?></td>
                    <td>
         
        <img src="<?='/'. h($picture->photo_dir.'/thumb/'.$picture->photo)?>">
           <?= $this->Html->link(__(''), 
            ['action' => 'changepic', $picture->id], 
            ['class' => "glyphicon glyphicon-edit", 'data-toggle' => "modal", 'data-target' => "#changeImage"]) ?>

                </td>
                                <td class="actions">
                          <?= $this->Html->link(__(' '), ['action' => 'view',  $picture->id],['class' => " glyphicon glyphicon-eye-open", 'data-toggle' => "modal", 'data-target' => "#viewSubcatagory"]) ?>
              

 <?= $this->Html->link(__(''), ['action' => 'edit',  $picture->id], ['class' => "glyphicon glyphicon-edit", 'data-toggle' => "modal", 'data-target' => "#editSubcatagory"]) ?>
 
                   <?= $this->Form->postLink(__(''), ['action' => 'delete',  $picture->id], ['confirm' => __('Sind Sie sicher, dass Sie # {0} löschen möchten?',  $picture->id),'class' => "glyphicon glyphicon-trash"]) ?>
  
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
</div></div>                <script>                    
                    $('body').on('hidden.bs.modal', '.modal', function () {
        $(this).removeData('bs.modal');
      });
              </script>

              
                       <div id="changeImage" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                     
                <div class="modal-body">                                       
      <div class="col-sm-9 col-md-9 col-lg-9">

</div>

 


                    </div>
                    <div class="clearfix"></div>
                <div class="modal-footer">
                   
                    <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
           
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
              
    <div id="viewSubcatagory" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                     
                <div class="modal-body">                                       
   

 


                    </div>
                    <div class="clearfix"></div>
                <div class="modal-footer">
                   
                    <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
           
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

       
    
<!--        Edit Products-->
    <div id="editSubcatagory" class="modal fade ">
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

 