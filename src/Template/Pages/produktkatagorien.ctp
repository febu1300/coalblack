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

    <title>Produktkatagorien</title>

</head>


    <div class="col-sm-12 col-md-12 col-lg-12">
        

    <div class="row">

      <div class="col-sm-3 col-md-3 col-lg-3">
   
     <?= $this->element('sidebar/productcatagory'); ?>
       
    </div>
      
  <div class="col-sm-8 col-md-8 col-lg-8">
<?=$this->cell('Produktkatagorie')?>
  
    </div>

     
     </div>  

</div> 

  


 

    