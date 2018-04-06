<div class="col-sm-2 col-md-2 col-lg-2">
    </div>
<div class="col-sm-6 col-md-6 col-lg-6">
  
    <?= $this->Form->create($productsDetail,['id'=>'prodDetail']) ?>

    <fieldset>
        <legend><?= __('Edit Products Detail') ?></legend>
        <div class="row">
            <?php pr($productsDetail->product_id); ?>
         </div> 
        <div class="row">
            <textarea rows="8" cols="50" name="details" form="prodDetail">
DETAILS...</textarea>
      
        </div>
              <br>
        <div class="row">
    <textarea rows="4" cols="50" name="retoure" form="prodDetail">
KOSTENLOSE RETOURE...</textarea>
        </div><br>
                 <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary btn-lg btn-default']) ?>
    <?= $this->Form->end() ?>
    </fieldset>
 

</div>

