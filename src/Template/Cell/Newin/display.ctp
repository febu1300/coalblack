<div class="card mb-4">
     <?php foreach ($products1 as $product): ?>
     <?php echo $this->Form->create('Transactions', array('class' => 'add-form', 'name'=>'theform','url' => array('controller' => 'transactions', 'action' => 'add'))); ?>
     
         <?php echo $this->Form->hidden('product_id', array('value' => $product['id'])) ?> 
  <img src="<?php echo '/'. $product['photo_dir'] . '/main/' . $product['photo']; ?>" style="height: 200px; width: 100%; display: block;" alt="Card image">
 
  <div class="card-footer text-muted">
    <button type='submit'class="btn btn-danger" title="Add to cart">
    <span class="fa fa-shopping-cart"></span>
    </button>
      <h1><a href='/productdetail?id=<?php echo $product['id']; ?>' ><?php echo $product['product_name']; ?></a></h1>
        <p class="details">
                                   <?php echo $product['product_description']; ?>
                                </p>
      <div class="price-tag">
       <span class="price-new">$<?php echo money_format('%i', $product['price']); ?></span>
        </div>                                      
  </div>
  <?php echo $this->Form->end(); ?>
             <?php  endforeach; ?>
</div>

 