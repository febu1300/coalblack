<style>
    .btn-lg{
  
       padding-top: 3px ;
         padding-bottom: 5px ;

         
    }
   .row-eq-height {
    display: table-cell;
    padding: 16px;
}
div.row-eq-height {
    display:flex;    
    align-items:stretch;
}
</style>
<?php foreach ($products1 as $product): ?>


 <div class="col-sm-4 col-md-4 col-lg-4 row-eq-height"> 
<img src="<?php echo '/'. $product['photo_dir'] . '/main/' . $product['photo']; ?>" style="width:100%;" alt="<?=$product['product_name']?>">
</div>
 <div class="col-sm-5 col-md-5 col-lg-5 row-eq-height"> 
          <?php echo $this->Form->create('Transactions', array('class' => 'add-form', 'name'=>'theform','url' => array('controller' => 'transactions', 'action' => 'add'))); ?>
         <?php echo $this->Form->hidden('product_id', array('value' => $product['id'])) ?> 


     <div class="list-group align-items-start flex-column">
 
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1"> <?php echo $product['product_name']; ?></h5>
      
    </div>
         <hr>
            <div class="d-flex w-50 justify-content-between">
                <h5 class="mb-1"><small> <?php echo money_format('%i', $product['price']); ?>$</small></h5>
      
    </div>
         <small class="text-muted">zzgl. Versand</small>
    <p class="justify-content-between">Lieferbar in ca. 1 - 3 Werktagen </p>
    <small class="text-muted"><hr></small>
   <div class="options-cart">
       

<button type="submit" title="In den Warenkorb" class="btn btn-primary btn-lg btn-block">In den Warenkorb</button>


        			
        			</div>

        			
</div>
        <?= $this->Form->end() ?>
</div>


        <?php  endforeach; ?>
  