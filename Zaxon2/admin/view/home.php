<?php
//checks if a Employee are logged in 
session_start();
if ( empty($_SESSION["EmployeeAreLoggedIn"]))
{
    header("Location:../guest/?page=login");
}

?>


<!-- START: Main area where content goes -->
                <main>
                    <div id="big">
                        <div class="content-area">
                           <p>VELKOMMEN ADMIN<p>
                            <p>Zaxon er en profesjonell frisørsalong, som har beliggenhet i Ålesund.
                                Vi er her for å gi deg en god håropplevelse. </p>
                        </div>
                        <div class="content-area">
                            <a href="?page=order"><img src="bilder/bestillings_knapp.png" alt=" " style="width: 50%; margin-left: 25%; margin-top: 38%; border-radius: 15px;"></a>
                        </div>
                    </div>

                    <div id="small">


                        <div class="content-area">
                            <img src="bilder/forsidebilde.png" alt="" style="width:100%;">
                        </div>

                    </div>
                </main>
                <!-- END -->