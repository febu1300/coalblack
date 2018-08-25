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
        <div class="col-sm-3 col-md-3 col-lg-3">

    <ul class="nav nav-pills flex-column">
         
   <li class="nav-item"><?= $this->Html->link(__('List Users Detail'), ['action' => 'index']) ?></li>
        <li class="nav-item"><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li class="nav-item"><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    
    </ul>

        </div>

<div class="container"><div class="jumbotron">
      <h3><?php echo"Rechnungsadresse für";?>  <?=$sendaddId->Users['fname']." ".$sendaddId->Users['lname'];?>   </h3>  </div>  
      <hr><div class="jumbotron">
                <div class="row">
            
                    <div class="col-md-9 clearfix" id="checkout">
  <form method="post" action="/usersDetail/rechenaddresSave?theId=<?= $sendaddId->user_id?>">
                        <div class="box">

                     
                                <div class="content">
                                    <div class="row">
                                <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="studio_name">Studio Name</label>
                                                <input type="text" class="form-control" value="<?=   $sendaddId->studio_name?>"   name="studio_name">
                                            </div>
                                        </div>
                                 
                                        
                                    </div>
                                    <!-- /.row -->
                                    <div class="row">
                                   
                                    
       
                                    <!-- /.row -->

                                        <div class="col-sm-6 col-sm-4">
                                            <div class="form-group">
                                                <label for="address_line_1">Straße</label>
                                                <input type="text" class="form-control" value="<?=   $sendaddId->address_line_1?>" name="address_line_1">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-2">
                                            <div class="form-group">
                                                <label for="address_line_2">Nummer</label>
                                                <input type="text" class="form-control" value="<?=   $sendaddId->address_line_2?>" name="address_line_2">
                                            </div>
                                        </div>
                                    </div>
                        <div class="row">        
                         <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                          <label for="zusatz">Zusatz</label>
                          <input type="text" class="form-control" value="<?=   $sendaddId->zusatz?>" name="zusatz">
                       
                         </div></div>
                         </div>

                                    <div class="row">
                                        <div class="col-sm-6 col-md-2">
                                            <div class="form-group">
                                                <label for="postal_code">Postleitzahl</label>
                                                <input type="text" class="form-control" value="<?=   $sendaddId->postal_code?>" name="postal_code">
                                            </div>
                                        </div>
                                       <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="city">Ort</label>
                                                <input type="text" class="form-control" value="<?=   $sendaddId->city?>" name="city">
                                            </div>
                                        </div>
                                       
                                          <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="state">Bundesland</label>
                                                <input type="text" class="form-control" value="<?=   $sendaddId->state?>"  name="state">
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
                                        <button type="submit" class="btn btn-primary btn-block">Weiter<i class="fa fa-chevron-right"></i>
                                        </button>
                                    </div>
 </div> </form>
                        </div>  
                        <!-- /.box -->


                    </div>
                    <!-- /.col-md-9 -->

                    
      </div>
                </div>
           