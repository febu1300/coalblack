
<div class="form-group">
  
      <select name="usersList" class="custom-select" id="usersList">
                   <option value='NULL'selected="">Wählen Sie einer Kundename</option>
       <?php foreach ($userlist as $users):?>
               
         
          <option value="<?=$users->id?>"><?= $users->fname.' '.$users->lname ?></option>
      
        <?php endforeach;?>
      </select>
    </div>


   