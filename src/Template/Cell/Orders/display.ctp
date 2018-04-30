<table class="table-hover justify-content-between">
    <thead>
    <th>Bestellnummer</th> <th>&nbsp;</th>
        <th>Bestelldatum</th>   <th>&nbsp;</th>  
            <th>Status</th>    
    </thead>
    <tbody>
<?php foreach ($products1 as $product): ?>
        <tr>
            <td><?php echo $product['order_number']; ?></td> <td>&nbsp;</td>
             <td><?php echo $product['created_date']; ?></td> <td>&nbsp;</td>
             <td><?php if($product->sent===1){ echo 'verschickt';}else{if($product->transaction_number){echo 'Bestellung auf Bearbeitung';}else{ echo 'Zahlung abgebrochen';}} ?></td>
        </tr>
   
<?php endforeach; ?>
</table>
</tbody>