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
<div>
    <form method="post" action="?page=updateEmployeeNow">
        Fornavn: <input type="text" class="input-textarea"  name="First_name" value="<?php echo $updateFirst_name ?>"> <br />
        Etternavn: <input type="text" class="input-textarea" name="Last_name" value="<?php echo $updateLast_name ?>"> <br />
        Fødselsdag: <input type="text" class="input-textarea" name="Birth" value="<?php echo $updateBirth ?>"> <br />
        Mobilnr: <input type="text" class="input-textarea" name="Phone_Number" value="<?php echo $updatePhone_Number ?>"> <br />
        Adresse: <input type="text" class="input-textarea" name="Home_Address" value="<?php echo $updateHome_Address ?>"> <br />
        Postnr: <input type="text" class="input-textarea" name="Zip_Code" value="<?php echo $updateZip_Code ?>"> <br />
        <input type="hidden" class="input-textarea" name="EmployeeID" value="<?php echo $EmployeeID ?>"> <br />
        <button value="submit" id="submit"> Oppdater</button>
    </form> 
    </div>
</main>

