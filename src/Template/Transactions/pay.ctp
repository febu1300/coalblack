<?php
$this->layout(false);

?>
<head>
              <?= $this->fetch('title') ?>
       <?= $this->Html->meta(
    'favicon.ico',
    'img/icon.svg',
    ['type' => 'icon']
);
?> <?= $this->Html->css('site_global.css') ?>
   <?= $this->Html->css('bootstrap.min.css') ?>

   <?= $this->Html->css('coalblack.css') ?>
    <?= $this->Html->script('jquery-1.8.3.min.js') ?>
                <?= $this->Html->script('popper.min.js') ?>
 <?= $this->Html->script('bootstrap.min.js') ?>
   

  <?= $this->fetch('script') ?>

   
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <style>
 
.flex-grid-thirds {
  display: flex;
  justify-content: space-between;
}
.flex-grid-thirds .col {
  width: 32%;
}
.flex-grid {
  display: flex;
}
.col {
  flex: 1;
}
    </style>
</head>
<div class="container ">
    
       <div class="row ">
        <div class="col-sm-3 col-md-4 col-lg-4 "></div>
        <img class="media-object" src="/img/logo.svg" style="width:200px; height: 120px" >
         <div class="col-sm-3 col-md-3 col-lg-3"></div>
    </div>
    <div class="row">
      <div class="col-sm-1 col-md-1 col-lg-1"></div>
    <div class="breadcrumb flat">
        <a href="#" class="cap" > <span class="fa fa-cart-plus fa-2x"> </span>Warenkorb</a>
        
        <a href="#" class="cap"><span class="fa fa-pencil-square-o fa-2x"></span>Personlicher Angabe</a>
        <a href="#" class="active cap"><span class="fa fa-euro fa-2x"></span>Zahlungsart</a>
        <a href="#" class="cap"><span class="fa fa-check-square-o fa-2x"></span>Checkout</a>
         
    </div>
</div>
    <div class="jumbotron bg-light">
      <div class="row">
          <div class="col">
              
         

     
        <div class="card border-primary mb-3" >
            <div class="card-header"><h5>Zahlungsmethoden</legend></h5></div>
  <div class="card-body">  


<div class="col">
 
    
   <form id="checkout" method="post" action="/transactions/pay">
<fieldset>

  <div class="form-group">
   
  <div class="custom-control custom-radio">
   
      <input id="customRadio1" name="customRadio" class="custom-control-input " value='1' checked="" type="radio">
      <label class="custom-control-label" for="customRadio1">Paypal</label>
     
  </div>
      <hr>
  <div class="custom-control custom-radio">
      <input id="customRadio2" name="customRadio" class="custom-control-input" value='2' type="radio">
      <label class="custom-control-label" for="customRadio2">Sofortüberweisung</label>
  </div>
      <hr>
  <div class="custom-control custom-radio">
      <input id="customRadio3" name="customRadio" class="custom-control-input" value='3' type="radio">
      <label class="custom-control-label" for="customRadio3">Nachnahme (Kostet €7.00 mehr)</label>
   </div>
  </div>


</fieldset> 
         <button id="paypal" type="submit" class="btn btn-primary">CHECKOUT>></button>
 </form>
  

</div> 

</div>
     </div>  </div>
 

     

            <div class="col">
                <div class="jumbotron" >
    <div class="card-header"><h5>Versandadress</h5></div>
  <div class="card-body">
   <div class="col-sm-8 col-md-8 col-lg-8">
 
    <?=$this->cell('Shippingadd');?>
    </div>
      </div>  
  
     
      <div class="card-header"><h5>Rechnungadress</h5></div>
      
    <div class="card-body">
      <div class="col-sm-8 col-md-8 col-lg-8">
 <?=$this->cell('Billingadd');?>
</div>
</div>
           
          </div>
    
     </div>     </div>   
              <div class="row">
        <?php $u=0;if (($this->request->session()->read('Auth.User.username'))){$u=1;}else{$u=0;}?>

<div class="container">
  <div class="jumbotron">

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
      
                
        <div class="row">
            <div class=" col "></div>
              <div class=" col ">       <h6 class="pull-right"> <?=$product['product_name']?></h6></div>
                <div class="col">  <h6><?=$name2[$product->id]?>x</h6></div>
           

                         
                <div class="col"> 
                    <h6>
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
             </h6></div>
               </div>

                     
   
           <br>
      
 <?php $total = $total + ($cal);?>
           
                        <?php }}?>
      
      <?php endforeach;?>

</div>
        </div>          
       <div class="row">
         
       
 
               
<div class="col-sm-12 col-md-12 col-lg-12">

    
           <h6> NettoBetrag: <?=$this->Number->currency($total-$total*19/100,'EUR')?></h6>


                       
                 <h6> MWSt 19%: <?=$this->Number->currency($total*19/100,'EUR')?></h6> 
               
                              
            <h6>Gesamtpreise:<?=$this->Number->currency($total,'EUR')?>    </h6>
      
  
 
       
           </div>    
           
 
               

</div>
              
       
   
  </div>
</div>        
   </div>  
    </div>
</div>
<?=$this->element('elm_footer')?>
     
  </div>
          






   