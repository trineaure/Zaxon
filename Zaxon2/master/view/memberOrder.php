<!--MASTER SIDE-->
<main>
    <?php
        $searchResults = $GLOBALS["searchResults"];
          if(isset($_REQUEST["searchKeyword"])) {
          $searchKeyword = $_REQUEST['searchKeyword'];
        }
        else {
            $searchKeyword = "";
        }
        ?>
        <p> Søk etter Zaxon's medlemmer, som du vil bestille en time for. </p>
        <p> Søk ved hjelp av fornavn, etternavn, fødselsdag eller mobilnr. </p>   <br>
        <form method="post" action="?page=memberOrder"> 
            <input class="input-textarea" type="text" name="searchKeyword" value="<?php $searchKeyword ?>" required />
            <input class="tinySubmit" type="submit" value="Søk">
            <a href="?page=home" class="tinyButton">Tilbake</a>
        </form>
        <table>
        <?php
        if (!empty($searchResults)) { ?>

        <tr> <td> Fornavn </td> <td> Etternavn </td> <td> Fødselsdag </td>  <td> Mobilnummer </td>  <td>Bestill time</td></tr>        
             <?php foreach ($searchResults as $searchResult) {
                ?>
                <tr>
                    <td> <?php echo $searchResult["First_name"] ?> </td>
                    <td> <?php echo $searchResult["Last_name"] ?> </td>
                    <td> <?php echo $searchResult["Birth"] ?> </td>
                    <td> <?php echo $searchResult["Phone_Number"] ?> </td>
                    <td> <form method="post" action="?page=defineMember">

                            <input style="display:none;" value="<?php echo $searchResult["Membership_number"] ?>" name="givenMembershipNumber">
                            <button value="submit"> Bestill </button>
                        </form>
                    </td>
                </tr>
    <?php }
} ?>
    </table>
</main>