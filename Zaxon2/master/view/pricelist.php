<!--MASTER SIDE-->
<main>
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
                        <td>Endre pris:</td>
                </tr>
                <?php foreach ($catsWithTreatments[$key] as $treatment) { ?>

                    <tr>                       
                        <td><?php echo $treatment["Treatment_Name"] ?></td>
                        <td><?php echo "Fra " . $treatment["Price"] . ",-"?></td>
                        <td>
                            <form method="post" action="?page=updatePricelist">
                                <input type="hidden" value="<?php echo $treatment["Price"]; ?>" name="Price">
                                <button value="submit"> Endre </button>
                            </form>
                        </td>
                    </tr>
                <?php } ?> 
            </table>
 <?php } ?> 
  
       
    
</main>