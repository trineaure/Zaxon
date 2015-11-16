<!--ADMIN SIDE-->
<main>
    <?php
    if (isset($GLOBALS["employee"])) {
        $employee = $GLOBALS["employee"];
    }  ?>

    
    <p> Her kan du oppdatere informasjon om deg selv.</p> <br>

    <div>
        <form method="post" action="?page=addUpdateAdmin">
            Fornavn: <input type="text" class="input-textarea" name="First_name" value="<?php echo $employee['First_name']; ?>"> <br />
            Etternavn: <input type="text" class="input-textarea" name="Last_name" value="<?php echo $employee['Last_name']; ?>"> <br />
            Fødselsdag: <input type="text" class="input-textarea" name="Birth" value=" <?php echo $employee['Birth']; ?>"> <br />
            Mobilnr: <input type="number" class="input-textarea" name="Phone_Number" value="<?php echo $employee['Phone_Number']; ?>"> <br />
            Adresse: <input type="text" class="input-textarea" name="Home_Address" value="<?php echo $employee['Home_Address']; ?>"> <br />
            postnr: <input type="number" class="input-textarea" name="Zip_Code" value="<?php echo $employee['Zip_Code']; ?>"> <br />
            <input type="hidden" class="ipnut-textarea" name="EmployeeID" value="<?php echo $_SESSION["workerID"]; ?>"> <br />
            <div class="backandforth">
                <input class="tinySubmit" type="submit" name="submit" value="Oppdater" />
                <a href="?page=home" class="tinyButton">Tilbake</a>
            </div>

        </form> 
    </div>
</main>
