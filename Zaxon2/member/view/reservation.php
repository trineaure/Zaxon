<?php
//checks if a Member Are Logged In
session_start();
if ( empty($_SESSION["MemberAreLoggedIn"]))
{
    header("Location:../guest/?page=login");
}
echo "Ditt MemberID er: " . $_SESSION["MembershipNumber"];
?>
<main>

                    <div>
                        <b><p>Reserver en time</p></b><br>
                        
                         <form action="?page=reservationComplete" method="post">
                            <p>Reservasjons Dato: <input type="date" placeholder="1995-06-26" name="givenReservation_date" class="register-input" required/></p>
                            <p>Tid på dagen: <input type="text"placeholder="hrs:mins" name="givenReservation_time" class="register-input" required/></p>
                            <p>EmployeeID: <input type="number"placeholder="321" name="givenEmployeeID" class="register-input" required/></p>
                            <input id="submit" type="submit" name="submit" value="Submit" />
                        </form>
                    </div>

           
</main>