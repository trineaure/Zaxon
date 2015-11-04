<!--MASTER SIDE-->
<main>
    <?php
    $employees = $GLOBALS["employees"];
    ?>

    <script>
//alert on delete
        function confirm_alert(node) {
            return confirm("You are about to permanently delete a product. Click OK to continue or CANCEL to quit.");
        }
    </script>

    <p> Her kan en slette en ansatt i Zaxon, eller velge å redigere dem.</p>

    <table id="submit" type="delete" value="delete">

        <?php echo "<tr> <td> Fornavn </td> <td> Etternavn </td> <td> Fødselsdag </td> <td> Mobil </td> <td> Adresse </td> <td> Postkode </td> <td> Rediger </td>  <td>  Slett </td> </tr>";
        ?>

        <?php foreach ($employees as $employee) { ?>

            <!--<form onSubmit="return confirm_alert(this)" action="?page=deleteEmployee" method="post">-->    
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
                        <button value="submit"> Slett </button>
                    </form>
                </td>
            </tr>
            <!--</form>-->
        <?php } ?>
    </table>
</main>
