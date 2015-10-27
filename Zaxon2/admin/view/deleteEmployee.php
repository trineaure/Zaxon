<main>
    <?php
    $employees = $GLOBALS["employees"];
    ?>

    <p> Her kan en slette en av frisørene i Zaxon .</p>


 
        <table id="submit" type="delete" value="delete">
            
            echo "<tr> <td> Fornavn </td> <td> Etternavn </td> <td> Fødselsdag </td> <td> Mobil </td>  <td>  Slett </td> </tr>";

            
         <?php foreach($employees as $employee) { ?>
         <tr>
                <td> <?php echo $employee["First_name"] ?> </td>
                <td> <?php echo $employee["Last_name"] ?> </td>
                <td> <?php echo $employee["Birth"] ?> </td>
                <td> <?php echo $employee["Phone_Number"] ?> </td>
                <td> <?php echo $employee["Home_Address"] ?> </td>
                <td> <?php echo $employee["Zip_Code"] ?> </td>
                <td> <form method="post" action="?page=deleteEmployeeNow">
                       
                        <input style="display:none;" value="<?php echo $employee["Phone_Number"];?>" name="phonenr">
                        <button value="submit"> Delete </button>
                      </form>
                </td>
          </tr>
         <?php   } ?>
            
            
        </table>



</main>

