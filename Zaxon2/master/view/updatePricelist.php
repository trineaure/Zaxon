<!--MASTER SIDE-->
<main>
    <?php
    $treatment = $GLOBALS["treatment"];
foreach($treatment as $treat) {
    $updatePrice = $treat["Price"];
    $Treatment = $treat["Treatment_Name"];
}
    ?>

    <p> Her kan en oppdatere prislisten i Zaxon .</p> <br>
    <div>
        <form method="post" action="?page=updatePricelistAction">
            Pris: <input type="number" class="input-textarea" name="Price" value="<?php echo $updatePrice ?>"> <br />
            <input type="hidden" class="input-textarea" name="Treatment_Name" value="<?php echo $Treatment ?>"> <br />
             <button value="submit" id="submit""> Oppdater</button>
        </form> 
    </div>


</main>

