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


  
   <?= $this->Html->css('bootstrap.min.css') ?>


    <?= $this->Html->script('jquery-1.8.3.min.js') ?>
    <?= $this->Html->script('popper.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>

    <?= $this->fetch('script') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
  


    <style>
        a {
   outline: 0;
}
 
  a:hover{
        color:darkgoldenrod;
        text-decoration:none; 
    }
    .minpadding{
        padding-bottom: 5px;
        padding-top: 5px;
    }
        .kein-gutters {
  margin-right: 0;
  margin-left: 0;

  padding-left: 5px;
  padding-right: 5px;
}

 .row-eq-height {
    display: table-cell;
    padding: 16px;
}
div.row-eq-height {
    display:flex;    
    align-items:stretch;
}
.container {
    position: relative;
    font-family: Arial;
}

.gold-block {
    position: absolute;
    bottom: 50px;
    right: 20px;
    background-color: rgba(125,125,125,0);
    color: red;
    padding-left: 20px;
    padding-right: 20px;
       padding-top: 20px;
    padding-bottom: 20px;
    border-bottom: 5px solid #ffffff;
    border-right: 5px solid #ffffff;

}
.textoverimg{
    color: darkgoldenrod;
}
.border-color{

        border-style:solid;
        border-width:2px;
        border-color:#c7984e;   
    }
</style>
</head>
    <body>
        <div class="container-fluid">
 <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">
          
      <div class="row">
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
                      
      <div class="row">
       <div class="col-sm-12 col-md-12 col-lg-12"> 
            <?=$this->element('elm_navbar')?>

       </div>
 
       </div>
  
</div>
 
       </div>
  
</div>
        </div>

           
        
<div class="container " >
    

        
<?= $this->fetch('sidebar') ?>


         <?= $this->Flash->render() ?>
   
        <?= $this->fetch('content') ?>
        
      
       </div>   
     
     
  
</body>

</html>

