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


   


 <form id="checkout" method="post" action="/transactions/pay">
     <label for="item">
         <input type="text" name="product">
     </label><br>
     <label for="amount">
         <input type="text" name="price">
     </label><br>
  <input type="submit" value="Pay">
</form>
