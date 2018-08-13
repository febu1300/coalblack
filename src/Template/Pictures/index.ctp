<?php
 use Cake\ORM\TableRegistry;
 $productTable = TableRegistry::get('Products'); 
 $products=$productTable->find()->select(['id','product_name'])->order(['product_name'=>'ASC']);
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Picture[]|\Cake\Collection\CollectionInterface $pictures
 */
//       foreach ($pictures as $picture){
//        pr($picture->product_id);   pr($picture->product->id);die();
//       }
$wh=$this->request->query('character');

?>
<style>

.flexgal {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between; /* or space-around */
}

img {
  max-width:150%;
  height: auto;
  display: block;
  transition: transform .2s ease-in-out;
}

figcaption {
  margin-top:15px;.flexgal {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between; /* or space-around */
}

</style>
<nav class="navbar navbar-expand-lg  bg-light" >
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

     <div align="center">  
    <?php  
      
        echo '<ul class="pagination">';  
            foreach($products as $picture)  
                {  
                 echo '<li><a href="?character='.$picture->id.'">'.$picture->product_name.'</a></li>';  
                }  
           echo '</ul>';  
         ?>  
    </div> 
<main>
 
   <h3><?= __('Pictures') ?></h3>
  
  <div class="container flexgal">  
       
         <?php foreach ($pictures as $picture): ?>
    
<?php if($wh==$picture->product_id):?>  
      <figure>

        <img style="width:250px;height:250px;" src="<?='/'. h($picture->photo_dir.'/main/'.$picture->photo)?>">
           <?= $this->Html->link(__(''), 
            ['action' => 'changepic', $picture->id], 
            ['class' => "glyphicon glyphicon-edit", 'data-toggle' => "modal", 'data-target' => "#changeImage"]) ?>
<?= $this->Html->link(__(' '), ['action' => 'view',  $picture->id],['class' => " glyphicon glyphicon-eye-open", 'data-toggle' => "modal", 'data-target' => "#viewSubcatagory"]) ?>
              

 <?= $this->Html->link(__(''), ['action' => 'edit',  $picture->id], ['class' => "glyphicon glyphicon-edit", 'data-toggle' => "modal", 'data-target' => "#editSubcatagory"]) ?>
 
                   <?= $this->Form->postLink(__(''), ['action' => 'delete',  $picture->id], ['confirm' => __('Sind Sie sicher, dass Sie # {0} löschen möchten?',  $picture->id),'class' => "glyphicon glyphicon-trash"]) ?>
    
      </figure>
          <?php endif; ?>
           <?php endforeach; ?>
  
  </div>
   
</main>
  
</div>    



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
    <div id="editSubcatagory" class="modal fade">
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

 