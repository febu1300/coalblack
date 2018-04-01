<?php foreach ($products1 as $product): ?>
<h6><?= $product['studio_name'] ?></h6>
<p><span><?= $product['address_line_1'] ?>&nbsp;</span> <span><?= $product['address_line_2'] ?></span><p>
<p><?= $product['postal_code'] ?>,<p>
<p><?= $product['city'] ?> <span>&nbsp;</span><?= $product['state'] ?><p>

<p><?= $product['country'] ?><p>

<?php endforeach; ?>
