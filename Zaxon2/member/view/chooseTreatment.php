
<main>
    
    <?php 
    //$allTreatments = $GLOBALS["allTreatments"];
    //$allCategorys = $GLOBALS("allCategorys");
    $categorysWithTreatments = $GLOBALS["categorysWithTreatments"];?>
    
<!--    //Displays a drop-down menu for treatment selection-->

    <form action="?page=reservationDateAndEmployee" method="post">
        
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
                    <input type="radio" class="regular-radio" name="treatment" value=" <?php echo $treatment['Treatment_Name'] ?>"  />
                     <?php echo $treatment['Treatment_Name'] ?>  
                </label> 

       <?php }
      }?> </p>
            <input id="submit" type="submit" name="submit" value="Neste"  required/>
       
    </form>

<script type="text/javascript">
        var allRadios = document.getElementsByName('treatment'); // endre på når vi kan velge flere treatments
        var booRadio;
        var x = 0;
        for(x = 0; x < allRadios.length; x++){

            allRadios[x].onclick = function() {
                if(booRadio == this){
                    this.checked = false;
                    booRadio = null;
                }else{
                    booRadio = this;
                }
            };
        }
    </script>

</main>


