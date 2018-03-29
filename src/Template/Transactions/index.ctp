
<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-light " >
  <a class="navbar-brand" href="#">Navbar</a>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
  
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="/transactions"><span class="glyphicon glyphicon-bell"></span>  <span class="badge badge-secondary bg-danger badge-pill"><?=$this->cell('Notification')?></span></a></li>
     
      <li><a href="/users/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>

<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3 ">
 

<ul class="nav nav-pills flex-column">
  <li class="nav-item">
    <a class="nav-link active" href="#">Active</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
      <a class="dropdown-item" href="#">Action</a>
      <a class="dropdown-item" href="#">Another action</a>
      <a class="dropdown-item" href="#">Something else here</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Separated link</a>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Disabled</a>
  </li>
</ul>


    </div>
    <div class="col-sm-9 col-md-9 col-lg-9">
       <table class="table table-sm table-inverse" cellpadding="0" cellspacing="0">
        <thead>
            <tr> <th scope="col">#</th>
                <th scope="col">Order Id</th>
                <th scope="col" ">Verschickt</th>
                   <th scope="col" ">Rechnung</th>
                <th scope="col" ">Liferungschein</th>
          
            </tr>
        </thead>
        <tbody><?php $i=0;?>
    <?php foreach ($transactions as $cart):?>
    <tr>
     <?php if ($cart->sent==Null):?>
        <td><?= $i=$i+1?></td>
         <td><?= $cart->order_number?></td>

      
<td >
<form  method="post" action="/transactions/sent">
     
    <input type="checkbox" name="orderId"  oninvalid="this.setCustomValidity('Einchecken erst ob die waren verschickt ist')" required value="<?= $cart->order_number?>"> 
   
  <input label="verschickt" type="submit" value="Verschicken" >

</form> 
</td>
 <td class="actions">
<form method='post' action="/transactions/makepdf">
  <input type="input" hidden name="orderId" value="<?= $cart->order_number?>"> 
 
  <input label="drucken" type="submit"  formtarget="_blank" value="Drucken">
</form>               
 </td>
  <td class="actions">
<form method='post' action="/transactions/makeliferung">
  <input type="input" hidden name="orderId" value="<?= $cart->order_number?>"> 
 
  <input label="drucken" type="submit"  formtarget="_blank" value="Drucken">
</form>               
 </td>
            </tr>
     

    <?php endif;?>
    <?php endforeach;?>
                         </tbody>
    </table>

    </div>
         
    </div>
