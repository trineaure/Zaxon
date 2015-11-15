<main>
    <?php
    if (isset($GLOBALS["member"])) {
        $member = $GLOBALS["member"];
    }
    ?>

    <p> Din kundeinformasjon:</p> 

    <div>
        <table>
            
            <tr> <td> Fornavn </td> <td> Etternavn </td> <td> Fødselsdag </td> <td> Mobil </td> </tr>
            <tr>
                <td> <?php echo $member["First_name"] ?> </td>
                <td> <?php echo $member["Last_name"] ?> </td>
                <td> <?php echo $member["Birth"] ?> </td>
                <td> <?php echo $member["Phone_Number"] ?> </td>
            </tr>
        </table>
    </div>
     <div  id="big">
        <a href="?page=home" class="button"><-Tilbake</a>
    </div>
    
</main>