 <?php
 $this->layout(false);
 
 ?>
<head>
    <style>
        .button {
    background-color: #000011; /* Green */
    border: none;
    color: white;
    padding: 5px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
      .button5 {border-radius: 50%;}
      .alignend{position:relative;}
      
      .push-down{
          position:absolute;
   bottom:0;
   left:0;
      }
      .push-price{
          position:absolute;
   bottom:0;
   left:0;
      }
.thebodyline{border-bottom: 3px darkgoldenrod solid;}

    </style>
      <?= $this->Html->css('site_global.css') ?>
   <?= $this->Html->css('bootstrap.min.css') ?>

<?= $this->Html->meta(
    'favicon.ico',
    'img/logo.png',
    ['type' => 'icon']
);
?>
    <?= $this->Html->script('jquery-1.8.3.min.js') ?>
                <?= $this->Html->script('popper.min.js') ?>
 <?= $this->Html->script('bootstrap.min.js') ?>
   

  <?= $this->fetch('script') ?>

   
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>

<body>


<div class="container">
    <div class="row">
        <div class="col-sm-3 col-md-3 col-lg-3 "></div>
        <img class="media-object" src="/img/logo.svg" style="width:200px; height: 120px" >
         <div class="col-sm-3 col-md-3 col-lg-3"></div>
    </div>
          <div class="row ">
              <div class="col-sm-12 col-md-12 col-lg-12 ">
                   <?php $total=0;?>
 
    <?php foreach ($transaction as $product):?>

             <div class="row  " >

                 <div class="col-sm-3 col-md-3 col-lg-3 thebodyline " >
                            <a class="thumbnail pull-left " href="#"> <img src="<?php echo '/'.$product['product']->photo_dir. '/main/'.$product['product']->photo; ?>" style="width:150px; height:150px" > </a>
                          </div>
                  <div class="col-sm-1 col-md-1 col-lg-1 thebodyline alignend ">
            
                      <span class="push-down" > <h6><?=$product->quantity?>x</h6></span>
                         
                       </div>
                 <div class="col-sm-3 col-md-3 col-lg-3 thebodyline alignend">
                     <span class="push-down"> <h6> <?=$product['product']->product_name?></h6></span>
                 </div>
                 <div class="col-sm-1 col-md-1 col-lg-1 thebodyline alignend ">
                     <span class="push-down">  <h6> 
                   <?= $this->Number->currency( $product->price,'EUR')?></h6></span>               

                 </div>
                    <div class="col-sm-1 col-md-1 col-lg-1 thebodyline alignend ">
                       <span class="push-price"><h6>

                               </h6></span>
                   </div>
             
          
               
             </div> <br>
      
 <?php $total = $total + ($product->price);?>
           
           
      
      <?php endforeach;?>

</div>
        </div>          
       <div class="row">           
           <div class="col-sm-6 col-md-6 col-lg-6">
               
           </div>       
           <div class="col-sm-4 col-md-4 col-lg-4">
               

               <br>
                 <div class="row "> 
                     <div class="col-sm-6 col-md-6 col-lg-6 "> <span class="push-down"><h6> NettoBetrag:</h6> </span></div>
                     <div class="col-sm-4 col-md-4 col-lg-4"><span class="push-down items-align-right"><h6>   <?=$this->Number->currency($total-$total*19/100,'EUR')?>  </h6></span></div>
                  
                 </div><br>
                               <div class="row "> 
                     <div class="col-sm-6 col-md-6 col-lg-6 "> <span class="push-down"><h6> MWSt 19%:</h6> </span></div>
                    <div class="col-sm-4 col-md-4 col-lg-4 pull-right"><span class="push-down"><h6>  <?=$this->Number->currency($total*19/100,'EUR')?>    </h6></span></div>
                               </div><br>
                                         <div class="row "> 
                     <div class="col-sm-6 col-md-6 col-lg-6 "> <span class="push-down"><h6> Versand:</h6> </span></div>
                    <div class="col-sm-4 col-md-4 col-lg-4 pull-right"><span class="push-down"><h6>  <?=$this->Number->currency(7,'EUR')?>    </h6></span></div>
                               </div><br>
                               <div class="row"> 
                     <div class="col-sm-6 col-md-6 col-lg-6 "> <span class="push-down"><h6>Gesamtpreise:</h6> </span></div>
                    <div class="col-sm-4 col-md-4 col-lg-4"><span class="push-down"><h6>   <?=$this->Number->currency($total+7,'EUR')?>    </h6></span></div>
                               </div><br>
    
               <div class="row"></div><br>
              
                 <form method="post" action="/Transactions/nachname">
                      <div class="row">  
                     <button class="btn btn-primary btn-block" >
                         Bestellen <span>>></span></button> </div></form>
           </div>    
           
 
          </div>               
             <div class="row">  
       
</div>
</div>
 


            
  
<!-- Modal 
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="container jumbotron ">
    <div class="row">
      <div class="col-sm-6 col-sm-offset-3 text-center">
       
        <br><br>

       <? $this->element('customerlogin') ?>
        <? $this->element('orverticalspaceholder') ?>
     <? $this->element('customerregistration') ?>
                    
   
    </div>
  </div>
</div>
    </div>-->
  

 
 
  
  
<script>
    function ayantoggle(){
        $(".forgot").slideToggle('slow');
        }
//    $(document).ready(function(){
//    $(".for-got").click(function(){
//        
//    });
//});

$(document).ready(function () {
if ( <?php echo $u?>===1 ){
     $('#myModal').modal('hide');
}else{
      $('#myModal').modal({
  backdrop: 'static',
  keyboard: false
});
}


});

</script>



