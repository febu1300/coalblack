
<style>
    .asearch{
        font-family: arial;
        font-size:12px;
        font-weight: bold;

    }
    .asearch:hover{
        color:darkgoldenrod;
        text-decoration:none; 
    }
</style>

 <?php foreach ($products1 as $product): ?>
<p><a class="asearch" href="/produktdetail?wh=<?php echo $product['id']; ?>"><?php echo $product['product_name']; ?></a></p>
 <?php  endforeach; ?>
