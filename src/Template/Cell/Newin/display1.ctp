<style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: Arial;
}


.row {
    display: flex;
    flex-wrap: wrap;
    padding: 0 4px;
}

/* Create four equal columns that sits next to each other */
.column {
    flex: 50%;
    max-width: 50%;
    padding: 0 4px;
}

.column:nth-of-type(2n+3) {
  align-self: flex-start;
  margin-top: -333px;

}

.column img {
    margin-top: 8px;
    vertical-align: top;
}

/* Responsive layout - makes a two column-layout instead of four columns */
@media (max-width: 800px) {
    .column {
        flex: 50%;
        max-width: 50%;
    }
}
@media (min-width:600px) and ( max-width: 800px)  {
    .column {
        flex: 75%;
        max-width: 75%;
    }
}
/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media (max-width: 600px) {
    .column {
        flex: 100%;
        max-width: 100%;
    }
}
.container {
    position: relative;
    font-family: Arial;
}

.text-block {
    position: absolute;
    bottom: 150px;
    right: 20px;
    background-color: darkgoldenrod;
    color: white;
    font-weight: bold;
    padding-left: 20px;
    padding-right: 20px;
    padding-bottom: 3px;
    padding-top: 3px;
}



</style>


 <div class="row "> 
     <?php foreach ($products1 as $product): ?>
    
  <div class="column">
      <div class="card mb-4 border-light">
      <?php echo $this->Form->create('Transactions', array('class' => 'add-form', 'name'=>'theform','url' => array('controller' => 'transactions', 'action' => 'add'))); ?>
     
         <?php echo $this->Form->hidden('product_id', array('value' => $product['id'])) ?> 
          <div class="container">
  <a href='/productdetail?id=<?php echo $product['id']; ?>' ><img src="<?php echo '/'. $product['photo_dir'] . '/main/' . $product['photo']; ?>" style="width:100%" alt="<?=$product['product_name']?>"></a>
<div class="text-block">New</div>
  <div class="card-footer ">
    <button type='submit'class="btn btn-primary" title="Add to cart">In
    <span class="fa fa-shopping-cart"></span>
    </button>
      
      <p><?php echo $product['product_name']; ?></p>
        <p class="details"><?php echo $product['product_description']; ?>
                                </p>
                            
   
       <p class="text-right font-weight-bold">$<?php echo money_format('%i', $product['price']); ?></p>
                           
  </div></div>
  </div>
  </div>
  <?php  endforeach; ?>
</div>
