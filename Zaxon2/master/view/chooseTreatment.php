
<main>
     <form onSubmit="return validate()" action="#" method="post">
         <?php 
        $allTreatments = $GLOBAL["allTreatments"];
         
        foreach ($allTreatments as $treatment) {
            
        }
         ?>
       Standard tilgang<input type="radio" name="Extended_Access" value="0" checked/> 
       Utvidet tilgang<input type="radio" name="Extended_Access" value="1"/>
     </form>
</main>

