<!--ADMIN SIDE-->
<main>

        <p> Søkefelt. Søk etter kunder </p>

        <form method="post" action="?page=searchMember"> 
            <input type="text" class="input-textarea" name="searchKeyword" />
            <input id="submit" type="submit" value="search">
        </form>

        <?php
        $searchResults = $GLOBALS["searchResults"];
        ?>

        <?php if (!empty($searchResults)) { ?>

            <table>
                <tr><td> Medlemsnr </td> <td> Fornavn </td> <td> Etternavn </td> <td> Fødselsdag </td>  <td> Mobil nummer </td> </tr>

                <?php foreach ($searchResults as $r) { ?>

                    <tr>
                        <td> <?php echo $r["Membership_number"] ?> </td>
                        <td> <?php echo $r["First_name"] ?> </td>
                        <td> <?php echo$r["Last_name"] ?> </td>
                        <td> <?php echo $r["Birth"] ?></td>
                        <td> <?php echo $r["Phone_Number"] ?> </td>
                    </tr>
                <?php } ?>

            </table>
        <?php
        } else {
            echo "No results";
        }
        ?>    
</main>