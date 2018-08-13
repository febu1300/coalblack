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
    <title>
        Tattoo Supply
    </title>

    <style>
        .underlinegold{
                 border-bottom: 2px solid #C7984E;
        }
    
    </style>
    

</head>
 
 
  <?=$this->cell('Jumbotron')?>
     <div class="col-sm-12 col-md-12 col-lg-12 underlinegold no-gutters">
        <div class="row">
        
          <div class="col-sm-4 col-md-4 col-lg-4 ">
           <?=$this->cell('Catagorydisplay')?>

    </div>
             <div class="col-sm-8 col-md-8 col-lg-8">
<?=$this->cell('CatagorydisplaySM')?>
     
    </div>

        </div>
    </div>
<div class="col-sm-12 col-md-12 col-lg-12 underlinegold">
    <?=$this->element('/elm_home/elm_rowlogo')?>
    <?=$this->element('/elm_home/elm_abovefooter')?>
</div>
<br><br>