<!--MEMBER SIDE-->
<main>
    <?php
    $pricelist = $GLOBALS["pricelist"];
    ?>
    <br>
    <p>Vi er stolte av å kunne levere gode tjenester og produkter til overkommelige priser.
        Prislisten viser frapriser.

        De oppførte prisene er minstepriser og kan variere med behandlingstiden og teknikken som blir brukt. Spør derfor gjerne frisøren om prisen på forhånd.
    </p>


    <table>
        <?php echo "<tr> <td> Pris </td> <td> Behandling </td> <td> Kategori </td> </tr>";
        ?>

        <?php foreach ($pricelist as $price) { ?>

            <tr>
                <td> <?php echo $price["Price"] ?> </td>
                <td> <?php echo $price["Treatment_Name"] ?> </td>
                <td> <?php echo $price["Category_Name"] ?> </td>
 
        </tr>

        <?php } ?>
    </table>

</main>