<style>

</style>

 <div class="row "> 
 <?php foreach ($products1 as $product): ?>
   
<div class="column">
    <div class="col-sm">
      <?php echo $this->Form->create('Transactions', array('class' => 'add-form', 'name'=>'theform','url' => array('controller' => 'transactions', 'action' => 'add'))); ?>
     
         <?php echo $this->Form->hidden('product_id', array('value' => $product['id'])) ?> 
            <article class="col-item">
        		<div class="photo">
        			<div class="options">
        				<a href='/produktdetail?wh=<?php echo $product['id']; ?>' class="btn btn-default btn-block"  data-toggle="tooltip" data-placement="top" title="zum Produktdetail">
                                            <span><i class="fa fa-2x fa-eye"></i></span>
        				</a>
        				
        			</div>
        			<div class="options-cart">
        				<button class="btn btn-block" data-toggle="modal" data-target=".myModal" title="In den Warenkorb">
        					<span class="fa fa-2x fa-shopping-cart"></span>
        				</button>
        			</div>
<a href='/produktdetail?wh=<?php echo $product['id']; ?>' >
    <img src="<?php echo '/'. $product['photo_dir'] . '/main/' . $product['photo']; ?>" style="width:100%" alt="<?=$product['product_name']?>"></a>        		</div>
      		
<div class="info">
        			<div class="row">
        				<div class="price-details col-md-6">
                                            	 <p><?php echo $product['product_name']; ?></p>
        					
                                             <p class="details"><?php echo $product['product_title']; ?>
                                                 </div></div>
                                             <div class="row">
                                </p> 
                                <div class=" col-sm-6 col-md-6 col-lg-6"></div>
        
<div class=" col-sm-3 col-md-3 col-lg-3 ">
    <p class="bold"><?php if($product->discount_type_id===2 ||$product->discount_type_id===3){
        echo "<strike>". $this->Number->currency($product->price,'EUR')."</strike>";
        
    } ?></p>

</div>        	
           <div class=" col-sm-3 col-md-3 col-lg-3">
               <p class="bold"><strong>
                   <?php if($product->discount_type_id===1) 
    {
        echo $this->Number->format($product->price,['places' => 2,'before'=>'€', 'locale' => 'de_DE']);
    
    }elseif(($product->discount_type_id===2) ){
        
        echo $this->Number->format($product->price-$product->discount,['places' => 2,'before'=>'€', 'locale' => 'de_DE']) ;
    }elseif($product->discount_type_id===3){
               echo $this->Number->format($product->price-$product->price*($product->discount/100),['places' => 2,'before'=>'€', 'locale' => 'de_DE']) ;

      
    }
            
            ?></strong></p>
                
            </div>                                      </div>
        			
        		</div>
        	</article><?php if($product->sale){ ?><div class="text-block">Sale</div> <?php }  ?>
    </div>
        </div> 
      <?= $this->Form->end() ?>
     
 <?php  endforeach; ?>
</div>

