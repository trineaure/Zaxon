<!--ADMIN SIDE-->
<main>

    <div>
        <?php
        $included_members = $GLOBALS["included_members"];

        echo "Medlemer av Zaxon kundeklubb";
        echo "<table>\n";
        echo "<tr> <td> Kunde nummer </td> <td> Fornavn </td> <td> Etternavn </td> <td> Fødselsdag </td>  <td> Mobil nr </td> </tr>";

        if (!empty($included_members)) {
            foreach ($included_members as $member) {
                Echo "<tr>"
                . "<td>" . $member['Membership_number'] . "</td>"
                . "<td>" . $member['First_name'] . "</td>"
                . "<td>" . $member['Last_name'] . "</td>"
                . "<td>" . $member['Birth'] . "</td>"
                . "<td>" . $member['Phone_Number'] . "</td>"
                . "</tr>";
            }

            echo "</table>\n";
        } else {
            echo "No results";
        }
        ?>

    </div>
</main>