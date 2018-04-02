
<style>

</style>

<div class="row">
    <div class="col-sm-7 col-md-7 col-lg-7">
        <a href="/angeboten"><img src="/img/saleNicePrice.jpg" class="responsive" > </a>
    </div>

    <div class="col-sm-5 col-md-5 col-lg-5">
<div class="card border-primary1 mb-3" style="max-width: 22rem;">

  <div class="card-body">
    <h4 class="card-title">Newsletter</h4>
<style>
    .newsletter-signup{
    padding: 20px;
    }
</style>
      <?php echo $this->Form->create('Newsletter', array('class' => 'form', 'name'=>'email','url' => array('controller' => 'newsletter', 'action' => 'add'))); ?>

           <div class="form-group row">

     
          <div class="col-sm-8 col-md-8 col-lg-8 no-margin">
                      <input  class="form-control-plaintext" id="email" name="email" required="required" placeholder="email@example.com" type="email" >

          </div>      
          <div class="col-sm-4 col-md-4 col-lg-4 no-gutters newsletter-signup">
                   <button type="submit" class="btn btn-secondary btn-sm" >signup</button>
          </div>

    </div>
      <?= $this->Form->end() ?>
   
  </div>
</div>
    </div>
</div>
