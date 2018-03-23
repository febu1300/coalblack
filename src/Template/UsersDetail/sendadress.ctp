<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersDetail $usersDetail
 */
?>
<style>

</style>

            <div class="container">

                <div class="row">

                    <div class="col-md-9 clearfix" id="checkout">
  <form method="post" action="/usersDetail/sendadress">
                        <div class="box">
                          

                                <ul class="nav nav-pills nav-justified">
                                    <li class="active"><a href="#"><i class="fa fa-map-marker"></i><br>Adresse</a></li>
                                    <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Bezahlmethode</a></li>
                                    <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Bestellübersicht</a></li>
                                </ul>

                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="title">Anrede</label>
                                                <Select type="text" class="form-control" id="title">
                                                <option value="Herr">Herr</option>
                                                <option value="Frau">Frau</option>
                                                </select>
                                            </div>
                                        </div>
                                 
                                        
                                    </div>
                                    <!-- /.row -->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="fname">Vorname</label>
                                                <input type="text" class="form-control"  name="fname">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="lname">Nachname</label>
                                                <input type="text" class="form-control"  name="lname">
                                            </div>
                                        </div>
                                    </div>
       
                                    <!-- /.row -->

                                        <div class="col-sm-6 col-sm-4">
                                            <div class="form-group">
                                                <label for="address_line_1">Straße</label>
                                                <input type="text" class="form-control" name="address_line_1">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-2">
                                            <div class="form-group">
                                                <label for="address_line_2">Nummer</label>
                                                <input type="text" class="form-control" name="address_line_2">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->

                                    <div class="row">
                                        <div class="col-sm-6 col-md-2">
                                            <div class="form-group">
                                                <label for="postal_code">Postleitzahl</label>
                                                <input type="text" class="form-control" name="postal_code">
                                            </div>
                                        </div>
                                       <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="city">Ort</label>
                                                <input type="text" class="form-control" name="city">
                                            </div>
                                        </div>
                                       
                                          <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="state">State</label>
                                                <input type="text" class="form-control" name="state">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="country">Land</label>
                                                <select class="form-control" name="country">
                                                    <option value="germany">Deutschland</option>
                                                    <option value="austria">Österreich</option>
                                                    <option value="swiss">Schweiz</option>
                                                    <option value="usa">USA</option>
                                                </select>
                                            </div>
                                        </div>

                

                                    </div>
                                    <!-- /.row -->
                                </div>

                                <div class="box-footer">
                                    <div class="pull-left">
                                        <a href="/Transctions/view" class="btn btn-default"><i class="fa fa-chevron-left"></i>Zurück</a>
                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-template-main">Weiter<i class="fa fa-chevron-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.box -->


                    </div>
                    <!-- /.col-md-9 -->

                    

                </div>
                <!-- /.row -->

         
  



        




