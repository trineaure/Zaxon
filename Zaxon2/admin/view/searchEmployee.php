<!--ADMIN SIDE-->
<main>

    <p> Søk etter frisørene ved Zaxon </p>

    <form method="post" action="?page=searchEmployee"> 
        <input type="text" class="input-textarea" name="searchKeyword" />
        <input id="submit" type="submit" value="search">
    </form>

    <?php
    $searchResults = $GLOBALS["searchResults"];
    ?>

    <?php if (!empty($searchResults)) { ?>

        <table>
            <tr> <td> Ansatt ID </td> <td> Fornavn </td> <td> Etternavn </td> <td> Fødselsdag </td>  <td> Mobil nummer </td> <td> Hjemme adresse </td> <td> Postkode </td> </tr>

            <?php foreach ($searchResults as $r) { ?>

                <tr>
                    <td> <?php echo $r["EmployeeID"] ?></td>
                    <td> <?php echo $r["First_name"] ?> </td>
                    <td> <?php echo $r["Last_name"] ?></td>
                    <td> <?php echo $r["Birth"] ?></td>
                    <td> <?php echo $r["Phone_Number"] ?></td>
                    <td> <?php echo $r["Home_Address"] ?></td>
                    <td> <?php echo $r["Zip_Code"] ?></td>
                </tr>
            <?php } ?>

        </table>
    <?php
    } else {
        echo "No results";
    }
    ?>    
</main>