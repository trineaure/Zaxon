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

        <p> Søk etter Zaxon's medlemer. </p>
        <p> Søk ved hjelp av fornavn, etternavn, fødselsdag eller mobilnummer. </p>   <br>
        <form method="post" action="?page=searchMember"> 
            <input type="text" class="input-textarea" name="searchKeyword" value="<?=$searchKeyword;?>" />
            <input id="submit" type="submit" value="Søk">
        </form>


        <?php
        if (!empty($searchResults)) { ?>

             <table>
             <tr><td> Medlemsnr </td> <td> Fornavn </td> <td> Etternavn </td> <td> Fødselsdag </td>  <td> Mobil nummer </td> </tr>

          <?php  foreach ($searchResults as $r) { ?>

                <tr>
                <td> <?php echo $r["Membership_number"]?></td>
                <td> <?php echo $r["First_name"] ?></td>
                <td> <?php echo $r["Last_name"] ?> </td>
                <td> <?php echo $r["Birth"] ?> </td>
                <td> <?php echo $r["Phone_Number"] ?> </td>
                </tr>
          <?php  } ?>

            </table>
      <?php  } else {
            echo "No results";
        }
        ?>    
</main>