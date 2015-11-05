<!--MASTER SIDE-->

<main>
    <?php
    $employee = $GLOBALS["employee"];

    $updateFirst_name = $employee['First_name'];
    $updateLast_name = $employee['Last_name'];
    $updateBirth = $employee['Birth'];
    $updatePhone_Number = $employee['Phone_Number'];
    $updateHome_Address = $employee['Home_Address'];
    $updateZip_Code = $employee['Zip_Code'];
    $EmployeeID = $employee['EmployeeID'];
    ?>

    <p> Her kan en oppdatere informasjon om de ansatte i Zaxon .</p> <br>  
    <div id="big">
    <form method="post" action="?page=updateEmployeeNow">
        Fornavn: <input type="text" class="smallInput"  name="First_name" value="<?php echo $updateFirst_name ?>"> <br />
        Etternavn: <input type="text" class="smallInput" name="Last_name" value="<?php echo $updateLast_name ?>"> <br />
        Fødselsdag: <input type="text" class="smallInput" name="Birth" value="<?php echo $updateBirth ?>"> <br />
        Mobilnr: <input type="text" class="smallInput" name="Phone_Number" value="<?php echo $updatePhone_Number ?>"> <br />
        Adresse: <input type="text" class="smallInput" name="Home_Address" value="<?php echo $updateHome_Address ?>"> <br />
        Postnr: <input type="text" class="smallInput" name="Zip_Code" value="<?php echo $updateZip_Code ?>"> <br />
        <input type="hidden" class="smallInput" name="EmployeeID" value="<?php echo $EmployeeID ?>"> <br />
        <button value="submit" class="smallSubmit"> Oppdater</button>
    </form> 
    </div>
</main>

