<!--MASTER SIDE-->
<main>
    <?php
    $employees = $GLOBALS["included_employees"];
    ?>
    <script>
//alert on delete
    function ConfirmDelete()
    {
      var x = confirm("Er du sikker på at du vil slette?");
      if (x)
          return true;
      else
        return false;
    }
    </script>

    <table id="submit" type="delete" value="delete">
         <tr> <td>Fornavn</td> <td>Etternavn</td> <td>Fødselsdag</td> <td>Tlf.</td> <td>Adresse</td> <td>Postkode</td> <td>Rediger</td> <td>Slett</td> </tr>
            <?php foreach ($employees as $employee) { ?>
             <tr>
                <td> <?php echo $employee["First_name"] ?> </td>
                <td> <?php echo $employee["Last_name"] ?> </td>
                <td> <?php echo $employee["Birth"] ?> </td>
                <td> <?php echo $employee["Phone_Number"] ?> </td>
                <td> <?php echo $employee["Home_Address"] ?> </td>
                <td> <?php echo $employee["Zip_Code"] ?> </td>
                <td>
                    <form method="post" action="?page=updateEmployee">
                        <input type="hidden" value="<?php echo $employee["EmployeeID"]; ?>" name="EmployeeID">
                        <input type="hidden" value="<?php echo $employee["First_name"]; ?>" name="First_name">
                        <input type="hidden" value="<?php echo $employee["Last_name"]; ?>" name="Last_name">
                        <input type="hidden" value="<?php echo $employee["Birth"]; ?>" name="Birth">
                        <input type="hidden" value="<?php echo $employee["Phone_Number"]; ?>" name="Phone_Number">
                        <input type="hidden" value="<?php echo $employee["Home_Address"]; ?>" name="Home_Address">
                        <input type="hidden" value="<?php echo $employee["Zip_Code"]; ?>" name="Zip_Code">
                        <button value="submit"> Endre </button>
                    </form>
                </td>  
                <td>
                    <form method="post" action="?page=deleteEmployeeNow">
                        <!--Delete the employee by the unique employeeID-->
                        <input style="display:none;" value="<?php echo $employee["EmployeeID"]; ?>" name="employeeID">
                        <button Onclick="return ConfirmDelete();"  type="submit" value="1"> Slett </button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
    
                <a href="?page=home" class="bigButton">Tilbake</a>
              
</main>
