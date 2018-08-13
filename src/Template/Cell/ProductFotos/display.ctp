<style>
    div.align-items-right {
    display:flex;    
justify-content: flex-end;
}
</style>


<?php $i=1; foreach ($productsfoto1 as $product): ?>

<div class="row align-items-right " style="margin-bottom: 10px">
 <div class="col-sm-6 col-md-6 col-lg-6 "> 
<img id="<?=$i; ?>" src="<?php echo '/'. $product['photo_dir'] . '/main/' . $product['photo']; ?>" style="width:100%;" alt="<?=$product['photo.name']?>"data-zoom-image="<?php echo '/'. $product['photo_dir'] . '/main/' . $product['photo']; ?>"  alt="<?=$product['photo.name']?>">
</div></div>
<?php $i=$i+1; endforeach; ?>

<br />
<script>
    $('#1').elevateZoom({cursor: "crosshair",tint:true, scrollZoom : true, tintColour:'#F90', tintOpacity:0.5}); 
    $('#2').elevateZoom({cursor: "crosshair",tint:true, scrollZoom : true, tintColour:'#F90', tintOpacity:0.5}); 
    $('#3').elevateZoom({cursor: "crosshair",tint:true, scrollZoom : true, tintColour:'#F90', tintOpacity:0.5}); 
    $('#4').elevateZoom({cursor: "crosshair",tint:true, scrollZoom : true, tintColour:'#F90', tintOpacity:0.5}); 
    $('#5').elevateZoom({cursor: "crosshair",tint:true, scrollZoom : true, tintColour:'#F90', tintOpacity:0.5}); 
</script>