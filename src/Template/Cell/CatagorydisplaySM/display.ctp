<style>
.textoverimg{
overflow-x: hidden;
    word-wrap: break-word;
  
}
</style>

<div class="container">
    <div class="row row-eq-height">
  
     <?php foreach ($products1 as $productcat): ?>
<div class="col-sm-6 col-md-6 col-lg-6 row-eq-height">
        <a href='/unterkatagorien?wh=<?=$productcat['id']?>'>  <img src="<?php echo '/'. $productcat['photo_dir'] . '/main/' . $productcat['photo']; ?>"  display: block;" alt="Card image">
     
      <div class="gold-block">
          
    <h2 class="textoverimg"><?=$productcat['catagory_name']?> ></h2>

  </div>
               </a>
</div>
          
      <?php  endforeach; ?>
    </div></div>