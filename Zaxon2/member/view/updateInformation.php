<main>
    <?php
    if (isset($GLOBALS["member"])) {
        $member = $GLOBALS["member"];
    }
    ?>

    <p> <?php echo $_SESSION["MemberFirstName"]; ?>
        : Her kan du endre informasjon om deg selv.</p> <br>

    <div>
        <form method="post" action="?page=updateInformationNow">
            Fornavn: <input type="text" class="input-textarea" name="First_name" value="<?php echo $member['First_name']; ?>"> <br />
            Etternavn: <input type="text" class="input-textarea" name="Last_name" value="<?php echo $member['Last_name']; ?>"> <br />
            Fødselsdag: <input type="text" class="input-textarea" name="Birth" value=" <?php echo $member['Birth']; ?>"> <br />
            Mobilnr: <input type="text" class="input-textarea" name="Phone_Number" value="<?php echo $member['Phone_Number']; ?>"> <br />
                <input type="hidden" class="ipnut-textarea" name="Membership_number" value="<?php echo $_SESSION["MembershipNumber"] ?>"> <br />
            <button value="submit" id="submit"> Oppdater </button>

        </form> 
    </div>
</main>

