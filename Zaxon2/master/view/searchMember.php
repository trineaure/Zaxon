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
        ?><br>
        <p> Søk etter Zaxon's medlemer. </p>
        <p> Søk ved hjelp av fornavn, etternavn, fødselsdag eller mobilnummer. </p>
        
        <br>
        <form method="post" action="?page=searchMember"> 
            <input type="text" class="input-textarea" name="searchKeyword" value="<?php echo $searchKeyword ?>" required />
            <input class="tinySubmit" type="submit" value="Søk">
             <a href="?page=home" class="tinyButton">Tilbake</a> <br><br>
        </form>
        
           <script>
//alert on delete
    function ConfirmDelete()
    {
      var x = confirm("Er du sikker på at du vil slette?");
      if (x)
          return true;
      else
        return false;
    }
    </script>
        <?php
         if (!empty($searchResults)) { ?>
            <table>
                <tr><td>Fornavn</td> <td>Etternavn</td> <td>Fødselsdag</td>  <td>Tlf.</td> <td>Rediger</td>  <td>Slett</td></tr>

                <?php foreach ($searchResults as $r) { ?>
                    <tr>
                        <td> <?php echo $r["First_name"] ?> </td>
                        <td> <?php echo$r["Last_name"] ?> </td>
                        <td> <?php echo $r["Birth"] ?></td>
                        <td> <?php echo $r["Phone_Number"] ?> </td>
                        <td>
                    <form method="post" action="?page=updateMember">
                        <input type="hidden" value="<?php echo $r["Membership_number"]; ?>" name="Membership_number">
                        <input type="hidden" value="<?php echo $r["First_name"]; ?>" name="First_name">
                        <input type="hidden" value="<?php echo $r["Last_name"]; ?>" name="Last_name">
                        <input type="hidden" value="<?php echo $r["Birth"]; ?>" name="Birth">
                        <input type="hidden" value="<?php echo $r["Phone_Number"]; ?>" name="Phone_Number">                    
                        <button value="submit"> Endre </button>
                    </form>
                </td>  
                <td>
                    <form method="post" action="?page=deleteMemberNow">
                        <input style="display:none;" value="<?php echo $r["Membership_number"]; ?>" name="membershipnr">
                        <button Onclick="return ConfirmDelete();"  type="submit" value="1"> Slett </button>
                    </form>
                </td>
            </tr>
        <?php } ?>
     </table><?php } ?> 
</main>