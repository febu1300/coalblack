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

$this->layout = false;
//pr($this->request->query('wh'));die();

?>


   
 
  
  <div class="col-sm-12 col-md-12 col-lg-12">
<?=$this->cell('Autosuggest',['wh'=>$this->request->query('wh')])?>
  
    </div>

     
     </div>  



