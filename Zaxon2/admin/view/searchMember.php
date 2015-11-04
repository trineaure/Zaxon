<!--ADMIN SIDE-->
<main>


    <div>

        <p> Søkefelt. Søk etter kunder </p>

        <form method="post" action="?page=searchMember"> 
            <input type="text" class="input-textarea" name="searchKeyword" />
            <input id="submit" type="submit" value="search">
        </form>

        <?php
        $searchResults = $GLOBALS["searchResults"];
        ?>

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
        } else {
            echo "No results";
        }
        ?>    
</main>