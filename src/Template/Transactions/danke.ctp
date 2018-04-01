 <?php

 ?>

<head>
 

 
</head>
<style>

</style>
<body>
    <div class="container">
        <div class="row"></div>
<div class="jumbotron ">
            <h3><?= __('IHRE BESTELLUNG IST ANGEKOMMEN') ?></h1>


                    <h3><?= __('Vilen Dank für Ihren Einkauf!') ?></h1>

    <h4>
       Ihre Bestellungsnummer: <?=$bestnum;?>

      </h4> 
            <?php foreach($orders as $order): ?>
<?=$order->bestnum;?>
        <?php endforeach; ?>
    

            <?= $this->Html->link(__('Back'), ['controller'=>'pages','action'=>'display','home']) ?>

        
   </div> 

   </div> 
</body>

