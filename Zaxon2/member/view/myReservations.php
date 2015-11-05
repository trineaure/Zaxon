<main>
    <p>Her ser du en liste over dine reservasjoner. </p>

    <?php
    $included_members = $GLOBALS["included_members"];
    if (!empty($included_members)) {
            
        echo "<table>\n";
        echo "<tr><td> Dato </td> <td> Tid på dagen </td> <td> Arbeidstaker ID: </td> </tr>";

        
        
        foreach ($included_members as $member) { ?>
        <tr>
                <td> <?php echo $member["Reservation_Date"] ?> </td>
                <td> <?php echo $member["Time_of_Day"] ?> </td>
                <td> <?php echo $member["EmployeeID"] ?> </td>
                <?php 
                 }
            echo "</table>\n";
            } 
            else 
            {
              echo "Du har ingen reservasjoner.";
            }
                ?>
            


</main>


