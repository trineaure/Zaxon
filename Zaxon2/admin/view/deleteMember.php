<main>
    <?php
    $members = $GLOBALS["members"];
    ?>

    <p> Her kan en slette medlemene i Zaxon .</p>


 
        <table id="submit" type="delete" value="delete">
            
            echo "<tr> <td> Fornavn </td> <td> Etternavn </td> <td> Fødselsdag </td> <td> Mobil </td>  <td>  Slett </td> </tr>";

            
         <?php foreach($members as $member) { ?>
         <tr>
                <td> <?php echo $member["First_name"] ?> </td>
                <td> <?php echo $member["Last_name"] ?> </td>
                <td> <?php echo $member["Birth"] ?> </td>
                <td> <?php echo $member["Phone_Number"] ?> </td>
                <td> <form method="post" action="?page=deleteMemberNow">
                       
                        <input style="display:none;" value="<?php echo $member["Membership_number"];?>" name="membershipnr">
                        <button value="submit"> Delete </button>
                      </form>
                </td>
          </tr>
         <?php   } ?>
                        
        </table>

</main>

