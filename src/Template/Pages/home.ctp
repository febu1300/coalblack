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
  

    

</head>
<div class="col-sm-12 col-md-12 col-lg-12">
    <div class="row">
        bread crumb
    </div> </div>  
    <div class="col-sm-12 col-md-12 col-lg-12">
   <div class="row">
<?=$this->element('/elm_home/elm_section');?>
   
  </div>  
        <div class="row">
          <div class="col-sm-4 col-md-4 col-lg-4">
<?php $cell=$this->cell('Catagorydisplay')?>
      <?=$cell?>
    </div>
             <div class="col-sm-8 col-md-8 col-lg-8">
<?php $cell=$this->cell('CatagorydisplaySM')?>
      <?=$cell?>
    </div>

        </div>
    </div>