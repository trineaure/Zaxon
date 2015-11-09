<!--MASTER SIDE-->
<main>
 <?php
        $searchResults = $GLOBALS["searchResults"];
     //   $searchKeyword = $GLOBALS["searchKeyword"];
        if(isset($_REQUEST["searchKeyword"])) {
          $searchKeyword = $_REQUEST['searchKeyword'];
        }
        else {
            $searchKeyword = "";
        }
        ?>

   

    <div>

        <p> Søk etter frisørene ved Zaxon </p>

        <form method="post" action="?page=searchEmployee"> 
            <input type="text" class="input-textarea" name="searchKeyword" value="<?=$searchKeyword;?>" />
            <input id="submit" type="submit" value="search">
        </form>

       <?php

        if (!empty($searchResults)) {

            echo "<table>\n";
            echo "<tr> <td> Ansatt ID </td> <td> Fornavn </td> <td> Etternavn </td> <td> Fødselsdag </td>  <td> Mobil nummer </td> <td> Hjemme adresse </td> <td> Postkode </td> </tr>";

            foreach ($searchResults as $r) {

                Echo "<tr>"
                . "<td>" . $r["EmployeeID"] . "</td>"
                . "<td>" . $r["First_name"] . "</td>"
                . "<td>" . $r["Last_name"] . "</td>"
                . "<td>" . $r["Birth"] . "</td>"
                . "<td>" . $r["Phone_Number"] . "</td>"
                . "<td>" . $r["Home_Address"] . "</td>"
                . "<td>" . $r["Zip_Code"] . "</td>"
                . "</tr>";
            }

            echo "</table>\n";
        } else {
            echo "No results";
        }
        ?>    
</main>