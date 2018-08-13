
  

     
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

$this->layout = 'frontlayout';


?>


<head>
  

    <title>Produkt Detail</title>

</head>
	<script src='/js/jquery.elevatezoom.js'></script>


        
    <div class="row">
    
    <div class="col-sm-3 col-md-3 col-lg-3">
  <?php $this->Html->addCrumb('Produkt Detail');?>
    </div>
     
    </div>

  <div class="row ">
        <div class="col-sm-3 col-md-3 col-lg-3">
<?=$this->element('sidebar/produktdetail');?>
        </div>
  
      <?=$this->cell('Produktinfo')?>

   </div>
    
      <div class="row">
                  <div class="col-sm-3 col-md-3 col-lg-3">

        </div>
       
          <div class="col-sm-4 col-md-4 col-lg-4">
             
             <?=$this->cell('ProductFotos')?>
 
          </div>
          <div class="col-sm-5 col-md-5 col-lg-5">
<?=$this->cell('Productinfo2',['wh'=>$this->request->query('wh')])?>
    
          </div>
      </div>



