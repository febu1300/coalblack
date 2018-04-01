
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

    <title>meine Seite</title>

</head>


    <div class="col-sm-12 col-md-12 col-lg-12">
        
    <div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">
<?php $this->Html->addCrumb('meine Seite');?>
    </div>
    
    </div>
    <div class="row">
        <div class="col-sm-3 col-md-3 col-lg-3">
<?=$this->element('sidebar/meineseite');?>
            </div>
  
        <div class="col">
                <div class="jumbotron" >
    <div class="card-header"><h5>Versandadress</h5></div>
  <div class="card-body">
   <div class="col-sm-6 col-md-6 col-lg-6">
 
    <?=$this->cell('Shippingadd');?>
    </div>
      </div>  
  
     
      <div class="card-header"><h5>Rechnungadress</h5></div>
      
    <div class="card-body">
      <div class="col-sm-6 col-md-6 col-lg-6">
 <?=$this->cell('Billingadd');?>
</div>
</div>
         
      
    


    <div class="card-header"><h5>Bestellungen</h5></div>
      

      <div class="col-sm-12 col-md-12 col-lg-12">
 <?=$this->cell('Orders');?>
</div>

          </div>
    
     </div>  
     
     </div>  

</div> 

