
<div class="row">
    
         <?=$this->cell("Footerimage");?> 

 

    <div class="col-sm-5 col-md-5 col-lg-5">
<div class="card border-primary1 mb-3" >

  <div class="card-body">
    <h4 class="card-title">Newsletter</h4>
<style>
    .newsletter-signup{
    padding: 20px;
    }
</style>
      <?php echo $this->Form->create('Newsletter', array('class' => 'form', 'name'=>'email','url' => array('controller' => 'newsletter', 'action' => 'add'))); ?>

           <div class="form-group row">

     
          <div class="col-sm-8 col-md-8 col-lg-8 ">
          <input  class="form-control-plaintext" id="email" name="email" required="required" placeholder="email@example.com" type="email" >

          </div>      
          <div class="col-sm-3 col-md-3 col-lg-3 no-gutters newsletter-signup">
                   <button type="submit" class="btn btn-secondary btn-sm" >signup</button>
          </div>

    </div>
      <?= $this->Form->end() ?>
   
  </div>
</div>
    </div>
</div>
