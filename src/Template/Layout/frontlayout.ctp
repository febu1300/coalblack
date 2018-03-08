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
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Buruk">
   <title>

        <?php $this->fetch('title') ?>
    </title>


      <?= $this->Html->css('site_global.css') ?>
   <?= $this->Html->css('bootstrap.min.css') ?>


    <?= $this->Html->script('jquery-1.8.3.min.js') ?>
                <?= $this->Html->script('popper.min.js') ?>
 <?= $this->Html->script('bootstrap.min.js') ?>
   

  <?= $this->fetch('script') ?>

   
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
  
  

     <style>
    
    </style>
</head>
    <body>
        <div class="container-fluid">
            <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">
                
                        <?=$this->element('elm_header')?>
            
      <div class="row">
      <div class="col-sm-6 col-md-6 col-lg-6"> 
            <?=$this->element('elm_logo')?>
      </div>
      <div class="col-sm-3 col-md-3 col-lg-3"> 
           <?=$this->element('elm_search')?>
      </div>
          
       </div> 
                      
      <div class="row">
       <div class="col-sm-12 col-md-12 col-lg-12"> 
            <?=$this->element('elm_navbar')?>

       </div>
       </div>
  
</div></div>

           
        
<div class="container" >
    <?= $this->Flash->render() ?>
   
        <?= $this->fetch('content') ?>
        
      
       </div>   
     
      <div class="container-fluid ">
          
          <?= $this->element('elm_footer')?>
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
</body>

</html>

