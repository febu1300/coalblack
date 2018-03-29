 <?php
 $this->layout(false);
 ?>
 
    <head>
       <?= $this->Html->css('site_global.css') ?>
   <?= $this->Html->css('bootstrap.min.css') ?>


    <?= $this->Html->script('jquery-1.8.3.min.js') ?>
                <?= $this->Html->script('popper.min.js') ?>
 <?= $this->Html->script('bootstrap.min.js') ?>
   

  <?= $this->fetch('script') ?>

   
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>

<body>

    <?php foreach ($products as $product):?>
   
        <?php if(($product->online_vorhanden && $product->photo)){ ?>
   
                <div class="caption">
             <?php 
             $productname= explode(" ",$product->product_name);
             $productname1=implode("",$productname);
             
             $prodId=explode(" ",$product->id);
             $prodId1= implode("",$prodId);
             $session = $this->request->session();
             $name2 = $session->read($productname1);
             $this->set('name2',$name2);
             ?>
                <?php if(($name2)){ ?>   
                         

                    
                    
    <?php echo $this->Form->create('Transactions',array('class'=>'add-form','url'=>array('Controller'=>'Transactions','action'=>'/checkout')));?>
    <?php echo $this->Form->hidden('product_id',array('value'=>$product['id']))?>             
    <?php echo $this->Form->hidden('item',array('value'=>$product['product_name']))?>   
    <?php echo $this->Form->hidden('quantity',array('value'=>$name2[$product->id]))?>   
    <?php echo $this->Form->hidden('price',array('value'=>$product['price']))?>    
    


  </tbody>
       


 
                <?php }}?>
      
  <?php endforeach;?> 
  </div>
 
<!--  </table>
       
        
            <table class="table table-striped table-hover ">
    
           <thead>
            <tr>
           <th scope="col"><?= $this->Paginator->sort('id') ?></th>
           <th scope="col"><?= $this->Paginator->sort('product_name') ?></th>
           <th>Quantity</th>
            <th>Price</th>
                </tr>
  </thead>
   <?php// $total=0;?>

  <tr class="success">
                    <td colspan=3></td>
                    <td>$<?php //echo $total;?>
                    </td>
                </tr>
  </table>-->

<!--  <div id="paypal-button"></div>-->

<?php  echo $this->Form->end();?>

 <form id="checkout" method="post" action="/transactions/pay">
     <label for="item">
         <input type="text" name="product">
     </label><br>
     <label for="amount">
         <input type="text" name="price">
     </label><br>
  <input type="submit" value="Pay">
</form>

