<!--MEMBER SIDE-->
<main>
    
    <br> <p>
        Vi er stolte av å kunne levere gode tjenester og produkter til overkommelige priser.</p>
       <p> De oppførte prisene er minstepriser og kan variere med behandlingstiden og teknikken som blir brukt. Spør derfor gjerne frisøren om prisen på forhånd.
    </p>
    
    <?php
    $catsWithTreatments = $GLOBALS["catsWithTreatments"];
   
        $keys = array_keys($catsWithTreatments);
        foreach($keys as $key) {  ?> 
            <table> 
                <tr>
                    <td><?php echo strtoupper($key) ?></td>
                </tr>
                <tr> 
                    <td>Behandling:</td> 
                    <td>Pris:</td>
                </tr>
                <?php foreach ($catsWithTreatments[$key] as $treatment) { ?>

                    <tr>                       
                        <td><?php echo $treatment["Treatment_Name"] ?></td>
                        <td><?php echo "Fra " . $treatment["Price"] . ",-"?></td>
                    </tr>
                <!--</div>-->
                <?php } ?> 
            </table>
 <?php } ?> 
  
       
    
</main>