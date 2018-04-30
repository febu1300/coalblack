<p >
 <?php foreach ($products1 as $productcat): ?>   


      
    <a  href='/unterkatagorien?wh=<?=$productcat['id']?>'><?=$productcat['catagory_name']?></a><br>


    
 <?php  endforeach; ?>
<p>