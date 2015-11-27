<!--ADMIN SIDE-->
<main>
    <?php
    if (isset($GLOBALS["employee"])) {
        $employee = $GLOBALS["employee"];
    } ?>

    <p> Din informasjon:</p> 
    <div>
        <table>

            <tr> 
                <td> Fornavn </td> <td> Etternavn </td> 
                <td> Fødselsdag </td> <td> Mobil </td>
                <td> Adresse </td> <td> Postnr </td>
            </tr>
            <tr>
                <td> <?php echo $employee["First_name"] ?> </td>
                <td> <?php echo $employee["Last_name"] ?> </td>
                <td> <?php echo $employee["Birth"] ?> </td>
                <td> <?php echo $employee["Phone_Number"] ?> </td>
                <td> <?php echo $employee["Home_Address"] ?> </td>
                <td> <?php echo $employee["Zip_Code"] ?> </td>
            </tr>
        </table>
    </div>
    <div  id="big">
        <a href="?page=home" class="button">Tilbake</a>
    </div>

</main>
