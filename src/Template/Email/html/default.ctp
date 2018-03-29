<?php $this->layout('frontlayout') ?>
<table class="table table-hover">
  <thead>
  <h4>Order# <?=$value?></h4>
    <tr>
      <th scope="col">Artikel</th>
      <th scope="col">Menge</th>
      <th scope="col">Einzelpreise</th>
      <th scope="col">Gesamt</th>
    </tr>
  </thead>
   <tbody>
<?php



foreach ($transaction as $trans)
{


?>


    <tr class="table-primary table-striped table-dark">
      <th scope="row"><?=$trans->product['product_name']?></th>
      <td><?=$trans->quantity?></td>
      <td><?=money_format('%.2n', $trans->product['price']) ?></td>
      <td><?= money_format('%.2n', $trans->product['price']*$trans->quantity) ?></td>
    </tr>
   

<?php
}
?>
  </tbody>


 
</table> 