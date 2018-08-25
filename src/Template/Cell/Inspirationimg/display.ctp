<style>
 
</style>
<div class="container no-padding no-margin">
 <?php foreach($products1 as $products):?>

 <div class="jumbotron bg-light border-light no-padding">
    
      <a href="/neue_produkte"><img class=" inspiration responsive" src=" <?php echo '/'. $products['photo_dir'] . '/main/' . $products['photo']; ?>" >
           <div class="gold-rect-insp">
          
               <h2 class="textoverimginspire">INSPIRATION</h2>

  </div>

      </a>     
 <?php endforeach; ?>
 </div>
</div>