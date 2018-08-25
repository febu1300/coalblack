
<?php
/**
  * @var \App\View\AppView $this
  */
?>
<style>
    .no-gutters {
  margin-right: 0;
  margin-left: 0;
margin-top:0;
margin-bottom:0;

}
</style>
 <div class="container-fluid">
<nav class="navbar navbar-expand-lg  bg-light " >
  <a class="navbar-brand" href="/dashboard">Dashboard</a>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      
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
      <li class="nav-item"><?= $this->Html->link(__('Dashboard'), ['controller' => 'Dashboard', 'action' => 'index']) ?></li>
           <li class="nav-item"><?= $this->Html->link(__('Bestandsverwaltung'), ['controller' => 'Transactions', 'action' => 'bestandsposten']) ?></li>
        <li class="nav-item"><?= $this->Html->link(__('Produktliste'), ['controller'=>'products','action' => 'index']) ?></li>
      
   <li class="nav-item"><?= $this->Html->link(__('gesendete Artikel'), ['controller'=>'transactions','action' => 'sent_items']) ?></li>

      
    </ul>


    </div>
    <div class="col-sm-9 col-md-9 col-lg-9">
        <h3><?= __('Versandverwaltung') ?></h3>
       <table class="table table-sm table-bordered " cellpadding="0" cellspacing="0">
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
     <?php if ($cart->sent==0):?>
        <td><?= $i=$i+1?></td>
        <td><p><strong><?= $cart->order_number?></strong></p></td>

  
<td class="no-gutters" >
<form  method="post" action="/transactions/sent">
    <input style=" width:50px " type="checkbox" name="orderId"  oninvalid="this.setCustomValidity('Einchecken erst ob die waren verschickt ist')" required value="<?= $cart->order_number?>"> 
    <button  type="submit"   class="btn btn-primary"><span class="glyphicon glyphicon-send"></span></button>
</form> 
</td>
 <td class="no-gutters">
<form method='post' action="/transactions/makepdf">
  <input type="input" hidden name="orderId" value="<?= $cart->order_number?>"> 
 
 <button  type="submit"  formtarget="_blank" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span></button>
</form>               
 </td>
  <td class="no-gutters">
<form method='post' action="/transactions/makeliferung">
  <input type="input" hidden name="orderId" value="<?= $cart->order_number?>"> 
  <button  type="submit"  formtarget="_blank" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span></button>

 
</form>               
 </td>
            </tr>
     

    <?php endif;?>
    <?php endforeach;?>
                         </tbody>
    </table>

    </div>
        
    </div>
</div>
       <script>                    
                    $('body').on('hidden.bs.modal', '.modal', function () {
        $(this).removeData('bs.modal');
      });
              </script>