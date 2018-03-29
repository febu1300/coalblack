<style>
/*custom font*/
@import url(https://fonts.googleapis.com/css?family=Merriweather+Sans);
 @import url("//https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
* {margin: 0; padding: 0;}

.breadcrumb {
    /*centering*/
    display: inline-block;

    overflow: hidden;
    border-radius: 5px;
    /*Lets add the numbers for each link using CSS counters. flag is the name of the counter. to be defined using counter-reset in the parent element of the links*/
    counter-reset: flag; 
        text-align: center;
}

.breadcrumb a {
    text-decoration: none;
    outline: none;
    display: block;
    float: left;
    font-size: 12px;
    line-height: 36px;
    color: white;
    /*need more margin on the left of links to accomodate the numbers*/
    padding: 0 25px 0 200px;
    background: #ffffff;
    background: linear-gradient(#ffffff, #000111);
    position: relative;
}
/*since the first link does not have a triangle before it we can reduce the left padding to make it look consistent with other links*/
.breadcrumb a:nth-child(1){
    padding-left: 50px;
    border-radius: 5px 0 0 5px; /*to match with the parent's radius*/
    border: 3px #D39745 solid;
}
.breadcrumb a:nth-child(2) {
    padding-left: 50px;
    border-radius: 5px 0 0 5px; /*to match with the parent's radius*/
    border: 3px #D39745 solid;
}
.breadcrumb a:nth-child(3) {
    padding-left: 50px;
    border-radius: 5px 0 0 5px; /*to match with the parent's radius*/
    border: 3px #D39745 solid;
}

.breadcrumb a:nth-child(4) {
    padding-left: 50px;
    border-radius: 5px 0 0 5px; /*to match with the parent's radius*/
    border: 3px #D39745 solid;
}

/*hover/active styles*/
.breadcrumb a.active, .breadcrumb a:hover{
    background: #333;
    background: linear-gradient(#333, #000);
}
.breadcrumb a.active:after, .breadcrumb a:hover:after {
    background: #333;
    background: linear-gradient(135deg, #333, #000);
}

/*adding the arrows for the breadcrumbs using rotated pseudo elements*/
.breadcrumb a:after {
    content: '';
    position: absolute;
    top: 0; 
    right: -18px; /*half of square's length*/
    /*same dimension as the line-height of .breadcrumb a */
    width: 36px; 
    height: 36px;
    /*as you see the rotated square takes a larger height. which makes it tough to position it properly. So we are going to scale it down so that the diagonals become equal to the line-height of the link. We scale it to 70.7% because if square's: 
    length = 1; diagonal = (1^2 + 1^2)^0.5 = 1.414 (pythagoras theorem)
    if diagonal required = 1; length = 1/1.414 = 0.707*/
    transform: scale(0.707) rotate(45deg);
    /*we need to prevent the arrows from getting buried under the next link*/
    z-index: 1;
    /*background same as links but the gradient will be rotated to compensate with the transform applied*/
    background: #666;
    background: linear-gradient(135deg, #666, #333);
    /*stylish arrow design using box shadow*/
    box-shadow: 
        2px -2px 0 2px rgba(0, 0, 0, 0.4), 
        3px -3px 0 2px rgba(255, 255, 255, 0.1);
    /*
        5px - for rounded arrows and 
        50px - to prevent hover glitches on the border created using shadows*/
    border-radius: 0 5px 0 50px;

}
/*we dont need an arrow after the last link*/
.breadcrumb a:last-child:after {
    content: none;
}
/*we will use the :before element to show numbers*/
.breadcrumb a:before {
 
    /*some styles now*/
    border-radius: 100%;
    width: 20px;
    height: 20px;
    line-height: 20px;
    margin: 8px 0;
    position: absolute;
    top: 0;
    left: 30px;
    background: #000011;
    background: linear-gradient(#444, #222);
    font-weight: bold;
   
}


.flat a, .flat a:after {
    background: white;
    color: black;
    transition: all 0.5s;
}
.flat a:before {
    background: white;
    box-shadow: 0 0 0 1px #ccc;
}
.flat a:hover, .flat a.active, 
.flat a:hover:after, .flat a.active:after{
    background: #D39745;
}

.cap {
    text-transform: uppercase;
    text-justify: auto;
}

.fa{
    margin-right: 5px;
     margin-top: 2px;
}

</style>

            <div class="container">
             
<div class="row">
  
<br /><br />
<!-- another version - flat style with animated hover effect -->
    <div class="breadcrumb flat">
        <a href="#" class="cap" > <span class="fa fa-cart-plus fa-2x"> </span>Warenkorb</a>
        
        <a href="#" class="active cap"><span class="fa fa-pencil-square-o fa-2x"></span>Personlicher Angabe</a>
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
                                                <input type="text" class="form-control" value="<?=$usersDetail->country?>"  name="state">
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
           