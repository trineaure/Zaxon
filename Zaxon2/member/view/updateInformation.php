<!--MEMBER SIDE-->
<main>
    <?php
    if (isset($GLOBALS["member"])) {
        $member = $GLOBALS["member"];
    }
    ?>

    <script>
        //Ser om login_password stemmer overens med confirm_password

        function validate()
        {
            var a = document.getElementById("Login_Password").value;
            var b = document.getElementById("confirm_password").value;
            if (a !== b) {
                alert("Passordet er ikke likt");

                return false;
            }
        }
    </script>

    <p> Her kan du oppdatere informasjon om deg selv.</p> <br>

    <div>
        <form onSubmit="return validate()" method="post" action="?page=addUpdate">
            Fornavn: <input type="text" class="input-textarea" name="First_name" value="<?php echo $member['First_name']; ?>"> 
            Etternavn: <input type="text" class="input-textarea" name="Last_name" value="<?php echo $member['Last_name']; ?>"> 
            Fødselsdag: <input type="text" class="input-textarea" name="Birth" value=" <?php echo $member['Birth']; ?>"> 
            Mobilnr: <input type="number" class="input-textarea" name="Phone_Number" value="<?php echo $member['Phone_Number']; ?>"> 
            <input type="hidden" class="ipnut-textarea" name="Membership_number" value="<?php echo $_SESSION["MembershipNumber"] ?>"> 
            Gammelt Passord: <input type="password"  id="password_check" class="input-textarea" minlength="6" name="givenOldLogin_Password"> 
            Oppdater Passord: <input type ="password"id="Login_Password" class="input-textarea" minlength="6" name="givenNewLogin_Password"> 
            Gjenta Passord: <input type ="password" id="confirm_password" minlength="6" name="confirmLogin_Password" class="input-textarea"> 
            <input class="tinySubmit" type="submit" name="submit" value="Oppdater" >
            <a href="?page=home" class="tinyButton">Tilbake</a>
        </form> 
    </div>

</main>

