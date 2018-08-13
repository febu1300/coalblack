<style>
.flex-container {
  display: flex;
  flex-wrap: wrap;

}

.flex-container > div {
  background-color: inherit;

  margin: 0px;
  text-align: center;
  line-height: 75px;
  font-size: 30px;
}
</style>
</head>
<body>

<!-- MAIN (Center website) -->
<div class="flex-container">


<!-- Portfolio Gallery Grid -->

    <?php foreach ($products1 as $product): ?>
 
<div class="col-sm-6 col-md-6 col-lg-6 ">
       <a href='/unterkatagorien?wh=<?=$product['id']?>'>  
           <img class="cat-sm-responsive2" src="<?php echo '/'. $product['photo_dir'] . '/main/' . $product['photo']; ?>"  alt="Card image">
     
      <div class="gold-rect">
          
    <div class="cat-sm-textoverimg"><?=$product['catagory_name']?> ></div>

  </div>
   </a>
     
      </div>
   
 
    <?php  endforeach; ?>
<!-- END GRID -->
</div>

                             
 
 