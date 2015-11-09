<main>
    <?php
    if(isset($GLOBALS["member"])) {
    $member = $GLOBALS["member"];
    }
    if(isset($member['Membership_number'])) {
    $Membership_number = $member['Membership_number'];
    }
    ?>

    <p> <?php echo $_SESSION["MemberFirstName"]; ?>
    : Her kan du endre informasjon om deg selv.</p> <br>

<div>
  <form method="post" action="?page=updateInformationNow">
        Fornavn: <input type="text" class="input-textarea" name="First_name" value="<?php echo  $_SESSION["MemberFirstName"] ?>"> <br />
        Etternavn: <input type="text" class="input-textarea" name="Last_name" value="<?php echo $_SESSION["MemberLastName"] ?>"> <br />
        Fødselsdag: <input type="text" class="input-textarea" name="Birth" value=" <?php echo $_SESSION["MemberBirth"] ?>"> <br />
        Mobilnr: <input type="text" class="input-textarea" name="Phone_Number" value="<?php echo $_SESSION["MemberPhone"] ?>"> <br />
        <input type="hidden" class="input-textarea" name="Membership_number" value="<?php echo $Membership_number ?>"> <br />
        <button value="submit" id="submit"> Oppdater </button>

    </form> 
    </div>
</main>

