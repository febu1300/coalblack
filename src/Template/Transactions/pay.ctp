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
    <style>
        .no-gutters {
  margin-right: 0;
  margin-left: 0;

  > .col,
  > [class*="col-"] {
    padding-right: 0;
    padding-left: 0;
  }
}</style>
</head>
<div class="container align-items-center">
      <div class="row">
          <div class="col-sm-4 col-md-4 col-lg-4">
              
         
     <div class="jumbotron">
     
        <div class="card border-primary mb-3" >
  <div class="card-header"><legend>Zahlungsmethoden</legend></div>
  <div class="card-body">  

      <div class="row ">
<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 no-gutters">
 
    
   <form id="checkout" method="post" action="/transactions/pay">
<fieldset>

  <div class="form-group">
   
  <div class="custom-control custom-radio"style="height: 100px;">
   
      <input id="customRadio1" name="customRadio" class="custom-control-input " value='1' checked="" type="radio">
      <label class="custom-control-label" for="customRadio1">Paypal</label>
     
  </div>
  <div class="custom-control custom-radio"style="height: 100px;">
      <input id="customRadio2" name="customRadio" class="custom-control-input" value='2' type="radio">
      <label class="custom-control-label" for="customRadio2">Sofortüberweisung</label>
  </div>
  <div class="custom-control custom-radio"style="height: 100px;">
      <input id="customRadio3" name="customRadio" class="custom-control-input" value='3' type="radio">
      <label class="custom-control-label" for="customRadio3">Nachnahme</label>
   </div>
  </div>


</fieldset> 
         <button id="paypal" type="submit" class="btn btn-info">CHECKOUT>></button>
 </form>
  
<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 no-gutters ">

   

    

  

      </div>
</div> 
</div>
</div>
     </div>
  </div> 
     </div><div class="col-sm-8 col-md-8 col-lg-8">
         <div class="row">
            <div class="col-sm-4 col-md-4 col-lg-4">
              <?=$this->cell('Shippingadd');?>
          </div>
              <div class="col-sm-4 col-md-4 col-lg-4">
                 <?=$this->cell('Billingadd');?>
          </div></div>
          <div class="row">
             <?=$this->cell('Orders');?>
          </div>   </div>
</div>
</div>
     
  
          


<script>

</script>
   