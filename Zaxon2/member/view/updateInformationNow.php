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

        <?php //echo "<tr> <td> Fornavn </td> <td> Etternavn </td> <td> Fødselsdag </td> <td> Mobil </td> <td> Rediger </td>  <td>  Slett </td> </tr>";
        ?>
        <tr>
            <td> <?php echo $up["First_name"] ?> </td>
            <td> <?php echo $up["Last_name"] ?> </td>
            <td> <?php echo $up["Birth"] ?> </td>
            <td> <?php echo $up["Phone_Number"] ?> </td>
            <td>
                <form method="post" action="?page=updateInformation">
                    Fornavn: <input type="text" class="input-textarea" name="First_name" value="<?php echo $_SESSION["MemberFirstName"] ?>"> <br />
                    Etternavn: <input type="text" class="input-textarea" name="Last_name" value="<?php echo $_SESSION["MemberLastName"] ?>"> <br />
                    Fødselsdag: <input type="text" class="input-textarea" name="Birth" value=" <?php echo $_SESSION["MemberBirth"] ?>"> <br />
                    Mobilnr: <input type="text" class="input-textarea" name="Phone_Number" value="<?php echo $_SESSION["MemberPhone"] ?>"> <br />
                    <input type="hidden" class="input-textarea" name="Membership_number" value="<?php echo $Membership_number ?>"> <br />
                    <button value="submit"> Endre </button>
                </form>
            </td>                  
        </tr>
    </table>

</main>
