  <?php foreach ($products1 as $productcat): ?>   
<li class="nav-item kein-gutters">
          
           <a class="nav-link" href='/produktkatagorien?wh=<?=$productcat['id']?>'><?=strtoupper($productcat['main_catagory_name'])?></a>


      </li>   
 <?php  endforeach; ?>