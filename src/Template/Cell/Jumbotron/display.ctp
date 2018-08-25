<style>
   
</style>
<div class="container no-padding no-margin">
 <?php foreach($products1 as $products):?>

 <div class="jumbotron bg-light border-light no-padding">
    
      <a href="/neue_produkte"><img class="banner responsive" src=" <?php echo '/'. $products['photo_dir'] . '/main/' . $products['photo']; ?>" >
           <div class="gold-rect-banner">
          
               <h2 class="textoverimg">NEW STUFF<br>SHOP NOW ></h2>

  </div>

      </a>     
 <?php endforeach; ?>
 </div>
</div>