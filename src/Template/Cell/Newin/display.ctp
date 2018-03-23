<style>
    @import url(//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css);
/* Animation.css*/
@import url(https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css);

* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: Arial;
}


.row {
    display: flex;
    flex-wrap: wrap;
    padding: 0 4px;
}

/* Create four equal columns that sits next to each other */
.column {
    flex: 50%;
    max-width: 50%;
    padding: 0 4px;
}

.column:nth-of-type(2n+3) {
  align-self: flex-start;
  margin-top: -295px;

}

.column img {
    margin-top: 8px;
    vertical-align: top;
}
/* Responsive layout - makes a two column-layout instead of four columns */
@media (max-width: 800px) {
.column {
    flex: 50%;
    max-width: 50%;
    padding: 0 4px;
}
}
@media (min-width:600px) and ( max-width: 800px)  {
    .column {
        flex: 75%;
        max-width: 75%;
    }
}
/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media (max-width: 600px) {
    .row {
    display: flex;
    flex-wrap: wrap;
    padding: 0 4px;
 
}
        .column {
        flex: 100%;
        max-width: 100%;
          justify-content: space-around;
        
    }
    .column:nth-of-type(n+1) {
  align-self: flex-start;
  margin-top: 50px;

}
    .column:nth-of-type(2+5n-1) {
  align-self: flex-start;
  margin-bottom: 100px;

}
    * {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: Arial;
}



/* Create four equal columns that sits next to each other */




.column img {
    margin-top: 0px;
    vertical-align: top;
}
}
.container {
    position: relative;
    font-family: Arial;
}

.text-block {
    position: absolute;
    bottom: 150px;
    right: 20px;
    background-color: darkgoldenrod;
    color: white;
    font-weight: bold;
    padding-left: 20px;
    padding-right: 20px;
    padding-bottom: 3px;
    padding-top: 3px;
}

.col-item {
  border: 1px solid #E1E1E1;
  background: #FFF;
  margin-bottom:12px;
}
.col-item .options {
  position:absolute;
  top:6px;
  right:22px;
}
.col-item .photo {
  overflow: hidden;
}
.col-item .photo .options {
  display:none;
}
.col-item .photo img {
  margin: 0 auto;
  width: 100%;
}

.col-item .options-cart {
  position:absolute;
  left:22px;
  top:6px;
  display:none;
}
.col-item .photo:hover .options,
.col-item .photo:hover .options-cart {
  display:block;
  -webkit-animation: fadeIn .5s ease;
  -moz-animation: fadeIn .5s ease;
  -ms-animation: fadeIn .5s ease;
  -o-animation: fadeIn .5s ease;
  animation: fadeIn .5s ease;
}
.col-item .options-cart-round {
  position:absolute;
  left:42%;
  top:22%;
  display:none;
}
.col-item .options-cart-round button {
  border-radius: 50%;
  padding:14px 16px;
  
}
.col-item .options-cart-round button .fa {
  font-size:22px;
}
.col-item .photo:hover .options-cart-round {
  display:block;
  -webkit-animation: fadeInDown .5s ease;
  -moz-animation: fadeInDown .5s ease;
  -ms-animation: fadeInDown .5s ease;
  -o-animation: fadeInDown .5s ease;
  animation: fadeInDown .5s ease;
}
.col-item .info {
  padding: 10px;
  margin-top: 1px;
}
.col-item .price-details {
  width: 100%;
  margin-top: 5px;
}
.col-item .price-details h1 {
  font-size: 14px;
  line-height: 20px;
  margin: 0;
  float:left;
}
.col-item .price-details .details {
  margin-bottom: 0px;
  font-size:12px;
}
.col-item .price-details span {
  float:right;
}
.col-item .price-details .price-new {
  font-size:16px;
}
.col-item .price-details .price-old {
  font-size:18px;
  text-decoration:line-through;
}
.col-item .separator {
  border-top: 1px solid #E1E1E1;
}

.col-item .clear-left {
  clear: left;
}
.col-item .separator a {
  text-decoration:none;
}
.col-item .separator p {
  margin-bottom: 0;
  margin-top: 6px;
  text-align: center;
}

.col-item .separator p i {
  margin-right: 5px;
}
.col-item .btn-add {
  width: 60%;
  float: left;
}
.col-item .btn-add a {
  display:inline-block !important;
}
.col-item .btn-add {
  border-right: 1px solid #E1E1E1;
}
.col-item .btn-details {
  width: 40%;
  float: left;
  padding-left: 10px;
}
.col-item .btn-details a {
  display:inline-block !important;
}
.col-item .btn-details a:first-child {
  margin-right:12px;
}
.btn-block{
    background-color:rgba(0,0,1,0.2);
    
    border-color: goldenrod;
border-width: 3px}
.fa{
    color:red;
}
</style>

<div class="container-fluid">
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
                                            <span><i class="fa fa-eye"></i></span>
        				</a>
        				
        			</div>
        			<div class="options-cart">
        				<button class="btn btn-default" title="In den Warenkorb">
        					<span class="fa fa-shopping-cart"></span>
        				</button>
        			</div>
<a href='/produktdetail?wh=<?php echo $product['id']; ?>' ><img src="<?php echo '/'. $product['photo_dir'] . '/main/' . $product['photo']; ?>" style="width:100%" alt="<?=$product['product_name']?>"></a>        		</div>
      		
<div class="info">
        			<div class="row">
        				<div class="price-details col-md-6">
        					 <p><?php echo $product['product_name']; ?></p>
        <p class="details"><?php echo $product['product_description']; ?>
                                </p>
        		<span class="price-new">$<?php echo money_format('%i', $product['price']); ?></span>
        				</div>
        			</div>
        		</div>
        	</article><div class="text-block">New</div>  
    </div>
        </div> 
      <?= $this->Form->end() ?>
 <?php  endforeach; ?>
</div>
</div>