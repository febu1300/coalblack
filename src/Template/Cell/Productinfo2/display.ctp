
<div class="col-sm-5 col-md-5 col-lg-5 row-eq-height"></div>

   <?php foreach ($products1 as $product): ?>
 <h6><?=strtoupper($product['photo']);?></h6>
 <div class="row">
<?=$this->Text->autoParagraph($product['description']);?>
     </div>
    <?php  endforeach; ?>