<main>
    <?php
    if (isset($GLOBALS["member"])) {
        $member = $GLOBALS["member"];
    }
    ?>

    <p> Din kundeinformasjon:</p> 

    <div>
        <table>
            <tr>
                <td> <?php echo $member["First_name"] ?> </td>
                <td> <?php echo $member["Last_name"] ?> </td>
                <td> <?php echo $member["Birth"] ?> </td>
                <td> <?php echo $member["Phone_Number"] ?> </td>
            </tr>
        </table>
    </div>
</main>