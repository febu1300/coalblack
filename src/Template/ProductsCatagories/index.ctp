<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductsCatagory[]|\Cake\Collection\CollectionInterface $productsCatagories
 */
?>

<div class="container-fluid">
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
 <li  class="nav-item"><?= $this->Html->link(__('New Products Catagory'), ['action' => 'add']) ?></li>
        <li  class="nav-item"><?= $this->Html->link(__('List Sub-Catagories'), ['controller' => 'SubCatagories', 'action' => 'index']) ?></li>
          
    </ul>
</nav>
        </div>
<div class="col-sm-10 col-md-10 col-lg-10">
    <h3><?= __('Products Catagories') ?></h3>
    <table class="table table-sm table-bordered "  cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('main_catagory_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('catagory_name') ?></th>
          
                <th scope="col"><?= $this->Paginator->sort('photo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productsCatagories as $productsCatagory): ?>
            <tr>
                <td><?= $this->Number->format($productsCatagory->id) ?></td>
           <td><?= $productsCatagory->has('main_catagory') ? $this->Html->link($productsCatagory->main_catagory->main_catagory_name, ['controller' => 'MainCatagories', 'action' => 'view', $productsCatagory->main_catagory->id]) : '' ?></td>
                <td><?= h($productsCatagory->catagory_name) ?></td>
                <td>
         
        <img src="<?='/'. h($productsCatagory->photo_dir.'/thumb/'.$productsCatagory->photo)?>">
           <?= $this->Html->link(__(''), 
            ['action' => 'changepic', $productsCatagory->id], 
            ['class' => "glyphicon glyphicon-edit", 'data-toggle' => "modal", 'data-target' => "#changeImage"]) ?>

                </td>
                <td class="actions">
   
                    <?= $this->Html->link(__(' '), ['action' => 'view', $productsCatagory->id],['class' => " glyphicon glyphicon-eye-open", 'data-toggle' => "modal", 'data-target' => "#viewMaincatagory"]) ?>
                    <?= $this->Html->link(__(''), ['action' => 'edit', $productsCatagory->id], ['class' => "glyphicon glyphicon-edit", 'data-toggle' => "modal", 'data-target' => "#editSubcatagory"]) ?>
                    
                
                    <?= $this->Form->postLink(__(' '), ['action' => 'delete', $productsCatagory->id], ['confirm' => __('sind sie sicher dass sie # {0} löschen möchten ?', $productsCatagory->id),'class' => "glyphicon glyphicon-trash"]) ?>
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
</div></div>



       <script>                    
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
    
              
       <div id="viewMaincatagory" class="modal fade">
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
