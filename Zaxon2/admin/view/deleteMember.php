<!--ADMIN SIDE-->
<main>
    <?php
    $members = $GLOBALS["members"];
    ?>

    <script>
//alert on delete
        function confirm_alert(node) {
            return confirm("You are about to permanently delete a product. Click OK to continue or CANCEL to quit.");
        }
    </script>

    <p> Her kan en slette medlemene i Zaxon .</p>



    <table id="submit" type="delete" value="delete">

        <?php echo "<tr> <td> Fornavn </td> <td> Etternavn </td> <td> Fødselsdag </td> <td> Mobil </td>  <td>  Slett </td> </tr>";
        ?>

        <?php foreach ($members as $member) { ?>

           <!--<form onSubmit="return confirm_alert(this)" action="?page=deleteMember" method="post">-->    
                <tr>

                    <td> <?php echo $member["First_name"] ?> </td>
                    <td> <?php echo $member["Last_name"] ?> </td>
                    <td> <?php echo $member["Birth"] ?> </td>
                    <td> <?php echo $member["Phone_Number"] ?> </td>
                    <td> <form method="post" action="?page=deleteMemberNow">

                            <input style="display:none;" value="<?php echo $member["Membership_number"]; ?>" name="membershipnr">
                            <button value="submit"> Delete </button>
                        </form>
                    </td>
                </tr>
            <!--</form>-->
        <?php } ?>

    </table>

</main>

