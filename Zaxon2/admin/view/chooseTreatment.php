
<main>
    
    <?php 
    $categorysWithTreatments = $GLOBALS["categorysWithTreatments"];?>
    
<!--    //Displays a drop-down menu for treatment selection-->
    <form action="?page=reservationDateAndEmployee" method="post">
        
      <?php  $keys = array_keys($categorysWithTreatments);
      foreach($keys as $key){
        ?> <p id="button-holder"> <?php
          
        echo strtoupper($key);
          foreach($categorysWithTreatments[$key] as  $treatment){
      ?>
              
                <label for="<?php $treatment["Treatment_Name"] ?>">
                    <input type="radio" class="regular-radio" name="<?php echo $key ?>" value="<?php echo $treatment["Treatment_Name"] ?>"  />
                     <?php echo $treatment["Treatment_Name"] ?>  
                </label> 
       <?php } ?>
            <label for="Ingen">
                <input type="radio" name="<?php echo $key ?>" value="" class="regular-radio" checked/>  Ingen
            </label>  
       
         <?php  }?>
        
        </p>
        <div class="backandforth">
        <input class="tinySubmit" type="submit" name="submit" value="Neste" />
        <a href="?page=memberOrder" class="tinyButton">Tilbake</a>
          </form> </div>

</main>


