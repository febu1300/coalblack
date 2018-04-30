  <?php foreach ($products1 as $productcat): ?>   
<li class="nav-item">
          
           <a class="nav-link" href='/unterkatagorien?wh=<?=$productcat['id']?>'><?=strtoupper($productcat['catagory_name'])?></a>


      </li>   
 <?php  endforeach; ?>