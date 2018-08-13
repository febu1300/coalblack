<style>


</style>   
<div class="col-sm-7 col-md-7 col-lg-7">
       <?php foreach ($products1 as $productcat): ?>
   
    <a href='/angeboten'>   
        <img class="img-responsive3"  src="<?php echo '/'. $productcat['photo_dir'] . '/main/' . $productcat['photo']; ?>" alt="Card image">
        <div class="gold-block3">
          
    <div class="textoverimg3"><?=$productcat['lable']?>></div>

  </div>
    </a>
   
    <?php  endforeach; ?>
    </div>