<main>
    <p>Her ser du en liste over dine reservasjoner.</p>

    <table>
       <tr>
           <td>Dato:</td>
           <td>Tid:</td>
           <td>Frisør:</td>
           <td>Behandling:</td>
       </tr>
    <?php
    if (!empty($reservations)) {
        foreach($reservations["Reservation_number"] as $res) { ?>
           <tr>
               <td> <?php echo $res["Reservation_Date"] ?> </td>
               <td> <?php echo $res["Time_of_Day"] ?> </td>
               <td> <?php echo $res["First_Name"] ?> </td>
               <td> <?php echo $res["Reservation_Date"] ?> </td>
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


