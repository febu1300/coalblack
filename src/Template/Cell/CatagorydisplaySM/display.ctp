<div class="row">
     <?php foreach ($products1 as $productcat): ?>

    <div class="col-sm-4 col-md-4 col-lg-4">
        <a href='/subcatagories/'>  <img src="<?php echo '/'. $productcat['photo_dir'] . '/main/' . $productcat['photo']; ?>" style="height: 250px; width: 100%; display: block;" alt="Card image">
</a>
      </div>      
      <?php  endforeach; ?>
</div> 