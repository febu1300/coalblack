<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */


?>
<!DOCTYPE html>
<html lang="de">
<head>
    <?= $this->Html->charset() ?>
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Buruk">


        <?php $this->fetch('title') ?>
 

<?= $this->Html->meta(
    'favicon.ico',
    'img/icon.png',
    ['type' => 'icon']
);
?>
  
   <?= $this->Html->css('bootstrap.min.css') ?>

<?=$this->Html->css('coalblack/mobile.css')?>
    <?=$this->Html->css('coalblack/tablet.css')?>
    <?=$this->Html->css('coalblack/desktop.css')?>
    <?=$this->Html->css('coalblack/wearable.css')?> 
    <?=$this->Html->css('coalblack/tv.css')?>
 
    
    <?= $this->Html->script('jquery-1.8.3.min.js') ?>
    <?= $this->Html->script('popper.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>

    <?= $this->fetch('script') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
  
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Merriweather+Sans">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



    <style>

</style>
</head>
    <body>

        <div class="container-fluid no-padding">
 <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">
         <?=$this->element('elm_header')?>
            
      <div class="row">
      <div class="col-sm-6 col-md-6 col-lg-6"> 
            <?=$this->element('elm_logo')?>
      </div>
          <div class="col-sm-3 col-md-3 col-lg-3"> </div>
          <div class="col-sm-3 col-md-3 col-lg-3"> 
         <?=$this->element('elm_search')?>
             
      </div>
     
       </div> 
                      
     
     
            <?=$this->element('elm_navbar')?>

  </div>
          
        </div>
           
        
<div class="container" >
    
        
<?= $this->fetch('sidebar') ?>


         <?= $this->Flash->render() ?>
    
        <?= $this->fetch('content') ?>
        
   
       </div>   
        <div id="target"></div>
      <div class="container-fluid ">
          
          <?= $this->element('elm_footer')?>
        </div>
        

<!-- Modal -->
<div class="modal fade myModal" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
  
      <div class="modal-body">
            <div id="ajax-content"></div>
          <div class="jumbotron"><?=$this->cell('ViewCart')?></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
        
        
              <script>
    $(document).ready(function () {
                $('.add-form').submit(function (e) {
		    e.preventDefault();
                    var tis = $(this);
                    $.post(tis.attr('action'), tis.serialize(), function (data) {
                        $('#cart-counter').text(data);
                        return false;
                    });
               
                });
   
           
    });
            
                    </script>
           
<script>

$.getJSON( "products/autocomplete.json", function( data ) {
  var items = [];
  $.each( data, function( key, val ) { 
    items.push( "<li id='" + key + "'>" + val + "</li>" );
  });
 
  $( "<ul/>", {
    "class": "my-new-list",
    html: items.join( "" )
  }).appendTo( "#ajax-content" );
});
</script>

          
</body>

</html>

