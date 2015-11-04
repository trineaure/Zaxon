<!--MASTER SIDE-->
<main>
    <?php
    $update2 = $GLOBALS["update2"];

    if (isset($_REQUEST['First_name'])) {
        $updateFirst_name = $_REQUEST['First_name'];
    } if (isset($_REQUEST['Last_name'])) {
        $updateLast_name = $_REQUEST['Last_name'];
    } if (isset($_REQUEST['Birth'])) {
        $updateBirth = $_REQUEST['Birth'];
    } if (isset($_REQUEST['Phone_Number'])) {
        $updatePhone_Number = $_REQUEST['Phone_Number'];
    } if (isset($_REQUEST['Home_Address'])) {
        $updateHome_Address = $_REQUEST['Home_Address'];
    } if (isset($_REQUEST['Zip_Code'])) {
        $updateZip_Code = $_REQUEST['Zip_Code'];
    }  if (isset($_REQUEST['EmployeeID'])) {
        $EmployeeID = $_REQUEST['EmployeeID'];
    }
    ?>

    <p> Her kan en Oppdatere informasjon om ansatte i Zaxon, eller velge å redigere dem.</p>


    <table id="submit" type="delete" value="delete">

        <?php echo "<tr> <td> Fornavn </td> <td> Etternavn </td> <td> Fødselsdag </td> <td> Mobil </td> <td> Adresse </td> <td> Postkode </td> <td> Rediger </td>  <td>  Slett </td> </tr>";
        ?>
        <tr>
            <td> <?php echo $up["First_name"] ?> </td>
            <td> <?php echo $up["Last_name"] ?> </td>
            <td> <?php echo $up["Birth"] ?> </td>
            <td> <?php echo $up["Phone_Number"] ?> </td>
            <td> <?php echo $up["Home_Address"] ?> </td>
            <td> <?php echo $up["Zip_Code"] ?> </td>
            <td>
                <form method="post" action="?page=updateEmployee">
                    <input type="hidden" value="<?php echo $up["EmployeeID"]; ?>" name="EmployeeID">
                    <input type="hidden" value="<?php echo $up["First_name"]; ?>" name="First_name">
                    <input type="hidden" value="<?php echo $up["Last_name"]; ?>" name="Last_name">
                    <input type="hidden" value="<?php echo $up["Birth"]; ?>" name="Birth">
                    <input type="hidden" value="<?php echo $up["Phone_Number"]; ?>" name="Phone_Number">
                    <input type="hidden" value="<?php echo $up["Home_Address"]; ?>" name="Home_Address">
                    <button value="submit"> Endre </button>
                </form>
            </td>  
            <td>
                <form method="post" action="?page=deleteEmployeeNow">
                    <input style="display:none;" value="<?php echo $up["EmployeeID"]; ?>" name="EmployeeID">
                    <button value="submit"> Slett </button>
                </form>
            </td>
        </tr>
    </table>
</main>

