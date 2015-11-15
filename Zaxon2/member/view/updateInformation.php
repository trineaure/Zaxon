<main>
    <?php
    if (isset($GLOBALS["member"])) {
        $member = $GLOBALS["member"];
    }
    ?>

    <p> Her kan du oppdatere informasjon om deg selv.</p> <br>

    <div>
        <form method="post" action="?page=addUpdate">
            Fornavn: <input type="text" class="input-textarea" name="First_name" value="<?php echo $member['First_name']; ?>"> <br />
            Etternavn: <input type="text" class="input-textarea" name="Last_name" value="<?php echo $member['Last_name']; ?>"> <br />
            Fødselsdag: <input type="text" class="input-textarea" name="Birth" value=" <?php echo $member['Birth']; ?>"> <br />
            Mobilnr: <input type="number" class="input-textarea" name="Phone_Number" value="<?php echo $member['Phone_Number']; ?>"> <br />
                <input type="hidden" class="ipnut-textarea" name="Membership_number" value="<?php echo $_SESSION["MembershipNumber"] ?>"> <br />
            <div class="backandforth">
        <input class="tinySubmit" type="submit" name="submit" value="Oppdater" />
        <a href="?page=home" class="tinyButton">Tilbake</a>
            </form> </div>
            
        </form> 
    </div>
</main>