<!--<script>
// We generated a client token for you so you can test out this code
// immediately. In a production-ready integration, you will need to
// generate a client token on your server (see section below).
var clientToken = "eyJ2ZXJzaW9uIjoyLCJhdXRob3JpemF0aW9uRmluZ2VycHJpbnQiOiJlNWUyYjE5ZDljMzY5MmMxYTMyMWNmZDA4YjhhMDBiYzc1OGI5MmExMzkyMWIyNTVkMTY4MTk4OGQ4ZDhhNzIwfGNyZWF0ZWRfYXQ9MjAxNy0wOC0yMVQwMTozOToxNS4zMTc1NjY0NjYrMDAwMFx1MDAyNm1lcmNoYW50X2lkPTM0OHBrOWNnZjNiZ3l3MmJcdTAwMjZwdWJsaWNfa2V5PTJuMjQ3ZHY4OWJxOXZtcHIiLCJjb25maWdVcmwiOiJodHRwczovL2FwaS5zYW5kYm94LmJyYWludHJlZWdhdGV3YXkuY29tOjQ0My9tZXJjaGFudHMvMzQ4cGs5Y2dmM2JneXcyYi9jbGllbnRfYXBpL3YxL2NvbmZpZ3VyYXRpb24iLCJjaGFsbGVuZ2VzIjpbXSwiZW52aXJvbm1lbnQiOiJzYW5kYm94IiwiY2xpZW50QXBpVXJsIjoiaHR0cHM6Ly9hcGkuc2FuZGJveC5icmFpbnRyZWVnYXRld2F5LmNvbTo0NDMvbWVyY2hhbnRzLzM0OHBrOWNnZjNiZ3l3MmIvY2xpZW50X2FwaSIsImFzc2V0c1VybCI6Imh0dHBzOi8vYXNzZXRzLmJyYWludHJlZWdhdGV3YXkuY29tIiwiYXV0aFVybCI6Imh0dHBzOi8vYXV0aC52ZW5tby5zYW5kYm94LmJyYWludHJlZWdhdGV3YXkuY29tIiwiYW5hbHl0aWNzIjp7InVybCI6Imh0dHBzOi8vY2xpZW50LWFuYWx5dGljcy5zYW5kYm94LmJyYWludHJlZWdhdGV3YXkuY29tLzM0OHBrOWNnZjNiZ3l3MmIifSwidGhyZWVEU2VjdXJlRW5hYmxlZCI6dHJ1ZSwicGF5cGFsRW5hYmxlZCI6dHJ1ZSwicGF5cGFsIjp7ImRpc3BsYXlOYW1lIjoiQWNtZSBXaWRnZXRzLCBMdGQuIChTYW5kYm94KSIsImNsaWVudElkIjpudWxsLCJwcml2YWN5VXJsIjoiaHR0cDovL2V4YW1wbGUuY29tL3BwIiwidXNlckFncmVlbWVudFVybCI6Imh0dHA6Ly9leGFtcGxlLmNvbS90b3MiLCJiYXNlVXJsIjoiaHR0cHM6Ly9hc3NldHMuYnJhaW50cmVlZ2F0ZXdheS5jb20iLCJhc3NldHNVcmwiOiJodHRwczovL2NoZWNrb3V0LnBheXBhbC5jb20iLCJkaXJlY3RCYXNlVXJsIjpudWxsLCJhbGxvd0h0dHAiOnRydWUsImVudmlyb25tZW50Tm9OZXR3b3JrIjp0cnVlLCJlbnZpcm9ubWVudCI6Im9mZmxpbmUiLCJ1bnZldHRlZE1lcmNoYW50IjpmYWxzZSwiYnJhaW50cmVlQ2xpZW50SWQiOiJtYXN0ZXJjbGllbnQzIiwiYmlsbGluZ0FncmVlbWVudHNFbmFibGVkIjp0cnVlLCJtZXJjaGFudEFjY291bnRJZCI6ImFjbWV3aWRnZXRzbHRkc2FuZGJveCIsImN1cnJlbmN5SXNvQ29kZSI6IlVTRCJ9LCJtZXJjaGFudElkIjoiMzQ4cGs5Y2dmM2JneXcyYiIsInZlbm1vIjoib2ZmIn0=";

braintree.setup(clientToken, "dropin", {
  container: "payment-form",
   
    shippingAddressOverride: {
      recipientName: 'Scruff McGruff',
      streetAddress: '1234 Main St.',
      extendedAddress: 'Unit 1',
      locality: 'Chicago',
      countryCodeAlpha2: 'US',
      postalCode: '60652',
      region: 'IL',
      phone: '123.456.7890',
      editable: false
  }
  
});
</script>


 
<script src="//www.paypalobjects.com/api/checkout.js" async></script> -->
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Type</th>
      <th scope="col">Column heading</th>
      <th scope="col">Column heading</th>
      <th scope="col">Column heading</th>
    </tr>
  </thead>
      <tbody>
            <?php foreach ($transactions as $transaction): ?>
            <tr>
                <td><?= $this->Number->format($transaction->id) ?></td>
                <td><?= $transaction->has('transaction_type') ? $this->Html->link($transaction->transaction_type->id, ['controller' => 'TransactionTypes', 'action' => 'view', $transaction->transaction_type->id]) : '' ?></td>
                <td><?= $transaction->has('product') ? $this->Html->link($transaction->product->id, ['controller' => 'Products', 'action' => 'view', $transaction->product->id]) : '' ?></td>
                <td><?= $transaction->has('user') ? $this->Html->link($transaction->user->id, ['controller' => 'Users', 'action' => 'view', $transaction->user->id]) : '' ?></td>
                <td><?= h($transaction->transaction_date) ?></td>
                <td><?= $this->Number->format($transaction->quantity) ?></td>
                <td><?= $this->Number->format($transaction->price) ?></td>
                <td><?= $this->Number->format($transaction->transaction_status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $transaction->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transaction->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
</table> 