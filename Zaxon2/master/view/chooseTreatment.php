
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
         // echo key($category);
        echo strtoupper($key);
          foreach($categorysWithTreatments[$key] as  $treatment){
           //foreach ($category as $treatment) {
      ?>
        <p> <?php echo $treatment['Treatment_Name'] ?>  <input type="radio" name="<?php echo $key ?>" value=" <?php $treatment['Treatment_Name'] ?>" /> </p>
           
       <?php }
      }?>
   

            <input id="submit" type="submit" name="submit" value="Submit"  required/>
    </form>

</main>


