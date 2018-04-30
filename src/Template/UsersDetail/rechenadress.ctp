<style>

</style>

            <div class="container">
             
<div class="row">
  
<br /><br />
<!-- another version - flat style with animated hover effect -->
    <div class="breadcrumb flat">
        <a href="#" class="cap" > <span class="fa fa-cart-plus fa-2x"> </span>Warenkorb</a>
        
        <a href="#" class="active cap"><span class="fa fa-pencil-square-o fa-2x"></span>Rechnunungsadresse</a>
        <a href="#" class="cap"><span class="fa fa-euro fa-2x"></span>Zahlungsart</a>
        <a href="#" class="cap"><span class="fa fa-check-square-o fa-2x"></span>Checkout</a>
         
    </div>
</div>
    
                <div class="row">

                    <div class="col-md-9 clearfix" id="checkout">
  <form method="post" action="/usersDetail/addrechenadres">
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
                                    <!-- /.row -->

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
                                        <button type="submit" class="btn btn-template-main">Weiter<i class="fa fa-chevron-right"></i>
                                        </button>
                                    </div>
                                </div></div>
 </div> </form>
                        </div>  
                        <!-- /.box -->


                    </div>
                    <!-- /.col-md-9 -->

                    

                </div>
           