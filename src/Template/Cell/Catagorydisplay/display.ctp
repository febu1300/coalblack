<style>

</style>
<div class="container">
    <div class="row row-eq-height">

     <?php foreach ($products1 as $productcat): ?>
      <div class="col-sm-6 col-md-6 col-lg-6 ">
    <a href='/coalblack_produkte'>   
        <img class="cat-img-responsive2" src="<?php echo '/'. $productcat['photo_dir'] . '/main/' . $productcat['photo']; ?>" alt="Card image">
        <div class="cat-gold-block">
          
    <div class="cat-textoverimg1"><?=$productcat['lable']?>></div>

  </div>
    </a>
      </div>
    <?php  endforeach; ?>
</div>
</div>