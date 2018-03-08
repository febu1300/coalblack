<div class="card mb-4">
     <?php foreach ($products1 as $productcat): ?>
    <a href='/subcatagories/'>    <img src="<?php echo '/'. $productcat['photo_dir'] . '/main/' . $productcat['photo']; ?>" style="height: 512px; width: 100%; display: block;" alt="Card image"></a>
    <?php  endforeach; ?>
</div>