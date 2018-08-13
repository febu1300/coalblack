<style>

</style>

<div class="container">
    <div class="row row-eq-height">
  
     <?php foreach ($products1 as $productcat): ?>
  <div class="col-sm-6 col-md-6 col-lg-6 row-eq-height">
       <a href='/produktkatagorien?wh=<?=$productcat['id']?>'>  
           <img class="cat-sm-responsive2" src="<?php echo '/'. $productcat['photo_dir'] . '/main/' . $productcat['photo']; ?>"  alt="Card image">
     
      <div class="gold-rect">
          
    <div class="cat-sm-textoverimg"><?=$productcat['main_catagory_name']?> ></div>

  </div>
   </a>
  </div>
          
      <?php  endforeach; ?>
    </div></div>
  