<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MainCatagory[]|\Cake\Collection\CollectionInterface $mainCatagories
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
          <li  class="nav-item"><?= $this->Html->link(__('New Main Catagory'), ['action' => 'add']) ?></li>
        <li  class="nav-item"><?= $this->Html->link(__('List Products Catagories'), ['controller' => 'ProductsCatagories', 'action' => 'index']) ?></li>
        <li  class="nav-item"><?= $this->Html->link(__('New Products Catagory'), ['controller' => 'ProductsCatagories', 'action' => 'add']) ?></li>      
    </ul>
</nav>
        </div>
<div class="col-sm-10 col-md-10 col-lg-10">
    <h3><?= __('Main Catagories') ?></h3>
    <table class="table table-sm table-bordered "  cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                         <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('main_catagory_name') ?></th>
    
                <th scope="col"><?= $this->Paginator->sort('photo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
                
            </tr>
        </thead>
        <tbody>
       
                <?php foreach ($mainCatagories as $mainCatagory): ?>
            <tr>
                <td><?= $this->Number->format($mainCatagory->id) ?></td>
                <td><?= h($mainCatagory->main_catagory_name) ?></td>
          <td>
         
        <img src="<?='/'. h($mainCatagory->photo_dir.'/thumb/'.$mainCatagory->photo)?>">
           <?= $this->Html->link(__(''), 
            ['action' => 'changepic', $mainCatagory->id], 
            ['class' => "glyphicon glyphicon-edit", 'data-toggle' => "modal", 'data-target' => "#changeImage"]) ?>

                </td>
                <td class="actions">
                    <?= $this->Html->link(__(' '), ['action' => 'view', $mainCatagory->id],['class' => " glyphicon glyphicon-eye-open", 'data-toggle' => "modal", 'data-target' => "#viewmainCatagory"]) ?>
                    <?= $this->Html->link(__(' '), ['action' => 'edit', $mainCatagory->id],['class' => " glyphicon glyphicon-edit", 'data-toggle' => "modal", 'data-target' => "#editmainCatagory"]) ?>
                    <?= $this->Form->postLink(__(''), ['action' => 'delete', $mainCatagory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mainCatagory->id),'class' => "glyphicon glyphicon-trash"]) ?>
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
    
              
               <div id="viewmainCatagory" class="modal fade">
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
    <div id="editmainCatagory" class="modal fade ">
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