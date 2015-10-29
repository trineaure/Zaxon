
<main>
    
    <?php 
    //$allTreatments = $GLOBALS["allTreatments"];
    //$allCategorys = $GLOBALS("allCategorys");
    $categorysWithTreatments = $GLOBALS["categorysWithTreatments"];?>
    
<!--    //Displays a drop-down menu for treatment selection-->

    <form name="" method="post" action=""> 
        
      <?php  $keys = array_keys($categorysWithTreatments);
      foreach($keys as $key){
      //foreach ($categorysWithTreatments as &catKey => $category) {
         // echo key($category)
        ?> <p id="button-holder"> <?php
          
        echo strtoupper($key);
          foreach($categorysWithTreatments[$key] as  $treatment){
           //foreach ($category as $treatment) {
      ?>

                <label for="<?php $treatment['Treatment_Name'] ?>">
                    <input type="radio" class="regular-radio" name="<?php echo $key ?>" value=" <?php $treatment['Treatment_Name'] ?>" id=" <?php $treatment['Treatment_Name'] ?>" />
                     <?php echo $treatment['Treatment_Name'] ?>  
                </label> 

       <?php }
      }?> </p>
            <input id="submit" type="submit" name="submit" value="Submit"  required/>
       
    </form>

</main>


