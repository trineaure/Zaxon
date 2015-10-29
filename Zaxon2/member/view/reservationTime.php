<?php
//checks if a Member Are Logged In

if ( empty($_SESSION["MemberAreLoggedIn"]))
{
    header("Location:../guest/?page=login");
}
echo "Ditt MemberID er: " . $_SESSION["MembershipNumber"];
?> <p></p>  <?php
echo "Din Employee er : " . $_SESSION['givenEmployeeID'];
?>
<p></p>  <?php
echo "Din dato er : " . $_SESSION['givenReservation_date'];
?>
<p>Tid som er valgt allerede for denne datoen er : </p>
<p></p>


<main>
 <div class="timeButton">

   <form action="?page=reservationComplete" method="post">
                            
                            <p>Velg tid</p>
                                    <table style="width:10%"><p align='center'>
                                          <tr>
                                            <td><input type="radio" id="10_00" value="10:00" name="time"><label for="10_00">10:00</label></td>
                                            <td><input type="radio" id="10_30" value="10:30" name="time"><label for="10_30">10:30</label></td>	
                                            <td><input type="radio" id="11_00" value="11:00" name="time"><label for="11_00">11:00</label></td>
                                            <td><input type="radio" id="11_30" value="11:30" name="time"><label for="11_30">11:30</label></td>
                                          </tr>
                                           <tr>
                                            <td><input type="radio" id="12_00" value="12:00" name="time"><label for="12_00">12:00</label></td>
                                            <td><input type="radio" id="12_30" value="12:30" name="time"><label for="12_30">12:30</label></td>	
                                            <td><input type="radio" id="13_00" value="13:00" name="time"><label for="13_00">13:00</label></td>
                                            <td><input type="radio" id="13_30" value="13:30" name="time"><label for="13_30">13:30</label></td>
                                          </tr>
                                           <tr>
                                            <td><input type="radio" id="14_00" value="14:00" name="time"><label for="14_00">14:00</label></td>
                                            <td><input type="radio" id="14_30" value="14:30" name="time"><label for="14_30">14:30</label></td>	
                                            <td><input type="radio" id="15_00" value="15:00" name="time"><label for="15_00">15:00</label></td>
                                            <td><input type="radio" id="15_30" value="15:30" name="time"><label for="15_30">15:30</label></td>
                                          </tr>
                                            <tr>
                                            <td><input type="radio" id="16_00" value="16:00" name="time"><label for="16_00">16:00</label></td>
                                            <td><input type="radio" id="16_30" value="16:30" name="time"><label for="16_30">16:30</label></td>	
                                            <td><input type="radio" id="17_00" value="17:00" name="time"><label for="17_00">17:00</label></td>
                                            <td><input type="radio" id="17_30" value="17:30" name="time"><label for="17_30">17:30</label></td>
                                          </tr>

                            <input id="submit" type="submit" name="submit" value="Submit" />
                         </form>
     
     
                         </div>
</div>
</main>