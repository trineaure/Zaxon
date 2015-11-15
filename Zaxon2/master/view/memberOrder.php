<!--MASTER SIDE-->
<main>

    <p> Søk etter Zaxon's medlemer du vil bestille en time for </p>
    <p> Søk ved hjelp av fornavn, etternavn, fødselsdag eller mobilnr. </p>   <br>
    <form method="post" action="?page=memberOrder"> 
        <input class="input-textarea" type="text" name="searchKeyword" />
        <input id="submit" type="submit" value="search">
    </form>


    <table>
        <?php
        $searchResults = $GLOBALS["searchResults"];

        if (!empty($searchResults)) {

            foreach ($searchResults as $searchResult) {
                ?>
        <tr> <td> Fornavn </td> <td> Etternavn </td> <td> Fødselsdag </td>  <td> Mobil nummer </td>  <td>Bestill time</td></tr>

                <tr>
                    <td> <?php echo $searchResult["First_name"] ?> </td>
                    <td> <?php echo $searchResult["Last_name"] ?> </td>
                    <td> <?php echo $searchResult["Birth"] ?> </td>
                    <td> <?php echo $searchResult["Phone_Number"] ?> </td>
                    <td> <form method="post" action="?page=chooseTreatment">

                            <input style="display:none;" value="<?php echo $member["Membership_number"] ?>" name="info Gard Skal ta med">
                            <button value="submit"> Bestill </button>
                        </form>
                    </td>
                </tr>
    <?php }
} ?>

    </table>


</main>