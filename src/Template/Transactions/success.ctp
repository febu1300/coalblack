 <?php
 $this->layout(false);
 ?>
<!DOCTYPE html>
<html>
<head>
 

 
</head>
<style>
    #container{
        margin: 20%;
    }
</style>
<body>
    <div id="container">
        <div id="header">
            <h1><?= __('Thank you for your Order') ?></h1>
        </div>
        <div id="content">
            
<div class="alert alert-Success">
    <strong>You can download your Order details here<a href='/pdf_download/order.pdf'><i class="fa fa-print" ></i>
</a>

            <?= $this->Flash->render() ?>

            <?= $this->fetch('content') ?></strong> 
        </div></div>
        <div id="footer">
            <?= $this->Html->link(__('Back'), ['controller'=>'pages','action'=>'display','home']) ?>
        </div>
        
        

    </div>
</body>
</html>
