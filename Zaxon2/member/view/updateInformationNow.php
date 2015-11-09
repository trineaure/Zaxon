<!--MASTER SIDE-->
<main>
    <?php
    $update = $GLOBALS["update"];

    if (isset($_REQUEST['First_name'])) {
        $updateFirst_name = $_REQUEST['First_name'];
    } if (isset($_REQUEST['Last_name'])) {
        $updateLast_name = $_REQUEST['Last_name'];
    } if (isset($_REQUEST['Birth'])) {
        $updateBirth = $_REQUEST['Birth'];
    } if (isset($_REQUEST['Phone_Number'])) {
        $updatePhone_Number = $_REQUEST['Phone_Number'];
    } if (isset($_REQUEST['Membership_Number'])) {
        $Membership_Number = $_REQUEST['Membership_Number'];
    }
    ?>

    <p> Her kan en Oppdatere medlemene i Zaxon, eller velge å redigere dem.</p>


    <table id="submit" type="delete" value="delete">

        <?php echo "<tr> <td> Fornavn </td> <td> Etternavn </td> <td> Fødselsdag </td> <td> Mobil </td> <td> Rediger </td>  <td>  Slett </td> </tr>";
        ?>
        <tr>
            <td> <?php echo $up["First_name"] ?> </td>
            <td> <?php echo $up["Last_name"] ?> </td>
            <td> <?php echo $up["Birth"] ?> </td>
            <td> <?php echo $up["Phone_Number"] ?> </td>
            <td>
                <form method="post" action="?page=updateInformation">
                    <input type="hidden" value="<?php echo $up["Membership_number"]; ?>" name="Membership_number">
                    <input type="hidden" value="<?php echo $up["First_name"]; ?>" name="First_name">
                    <input type="hidden" value="<?php echo $up["Last_name"]; ?>" name="Last_name">
                    <input type="hidden" value="<?php echo $up["Birth"]; ?>" name="Birth">
                    <input type="hidden" value="<?php echo $up["Phone_Number"]; ?>" name="Phone_Number">
                    <button value="submit"> Endre </button>
                </form>
            </td>                  
        </tr>
    </table>

</main>
