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
        <a href='/all_produkte?wh=<?php echo $product['id']; ?>' >
      <img src="<?php echo '/'. $product['photo_dir'] . '/main/' . $product['photo']; ?>" style="width:100%" alt="Card image">
      <div class="gold-block"> 
          <h3><?php echo $product['sub_catagory_name']; ?></h3></div>
        </a>
     
      </div>
   
 
    <?php  endforeach; ?>
<!-- END GRID -->
</div>

                             
 
 
             