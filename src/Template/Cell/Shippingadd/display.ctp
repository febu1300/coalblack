<?php foreach ($products1 as $product): ?>
<h6><?= $product['studio_name'] ?></h6>

<span><?= $product['address_line_1'] ?>&nbsp;</span> <span><?= $product['address_line_2'] ?></span>
<p><?= $product['postal_code'] ?>, <?= $product['city'] ?>, <?= $product['state'] ?><p>

<p><?= $product['country'] ?><p>

<?php endforeach; ?>