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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
  
    </title>
    <?= $this->Html->meta('icon') ?>


    <?= $this->Html->css('backendbootstrap.min.css') ?>
<?= $this->Html->css('backend.css') ?>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


   
<?= $this->Html->meta(
    'favicon.ico',
    'img/icon.png',
    ['type' => 'icon']
);
?>
    <?= $this->fetch('css') ?>
   <?= $this->fetch('script') ?>
    
</head>
<body>

    <?= $this->Flash->render() ?>
    <div class="container-fluid">
        <?= $this->fetch('content') ?>
     
    </div>
    <footer>
    </footer>
</body>
</html>
