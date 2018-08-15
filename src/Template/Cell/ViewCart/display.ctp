<div class="container">
    <div class="row">
        <div class="col-sm-3 col-md-3 col-lg-3 "></div>
        <img class="media-object" src="/img/logo.svg" style="width:200px; height: 120px" >
         <div class="col-sm-3 col-md-3 col-lg-3"></div>
    </div>
          <div class="row ">
              <div class="col-sm-12 col-md-12 col-lg-12 ">
                   <?php $total=0;?>
 
    <?php foreach ($products as $product):?>
     
                <?php
             $productname= explode(" ",$product->product_name);
             $productname1=implode("",$productname);
             ?>
   
        <?php if(($product->online_vorhanden && $product->photo)){ ?>

           
             <?php 
            
            $session = $this->request->session();
            //$colorname1 =  $productname1."_".$color->color."_".$size->size;
                  $colorname1 =  $productname1;  
             $name2 = $session->read($colorname1);

             $this->set('name2',$name2);
             ?>
                <?php if(($name2)){ ?>   
      
                
             <div class="row  " >
    
                 <div class="col-sm-3 col-md-3 col-lg-3 thebodyline " >
                            <a class="thumbnail pull-left " href="#"> <img src="<?php echo '/'.$product['photo_dir']. '/main/'.$product['photo']; ?>" style="width:150px; height:150px" > </a>
                          </div>
                  <div class="col-sm-1 col-md-1 col-lg-1 thebodyline alignend ">
            
                      <span class="push-down cart_cell" > <h6><?=$name2[$product->id]?>x</h6></span>
                         
                       </div>
                 <div class="col-sm-3 col-md-3 col-lg-3 thebodyline alignend">
                     <span class="push-down"> <h6> <?=$product['product_name']?></h6></span>
                 </div>
                 <div class="col-sm-1 col-md-1 col-lg-1 thebodyline alignend "></div>
                    <div class="col-sm-1 col-md-1 col-lg-1 thebodyline alignend ">
                        
                       <span class="push-price"><h6>
                                  <?php if($product->discount_type_id===1) 
    {
           $cal= $name2[$product->id]*$product['price'];
        echo $this->Number->currency( $cal,'EUR');
    
    }elseif(($product->discount_type_id===2) ){
       $cal= $name2[$product->id]*$product['price']-$name2[$product->id]*$product->discount;
        echo $this->Number->currency( $cal,'EUR');
    }elseif($product->discount_type_id===3){
      $cal=$name2[$product->id]*$product['price']-$name2[$product->id]*$product['price']*($name2[$product->id]*$product->discount/100);
        echo $this->Number->currency( $cal,'EUR');
    }
            
            ?>  
                               </h6></span>
                   </div>
                         <div class="col-sm-1 col-md-1 col-lg-1 thebodyline alignend">
                               <span class="pushdown"> <form method="post" action="/transactions/delete?prod=<?=$product->id?>">   
                             
                         <button class=" button button5 push-down" >
                             <span ><img src="/img/x.svg" style="width:30px; height:30px"></span>
                         </button> 
                                     
                            </form></span>
                          
                         </div>
          
               
             </div> <br>
      
 <?php $total = $total + ($cal);?>
           
                        <?php }}?>
      
      <?php endforeach;?>

</div>
        </div>          
       <div class="row">           
           <div class="col-sm-6 col-md-6 col-lg-6">
               
           </div>       
           <div class="col-sm-4 col-md-4 col-lg-4">
               

               <br>
                 <div class="row"> 
                     <div class="col-sm-6 col-md-6 col-lg-6 "> <span class="push-down"><h6> NettoBetrag:</h6> </span></div>
                     <div class="col-sm-4 col-md-4 col-lg-4"><span class="push-down "><h6>   <?=$this->Number->currency($total-$total*19/100,'EUR')?>  </h6></span></div>
                  
                 </div><br>
                               <div class="row "> 
                     <div class="col-sm-6 col-md-6 col-lg-6 "> <span class="push-down"><h6> MWSt 19%:</h6> </span></div>
                    <div class="col-sm-4 col-md-4 col-lg-4 pull-right"><span class="push-down"><h6>  <?=$this->Number->currency($total*19/100,'EUR')?>    </h6></span></div>
                               </div><br>
                               <div class="row"> 
                     <div class="col-sm-6 col-md-6 col-lg-6 "> <span class="push-down"><h6>Gesamtpreise:</h6> </span></div>
                    <div class="col-sm-4 col-md-4 col-lg-4"><span class="push-down"><h6>   <?=$this->Number->currency($total,'EUR')?>    </h6></span></div>
                               </div><br>
               <div class="row">
                     <a href="/" class="btn btn-primary btn-block">
        << weiter shoppen</a> 
               
               </div>
               <div class="row"></div><br>
              
                 <form method="post" action="/Users/ologin">
                      <div class="row">  
                     <button class="btn btn-primary btn-block" >
                         ZUR KASSE <span>>></span></button> </div></form>
           </div>    
           
 
          </div>               
             <div class="row">  
       
</div>
</div>
 
