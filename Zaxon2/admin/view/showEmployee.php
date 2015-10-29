<!--ADMIN SIDE-->
<main>
<!--      <div  id="adminMenu">
            <a href="?page=deleteEmployee" class="smallButton">Slett ansatt</a>
            <a href="?page=searchEmployee" class="smallButton">Søk i ansatte</a>
        </div>-->

    <div id="adminMain">
        <?php
        $included_employee = $GLOBALS["included_employee"];

        echo"Frisørene i Zaxon"; // . "<br>";

        echo "<table>\n";
        echo "<tr> <td> Ansatt ID </td> <td> Fornavn </td> <td> Etternavn </td> <td> Fødselsdag </td>  <td> Mobil nr </td>  <td> Adresse </td> <td> Post Adresse </td> </tr>";

        if (!empty($included_employee)) {
            foreach ($included_employee as $employee) {
                Echo "<tr>"
                . "<td>" . $employee['EmployeeID'] . "</td>"
                . "<td>" . $employee['First_name'] . "</td>"
                . "<td>" . $employee['Last_name'] . "</td>"
                . "<td>" . $employee['Birth'] . "</td>"
                . "<td>" . $employee['Phone_Number'] . "</td>"
                . "<td>" . $employee['Home_Address'] . "</td>"
                . "<td>" . $employee['Zip_Code'] . "</td>"
                . "</tr>";
            }
            
            echo "</table\n";
        } else {
            echo "No results";
        }
        ?>
    </div>

</main>

