<!--ADMIN SIDE-->
<main>
    <?php
    $member = $GLOBALS["member"];


    $updateFirst_name = $member['First_name'];
    $updateLast_name = $member['Last_name'];
    $updateBirth = $member['Birth'];
    $updatePhone_Number = $member['Phone_Number'];
    $updateLogin_Password = $member['Login_Password'];
    $Membership_number = $member['Membership_number'];
    ?>

    <p> Her kan en oppdatere informasjon om medlemene i Zaxon .</p> <br>


    <form method="post" action="?page=updateMemberNow">
        Fornavn: <input type="text" name="First_name" value="<?php echo $updateFirst_name ?>"> <br />
        Etternavn: <input type="text" name="Last_name" value="<?php echo $updateLast_name ?>"> <br />
        Fødselsdag: <input type="text" name="Birth" value=" <?php echo $updateBirth ?>"> <br />
        Mobilnr: <input type="text" name="Phone_Number" value="<?php echo $updatePhone_Number ?>"> <br />
        <input type="hidden" name="Membership_number" value="<?php echo $Membership_number ?>"> <br />
        <button value="submit"> Update</button>

    </form> 
</main>

