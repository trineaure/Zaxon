<!--ADMIN SIDE-->
<main>
    <?php
    if (isset($GLOBALS["employee"])) {
        $employee = $GLOBALS["employee"];
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
        <form onSubmit="return validate()"  method="post" action="?page=addUpdateAdmin">
            Fornavn: <input type="text" class="input-textarea" name="First_name" value="<?php echo $employee['First_name']; ?>"> 
            Etternavn: <input type="text" class="input-textarea" name="Last_name" value="<?php echo $employee['Last_name']; ?>">
            Fødselsdag: <input type="text" class="input-textarea" name="Birth" value=" <?php echo $employee['Birth']; ?>"> 
            Mobilnr: <input type="number" class="input-textarea" name="Phone_Number" value="<?php echo $employee['Phone_Number']; ?>"> 
            Adresse: <input type="text" class="input-textarea" name="Home_Address" value="<?php echo $employee['Home_Address']; ?>"> 
            postnr: <input type="number" class="input-textarea" name="Zip_Code" value="<?php echo $employee['Zip_Code']; ?>"> 
            <input type="hidden" class="ipnut-textarea" name="EmployeeID" value="<?php echo $_SESSION["workerID"]; ?>"> 
            Gammelt Passord: <input type="password"  id="password_check" class="input-textarea" minlength="6" name="givenOldLogin_Password"> 
            Oppdater Passord: <input type ="password"id="Login_Password" class="input-textarea" minlength="6" name="givenNewLogin_Password"> 
            Gjenta Passord: <input type ="password" id="confirm_password" class="input-textarea" minlength="6" name="confirmLogin_Password"> 
            <div class="backandforth">
                <input class="tinySubmit" type="submit" name="submit" value="Oppdater" />
                <a href="?page=home" class="tinyButton">Tilbake</a>
            </div>

        </form> 
    </div>
</main>
