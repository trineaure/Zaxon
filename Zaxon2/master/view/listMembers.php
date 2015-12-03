<!--MASTER SIDE-->
<main>
    <?php
    $members = $GLOBALS["included_members"];
    ?>
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
   
    
    <table id="submit" type="delete" value="delete">

        <?php echo "<tr> <td>Fornavn</td> <td>Etternavn</td> <td>Fødselsdag</td> <td>Tlf.</td> <td>Rediger</td>  <td>Slett</td> </tr>";
        ?>

        <?php foreach ($members as $member) { ?>
            <tr>
                <td> <?php echo $member["First_name"] ?> </td>
                <td> <?php echo $member["Last_name"] ?> </td>
                <td> <?php echo $member["Birth"] ?> </td>
                <td> <?php echo $member["Phone_Number"] ?> </td>
                <td>
                    <form method="post" action="?page=updateMember">
                        <input type="hidden" value="<?php echo $member["Membership_number"]; ?>" name="Membership_number">
                        <input type="hidden" value="<?php echo $member["First_name"]; ?>" name="First_name">
                        <input type="hidden" value="<?php echo $member["Last_name"]; ?>" name="Last_name">
                        <input type="hidden" value="<?php echo $member["Birth"]; ?>" name="Birth">
                        <input type="hidden" value="<?php echo $member["Phone_Number"]; ?>" name="Phone_Number">                    
                        <button value="submit"> Endre </button>
                    </form>
                </td>  
                <td>
                    <form method="post" action="?page=deleteMemberNow">
                        <input style="display:none;" value="<?php echo $member["Membership_number"]; ?>" name="membershipnr">
                        <button Onclick="return ConfirmDelete();"  type="submit" value="1"> Slett </button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
    <a href="?page=home" class="bigButton">Tilbake</a>
</main>

 