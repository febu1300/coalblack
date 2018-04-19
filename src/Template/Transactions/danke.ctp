 <?php

 ?>

<head>
 

 
</head>
<style>

</style>
<body>
    <div class="container text-xs-center">
        <div class="row"></div>
<div class="jumbotron ">
       <h3><?= __('Vilen Dank für Ihren Einkauf!') ?></h3>
          <p class="lead">    <?= __('IHRE BESTELLUNG IST ANGEKOMMEN') ?></p>


                

    <h4>
       Ihre Bestellungsnummer: <?=$bestnum;?>

      </h4> 
            <?php foreach($orders as $order): ?>
<?=$order->bestnum;?>
        <?php endforeach; ?>
    

       <?= $this->Html->link(__('Weiter zu Homepage'), ['controller'=>'pages','action'=>'display','home'],['class'=>"btn btn-primary btn-sm"]) ?>

        
   </div> 

   </div> 
</body>

