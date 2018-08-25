<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersDetail $usersDetail
 */
?>
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
        <div class="col-sm-2 col-md-2 col-lg-2">
<nav class="navbar navbar-expand-lg navbar-dark bg-light" id="actions-sidebar">
    <ul class="nav nav-pills flex-column">

        <li  class="nav-item"><?= $this->Html->link(__('Neueprodukt '), ['action' => 'add']) ?></li>
        <li class="nav-item"><?= $this->Html->link(__('Lagerbestandverwalten'), ['controller' => 'Transactions', 'action' => 'bestandsposten']) ?></li>
        <li class="nav-item"><?= $this->Html->link(__('Subkatagorieliste'), ['controller' => 'SubCatagories', 'action' => 'index']) ?></li>
        <li class="nav-item"><?= $this->Html->link(__('Produktdetailbearbeiten'), ['controller' => 'ProductsDetails', 'action' => 'detailsindex']) ?></li>
       <li class="nav-item"><?= $this->Html->link(__('Neueproduktdetail'), ['controller' => 'ProductsDetails', 'action' => 'add']) ?></li>
        <li class="nav-item"><?= $this->Html->link(__('MehrBilder'), ['controller' => 'Pictures', 'action' => 'index']) ?></li>

        
    </ul>
</nav>
        </div>
      
<div class="container">
     <?php foreach ($usersDetail as $usersDetail): ?>
 <?php if($sid==$usersDetail->user_id && $usersDetail->main_address==1): ?>


   
   <div class="container">
        <?php if($usersDetail->user_detail_type_id==1): ?>

       <div class="col-sm-6 col-md-6 col-lg-6">
           <div class="jumbotron">  <h4>Sendungsadress</h4>  </div>
           <div class="jumbotron">
                                 <div class="box">
                          

                     
                                <div class="content">
                                    <div class="row">
                                <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="studio_name">Studio Name</label>
                                                <input readonly="readonly" type="text" class="form-control" value="<?=$usersDetail->studio_name?>"   name="studio_name">
                                            </div>
                                        </div>
                                 
                                        
                                    </div>
                                    <!-- /.row -->
                                    <div class="row">
                                   
                                    
       
                                    <!-- /.row -->

                                        <div class="col-sm-6 col-sm-4">
                                            <div class="form-group">
                                                <label for="address_line_1">Straße</label>
                                                <input readonly="readonly" type="text" class="form-control" value="<?=$usersDetail->address_line_1?>" name="address_line_1">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-2">
                                            <div class="form-group">
                                                <label for="address_line_2">Nummer</label>
                                                <input readonly="readonly" type="text" class="form-control" value="<?=$usersDetail->address_line_2?>" name="address_line_2">
                                            </div>
                                        </div>
                                    </div>
                                                 <div class="row">         <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                          <label for="zusatz">Zusatz</label>
                          <input readonly="readonly" type="text" class="form-control" value="<?= $usersDetail->zusatz?>" name="zusatz">
                         </div></div>
                         </div>

                                    <div class="row">
                                        <div class="col-sm-6 col-md-2">
                                            <div class="form-group">
                                                <label for="postal_code">Postleitzahl</label>
                                                <input readonly="readonly" type="text" class="form-control" value="<?=$usersDetail->postal_code?>" name="postal_code">
                                            </div>
                                        </div>
                                       <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="city">Ort</label>
                                                <input readonly="readonly" type="text" class="form-control" value="<?=$usersDetail->city?>" name="city">
                                            </div>
                                        </div>
                                       
                                          <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="state">Bundesland</label>
                                                <input readonly="readonly" type="text" class="form-control" value="<?=$usersDetail->state?>"  name="state">
                                            </div>
                                        </div>
                                       <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="country">Land</label>
                                                <select readonly="readonly" class="form-control" name="country">
                                                    <option value="Detuschland">Deutschland</option>
                                                    <option value="Österreich">Österreich</option>
                                                    <option value="Schweiz">Schweiz</option>
                                       
                                                </select>
                                            </div>
                                        </div>

                

                                    </div>
                                    <!-- /.row -->
                                </div>
