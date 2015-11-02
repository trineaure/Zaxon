<!--ADMIN SIDE-->
<main>
    <?php
    if (isset($_REQUEST['First_name'])) {
        $updateFirst_name = $_REQUEST['First_name'];
    } if (isset($_REQUEST['Last_name'])) {
        $updateLast_name = $_REQUEST['Last_name'];
    } if (isset($_REQUEST['Birth'])) {
        $updateBirth = $_REQUEST['Birth'];
    } if (isset($_REQUEST['Phone_Number'])) {
        $updatePhone_Number = $_REQUEST['Phone_Number'];
    }if (isset($_REQUEST['Login_Password'])) {
        $updateLogin_Password = $_REQUEST['Login_Password'];
    } if (isset($_REQUEST['Membership_Number'])) {
        $Membership_Number = $_REQUEST['Membership_Number'];
    }
    ?>

    <p> Her kan en oppdatere informasjon om medlemene i Zaxon .</p> <br>


    <form method="post" action="?page=deleteMember">
        Fornavn: <input type="text" name="First_name" placeholder="<?php echo $updateFirst_name ?>"> <br />
        Etternavn: <input type="text" name="Last_name" placeholder="<?php echo $updateLast_name ?>"> <br />
        Fødselsdag: <input type="number" name="Birth" placeholder=" <?php echo $updateBirth ?>"> <br />
        Mobilnr: <input type="number" name="Phone_Number" placeholder="<?php echo $updatePhone_Number ?>"> <br />
        <input type="hidden" name="Membership_Number" value="<?php echo $Membership_Number ?>"> <br />
        <button value="submit"> Update</button>

    </form> 
</main>

