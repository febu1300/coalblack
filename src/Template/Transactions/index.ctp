
<?php
/**
  * @var \App\View\AppView $this
  */
?>

 

    
 <table class="table table-sm table-inverse" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">Order Id</th>
               
               
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
    <?php foreach ($transactions as $cart):?>
    <tr>
     <?php if ($cart->sent==null):?>
                <td><?= $cart->transaction_number?></td>
                  <td><?= $cart->sent?></td>
         <td>           <div class="post" id="<?php echo $cart['transaction_number']; ?>">
         <?php echo $cart['sent']; ?>
     </div> </td>
                <td class="actions">
                    
  
<form action="/carts/sent">
  <input type="checkbox" name="orderId" value="<?= $cart->transaction_number?>"> 
 
  <input type="submit" value="Submit" >
</form>  </td>
                <td class="actions">
<form action="/carts/pdf_download/post.pdf">
  <input type="input" hidden name="orderId" value="<?= $cart->transaction_number?>"> 
 
  <input type="submit"  value="Print">
</form>               
                    
                </td>
            </tr>
     

    <?php endif;?>
    <?php endforeach;?>
                         </tbody>
    </table>
