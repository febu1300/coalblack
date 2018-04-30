<?php $wh = $this->request->query('wh'); ?>
<style>
    .asearch{
        font-family: arial;
        font-size:16px;
        font-weight: bold;

    }
    .asearch:hover{
        color:darkgoldenrod;
        text-decoration:none; 
    }
</style>
 <?php foreach ($products1 as $product): ?>
<div class="row">
    <?php  similar_text($wh, $product->product_name, $perc);
    if($perc>10){?>
   
    <a class="asearch" href="/produktdetail?wh=<?php echo $product['id']; ?>"><?php echo $product['product_name']; ?></a><hr>
   
 <?php 
   }?>
      </div>

 <?php  endforeach; ?>