<div class="row">

                                <div class="col-sm-9 col-md-9 col-lg-9">
                             </div>
    <div class="col-sm-3 col-md-3 col-lg-3">

                                    <div class="pull-right">
                                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usersDetail->id], ['class' => "glyphicon btn btn-template-main glyphicon-edit", 'data-toggle' => "modal", 'data-target' => "#editUserDetail"]) ?>

                                    </div>
                                </div></div>
 </div>
           </div>
       </div> 
           <?php elseif($usersDetail->user_detail_type_id==2): ?>

          <div class="col-sm-6 col-md-6 col-lg-6">
              <div class="jumbotron"><h5>Rechnungssadress</h5></div>
               <div class="jumbotron">
                                 <div class="box">
                          

                     
                                <div class="content">
                                    <div class="row">
                                <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="studio_name">Studio Name</label>
                                                <input type="text" class="form-control" value="<?=$usersDetail->studio_name?>"   name="studio_name">
                                            </div>
                                        </div>
                                 
                                        
                                    </div>
                                    <!-- /.row -->
                                    <div class="row">
                                   
                                    
       
                                    <!-- /.row -->

                                        <div class="col-sm-6 col-sm-4">
                                            <div class="form-group">
                                                <label for="address_line_1">Straße</label>
                                                <input type="text" class="form-control" value="<?=$usersDetail->address_line_1?>" name="address_line_1">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-2">
                                            <div class="form-group">
                                                <label for="address_line_2">Nummer</label>
                                                <input type="text" class="form-control" value="<?=$usersDetail->address_line_2?>" name="address_line_2">
                                            </div>
                                        </div>
                                    </div>
                                                 <div class="row">         <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                          <label for="zusatz">Zusatz</label>
                          <input type="text" class="form-control" value="<?= $usersDetail->zusatz?>" name="zusatz">
                         </div></div>
                         </div>

                                    <div class="row">
                                        <div class="col-sm-6 col-md-2">
                                            <div class="form-group">
                                                <label for="postal_code">Postleitzahl</label>
                                                <input type="text" class="form-control" value="<?=$usersDetail->postal_code?>" name="postal_code">
                                            </div>
                                        </div>
                                       <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="city">Ort</label>
                                                <input type="text" class="form-control" value="<?=$usersDetail->city?>" name="city">
                                            </div>
                                        </div>
                                       
                                          <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="state">Bundesland</label>
                                                <input type="text" class="form-control" value="<?=$usersDetail->state?>"  name="state">
                                            </div>
                                        </div>
                                       <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="country">Land</label>
                                                <select class="form-control" name="country">
                                                    <option value="Detuschland">Deutschland</option>
                                                    <option value="Österreich">Österreich</option>
                                                    <option value="Schweiz">Schweiz</option>
                                       
                                                </select>
                                            </div>
                                        </div>

                

                                    </div>
                                    <!-- /.row -->
                                </div>
<div class="row">

                                <div class="col-sm-9 col-md-9 col-lg-9">
                             </div>
    <div class="col-sm-3 col-md-3 col-lg-3">

                                    <div class="pull-right">
                                             <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usersDetail->id], ['class' => "glyphicon btn btn-template-main glyphicon-edit", 'data-toggle' => "modal", 'data-target' => "#editUserDetail"]) ?>

                                  
                                    </div>
                                </div></div>
 </div>
           </div>
       </div>
   </div>
 <?php endif; ?> <?php endif; ?>
  <?php endforeach; ?>
    <hr><form method="post" action="/users-detail/adressepruefen">
  
      <button type="submit" class="btn btn-primary btn-block">Weiter<i class="fa fa-chevron-right"></i>
      </button></form>
</div>
       <script>                    
                    $('body').on('hidden.bs.modal', '.modal', function () {
        $(this).removeData('bs.modal');
      });
              </script>
              
       <div id="editUserDetail" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                     
                <div class="modal-body">                                       
   

 


                    </div>
                    <div class="clearfix"></div>
                <div class="modal-footer">
                   
                    <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
           
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>