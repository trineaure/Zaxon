<!--ADMIN SIDE-->
<main>
<!--    <div  id="adminMenu">
        <a href="?page=deleteMember" class="smallButton">Slett medlem</a>
        <a href="?page=searchMember" class="smallButton">Søk i medlemer</a>
    </div>-->

    <div id="adminMain">
        <?php
        $included_members = $GLOBALS["included_members"];

        echo "Medlemer av Zaxon kundeklubb" . "<br>";


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