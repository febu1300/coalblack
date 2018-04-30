<div class="container">
    <div class="row row-eq-height">

     <?php foreach ($products1 as $productcat): ?>
    <a href='/unterkatagorien?wh=<?=$productcat['id']?>'>    <img src="<?php echo '/'. $productcat['photo_dir'] . '/main/' . $productcat['photo']; ?>" style="height: 512px; width: 100%; display: block;" alt="Card image">
        <div class="gold-block">
          
    <h2 class="textoverimg"><?=$productcat['catagory_name']?>></h2>

  </div>
    </a>
    <?php  endforeach; ?>
</div></div>