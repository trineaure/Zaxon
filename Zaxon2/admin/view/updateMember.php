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

    <p> Her kan en oppdatere informasjon om <?php echo $_SESSION["MemberFirstName"]; ?> </p> <br>

<div>
    <form method="post" action="?page=updateMemberAction">
        Fornavn: <input type="text" class="input-textarea" name="First_name" value="<?php echo $updateFirst_name ?>"> <br />
        Etternavn: <input type="text" class="input-textarea" name="Last_name" value="<?php echo $updateLast_name ?>"> <br />
        Fødselsdag: <input type="text" class="input-textarea" name="Birth" value=" <?php echo $updateBirth ?>"> <br />
        Mobilnr: <input type="text" class="input-textarea" name="Phone_Number" value="<?php echo $updatePhone_Number ?>"> <br />
        <input type="hidden" class="input-textarea" name="Membership_number" value="<?php echo $Membership_number ?>"> <br />
        <button value="submit" id="submit"> Oppdater </button>

    </form> 
    </div>
</main>

