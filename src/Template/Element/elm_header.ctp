<style>
    .no-gutters {
  margin-right: 0;
  margin-left: 0;


}
</style>
<ul class="nav justify-content-end ">
 <li class="nav-item active no-gutters">
        <a class="nav-link" href="/">HOME <span class="sr-only">(current)</span></a>
      </li>
    
       <?php $u=$this->request->session()->read('Auth.User.id');
                                if ($u==!null) {
                                    echo '<li class="nav-item no-gutters"><a class="nav-link" href="/meineseite">MEIN KONTO</a></li>';
                                    echo '<li class="nav-item no-gutters"><a class="nav-link" href="/users/logout">LOGOUT</a></li>';
                                } else {
                                    
                               echo '<li class="nav-item no-gutters"><a class="nav-link" href="/anmelden">ANMELDEN</a></li>';
                                }
                                ?>
      <li class="nav-item no-gutters">
        <a class="nav-link" href="/faq">FAQ</a>
      </li>
      <li class="nav-item no-gutters">
        <a class="nav-link" href="/kontakt">KONTAKT</a>
      </li>
       <li class="nav-item no-gutters">
        <a class="nav-link" href="/transactions/view">WARENKORB</a>
             <?php if (!null == $this->request->session()->read('count')) {
                                        $c = $this->request->session()->read('count');
                                    } else {
                                        $c = 0;
                                    }
                                    ?>
      </li>
       <li> <a href="/transactions/view"><span class="badge badge-pill badge-primary" id="cart-counter"><?php echo $c; ?></span> 
      <img class="svg" id="u406" src="images/svg-67244x59.svg?crc=334609378" width="23" height="20" alt="" /> 
                              
</a> 
       </li>
 
</ul>


    
   
       
 

 
