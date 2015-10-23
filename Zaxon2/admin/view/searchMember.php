

<main>
    <div  id="adminMenu">
        <a href="?page=login" class="smallButton">Member</a>
        <a href="?page=memberAdd" class="smallButton">Timeplan</a>
    </div>

    <div id="adminMain">

        <p> Søkefelt </p>

        <form method="post" action="?page=searchMember"> 
            <input type="text" name="searchKeyword" />
            <input id="submit" type="submit" value="search">
        </form>

        <?php
        $searchResults = $GLOBALS["searchResults"];
        ?>


        <?php
//var_dump($searchResults);
        if (!empty($searchResults)) {

            echo "<table>\n";
            echo "<tr> <td> Firtname </td> <td> Lastname </td> <td> Birthday </td>  <td> Phone number </td> </tr>";

            foreach ($searchResults as $r) {

                Echo "<tr>"
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