<p >
 <?php foreach ($products1 as $productcat): ?>   

      
<p class="no-gutters"><a class="no-gutters" href='/produktkatagorien?wh=<?=$productcat['id']?>' ><?=$productcat['main_catagory_name']?></a></p>

    
 <?php  endforeach; ?>
<p>