<!--MASTER SIDE-->
<main>
    <?php
    $members = $GLOBALS["members"];
    $searchResults = $GLOBALS["searchResults"];
    ?>

    <p> Her kan en slette medlemene i Zaxon .</p>



    <table id="submit" type="delete" value="delete">
       <?php
        if (!empty($searchResults)) {
            
            
            
            echo "<table>\n";
            echo "<tr><td> Medlemsnr </td> <td> Fornavn </td> <td> Etternavn </td> <td> Fødselsdag </td>  <td> Mobil nummer </td> </tr>";

            foreach ($searchResults as $r) {

                Echo "<tr>"
                . "<td>" . $r["Membership_number"] . "</td>"
                . "<td>" . $r["First_name"] . "</td>"
                . "<td>" . $r["Last_name"] . "</td>"
                . "<td>" . $r["Birth"] . "</td>"
                . "<td>" . $r["Phone_Number"] . "</td>"
                . "</tr>";
            }

            echo "</table>\n";
            
            
            
        } 
        else
        {
            echo "<tr> <td> Fornavn </td> <td> Etternavn </td> <td> Fødselsdag </td> <td> Mobil </td>  <td>  Bestill </td> </tr>";
        ?>

        <?php foreach ($members as $member) { ?>
            <tr>
                <td> <?php echo $member["First_name"] ?> </td>
                <td> <?php echo $member["Last_name"] ?> </td>
                <td> <?php echo $member["Birth"] ?> </td>
                <td> <?php echo $member["Phone_Number"] ?> </td>
                <td> <form method="post" action="?page=deleteMemberNow">

                        <input style="display:none;" value="<?php echo $member["Membership_number"]; ?>" name="membership_number">
                        <button value="submit"> Bestill Time </button>
                    </form>
                </td>
            </tr>
        <?php } ?>

    </table>
    <?php   
    }
    ?>
        
        

</main>
