<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductsCatagory $productsCatagory
 */
?>
<div class="modal-header pull-left">
        <h3><?= h($productsCatagory->id) ?>.<?= h($productsCatagory->catagory_name) ?></h3>
</div>
<div class="container">
    
    <div class="row">
     <div class="col-sm-3 col-md-3 col-lg-3">
 <img class="img-style" src="<?='/'. h($productsCatagory->photo_dir.'/main/'.$productsCatagory->photo)?>">
      </div>
             <div class="col-sm-1 col-md-1 col-lg-1"> </div>
 <div class="col-sm-6 col-md-6 col-lg-6">
            <table class="horizontalSlideShow-table">
   
    <h3><?= h($productsCatagory->id) ?></h3>

        <tr>
            <th scope="row"><?= __('Catagory Name') ?></th>
            <td><?= h($productsCatagory->catagory_name) ?></td>
        </tr>
        <tr>
<!--            <th scope="row"><?php// __('Photo Dir') ?></th>
            <td><?php// h($productsCatagory->photo_dir) ?></td>-->
        </tr>
        <tr>
<!--            <th scope="row"><?php// __('Photo') ?></th>
            <td><?php// h($productsCatagory->photo_dir.$productsCatagory->photo)?> </td>-->
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($productsCatagory->id) ?></td>
        </tr>
    </table>
</div>

    </div>
 </div>

<div class="clearfix"></div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Abschließen</button>

    </div>
