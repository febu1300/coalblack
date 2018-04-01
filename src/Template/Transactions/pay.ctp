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
}
.item-aign{
    
   margin-right: 5px;
}
tr {
   max-height: 35px !important;
   height: 35px !important;
}
    </style>
</head>
<div class="container align-items-right">
    <div class="jumbotron bg-light">
       <div class="row">
        <div class="col-sm-3 col-md-4 col-lg-4 "></div>
        <img class="media-object" src="/img/logo.svg" style="width:200px; height: 120px" >
         <div class="col-sm-3 col-md-3 col-lg-3"></div>
    </div>
      <div class="row">
          <div class="col-sm-4 col-md-4 col-lg-4">
              
         

     
        <div class="card border-primary mb-3" >
            <div class="card-header"><h5>Zahlungsmethoden</legend></h5></div>
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
         <button id="paypal" type="submit" class="btn btn-primary">CHECKOUT>></button>
 </form>
  
<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 no-gutters ">

   

    

  

      </div>
</div> 
</div>
</div>
     </div>
 
     </div><div class="col-sm-8 col-md-8 col-lg-8">
         <div class="row">
            <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="card border-primary mb-3" >

  <div class="card-body">
    <h6 class="card-title">Versandadress</h6>
    <?=$this->cell('Shippingadd');?>
</div>
        </div>     
          </div>
              <div class="col-sm-4 col-md-4 col-lg-4">
                                <div class="card border-primary mb-3" >

  <div class="card-body">
    <h6 class="card-title">Rechnungadress</h6>
 <?=$this->cell('Billingadd');?>
</div>
                
          </div>
         </div>   </div>
          <div class="row">
        <?php $u=0;if (($this->request->session()->read('Auth.User.username'))){$u=1;}else{$u=0;}?>

<div class="container">
  <div class="card border-primary card text-right">

  <div class="card-body card text-right">
          <div class="row ">
              <div class="col-sm-12 col-md-12 col-lg-12 ">
                   <?php $total=0;?>
 
    <?php foreach ($products as $product):?>
     
                <?php
             $productname= explode(" ",$product->product_name);
             $productname1=implode("",$productname);
             ?>
   
        <?php if(($product->online_vorhanden && $product->photo)){ ?>

           
             <?php 
            
            $session = $this->request->session();
            //$colorname1 =  $productname1."_".$color->color."_".$size->size;
                  $colorname1 =  $productname1;  
             $name2 = $session->read($colorname1);

             $this->set('name2',$name2);
             ?>
                <?php if(($name2)){ ?>   
      
                
                  <table class="table text-right">
                      <tr >
   <td><h6> <?=$product['product_name']?></h6></td>
           
         <td><h6><?=$name2[$product->id]?>x</h6></td>
                         
         <td><h6>
                                               <?php if($product->discount_type_id===1) 
    {
           $cal= $name2[$product->id]*$product['price'];
        echo $this->Number->currency( $cal,'EUR');
    
    }elseif(($product->discount_type_id===2) ){
       $cal= $name2[$product->id]*$product['price']-$name2[$product->id]*$product->discount;
        echo $this->Number->currency( $cal,'EUR');
    }elseif($product->discount_type_id===3){
      $cal=$name2[$product->id]*$product['price']-$name2[$product->id]*$product['price']*($name2[$product->id]*$product->discount/100);
        echo $this->Number->currency( $cal,'EUR');
    }
            
            ?> 
             </h6></td>
                      </tr>
    </table>
           <br>
      
 <?php $total = $total + ($cal);?>
           
                        <?php }}?>
      
      <?php endforeach;?>

</div>
        </div>          
       <div class="row">
         
       
           <div class="col-sm-12 col-md-12 col-lg-12">
               
<div class="col-sm-12 col-md-12 col-lg-12">
 <table class="table table-primary text-right">
     <tr>

        <td>
           <h6> NettoBetrag: <?=$this->Number->currency($total-$total*19/100,'EUR')?></h6>


                       
                 <h6> MWSt 19%: <?=$this->Number->currency($total*19/100,'EUR')?></h6> 
               
                              
            <h6>Gesamtpreise:<?=$this->Number->currency($total,'EUR')?>    </h6>
        </td> </tr>    
          </table>
 
       
           </div>    
           
 
          </div>               

</div>
              
       
   
  </div>
</div>        
          </div>   </div>
</div>
</div>
     
  </div>
          
</div>


   