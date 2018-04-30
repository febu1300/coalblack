<style>
    div.align-items-right {
    display:flex;    
justify-content: flex-end;
}
</style>
<?php foreach ($productsfoto1 as $product): ?>

<div class="row align-items-right " style="margin-bottom: 10px">
 <div class="col-sm-6 col-md-6 col-lg-6 "> 
<img src="<?php echo '/'. $product['photo_dir'] . '/main/' . $product['photo']; ?>" style="width:100%;" alt="<?=$product['photo.name']?>">
</div></div>
<?php endforeach; ?>
