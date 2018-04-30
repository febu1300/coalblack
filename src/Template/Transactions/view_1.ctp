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
    
<?php $u=0;if (($this->request->session()->read('Auth.User.username'))){$u=1;}else{$u=0;}?>

<div class="container-fluid ">

    <div class="row">
     <div class="jumbotron">
          <div align="center">
      <h1> Ihr Warenkorb</h1>
        </div> 
    
    <div class="row">
      
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>Artikel</th>
                         <th>Beschreibung</th>
                         <th></th>
                         <th class="text-center">Einzelpreis</th>
                         <th>Anzahl</th>
                         <th class="text-center">Gesamt</th>
                        <th> </th>
                    </tr>
                </thead>
                   <?php $total=0;?>
 
    <?php foreach ($products as $product):?>
                <?php
             $productname= explode(" ",$product->product_name);
             $productname1=implode("",$productname);
             ?>
    <?php //foreach ($colors as $color):?>
                    <?php //foreach ($sizes as $size):?>
        <?php if(($product->online_vorhanden && $product->photo)){ ?>

                <div class="caption">
             <?php 
            
            $session = $this->request->session();
            //$colorname1 =  $productname1."_".$color->color."_".$size->size;
                  $colorname1 =  $productname1;  
             $name2 = $session->read($colorname1);

             $this->set('name2',$name2);
             ?>
                <?php if(($name2)){ ?>   
                <tbody>
                
                    <tr>
                        <td class="col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="<?php echo '/'.$product['photo_dir']. '/thumb/'.$product['photo']; ?>" > </a>
                            <div class="media-body">
                              <?=$product['product_name']?>
                      
                              
                            </div>
                        </div></td>
                        <td class="col-md-1 text-center">color 
                            <?php//$color['color'] ?><br>
                            size <?php //$size['size'] ?></td>
                          <td class="col-md-1">
                            <form method="post" action="/transactions/delete?prod=<?=$product->id?>&col=<?php//$color->id?>&siz=<?php//$size->id?>">   
                         <button class="btn btn-danger" >
                             <span class="glyphicon glyphicon-trash"></span></button> </form>
                       </td>
                         <td class="col-md-1 text-center"><strong>$<?=$product['price']?></strong></td>
                        <td class="col-md-1" style="text-align: center">
                        <div class="form-group">
              <input  class="form-control form-control-sm"  style="width:60px"id="inputSmall" type="text"  value="<?=$name2[$product->id]?>">
 
                        </div>
                        </td>
                     
                        <td class="col-md-1 text-center"><strong>$<?=$name2[$product->id]*$product['price']?></strong></td>
                       
            
                    </tr>

    
 <?php $total = $total + ($name2[$product->id]*$product['price']);?>
                </tbody>
                        <?php }}?>
                
      <?php endforeach;?>
 <?php //endforeach;?> 
  <?php //endforeach;?> 
                <tfoot>
                  
               
                 
                    <tr>
                            <td>   </td>    <td>   </td>    <td>   </td>    <td>   </td>
                        <td>Versand:</td>
                        <td>Versand</td>
                       
                    </tr>
                     <tr>
                         <td>   </td>    <td>   </td>    <td>   </td>    <td>   </td>
                        <td>Gesamtbeitrag:</td>
                        <td>$<?=$total ;?></td>
                       
                    </tr>
                       
                 
                        
             </tr>
                    <tr>
                       
                         <td>  </td>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><a href="/" class="btn btn-default">
                             weiter shoppen</a> 
                       </td>
                       <td><form method="post" action="/Users/ologin">
                        <button class="btn btn-danger" >
                             ZUR KASSE</button> </form>
                         
                        </td>
                    </tr>
                </tfoot>
            </table>
       
    </div>
</div>
 </div></div>


            
  
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



