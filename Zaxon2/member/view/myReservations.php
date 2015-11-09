<main>
    <p>Her ser du en liste over dine reservasjoner. </p>

    <?php
    $reservations = $GLOBALS["myReservations"];
    if (!empty($reservations)) {
        foreach($reservations as $res) { ?>
           <table>
               <tr>
                   <td>Dato:</td>
                   <td>Tid:</td>
                   <td>Dato:</td>
                   <td>Tid:</td>
               </tr>
          </table>
    
    <?php }
    } 
    
    else {
        echo "Du har ingen reservasjoner.";
    }?>
            
    <div  id="big">
         <a href="?page=order" class="button"><-Tilbake</a>
    </div>

</main>


