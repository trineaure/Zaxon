<!--MASTER SIDE-->
<main>
    <?php
    $pricelist = $GLOBALS["pricelist"];
    ?>
<!--    <p>Vi er stolte av å kunne levere gode tjenester og produkter til overkommelige priser.
        Prislisten viser frapriser.

        De oppførte prisene er minstepriser og kan variere med behandlingstiden og teknikken som blir brukt. Spør derfor gjerne frisøren om prisen på forhånd.
    </p>-->
    <table id="submit" type="submit" value="submit">
        <?php echo "<tr> <td> Pris </td> <td> Behandling </td> <td> Kategori </td> <td> Endre pris </td> </tr>";
            foreach ($pricelist as $price) { ?>
            <tr>
                <td> <?php echo $price["Price"] ?> </td>
                <td> <?php echo $price["Treatment_Name"] ?> </td>
                <td> <?php echo $price["Category_Name"] ?> </td>
                <td>
                    <form method="post" action="?page=updatePricelist">
                        <input type="hidden" value="<?php echo $price["Price"]; ?>" name="Price">
                        <input type="hidden" value="<?php echo $price["Treatment_Name"]; ?>" name="Treatment_Name">
                        <input type="hidden" value="<?php echo $price["Category_Name"]; ?>" name="Category_Name">                  
                    <button value="submit"> Endre </button>
                    </form>
                </td>  
            </tr>
 
        <?php } ?>
    </table>
    <div  id="big">
    <a href="?page=home" class="button">Tilbake</a>
    </div>  

</main>
