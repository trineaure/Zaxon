<?php
//checks if a Member Are Logged In
session_start();
if ( empty($_SESSION["MemberAreLoggedIn"]))
{
    header("Location:../guest/?page=login");
}
echo $_SESSION["MemberFirstName"];
?>
<!-- START: Main area where content goes -->
                <main>
                    <div id="big">
                        <div class="content-area">
                            <p>VELKOMMEN MEDLEM  </p>
                            <p> Ditt navn er: <?php echo $_SESSION["MemberFirstName"]; ?> </p>
                            <p>Zaxon er en profesjonell frisørsalong, som har beliggenhet i Ålesund.</p>
                            <p>   Vi er her for å gi deg en god håropplevelse. </p>
                        </div>
                        <div class="content-area">
                            <a href="?page=order"><img src="../fellesFiler/bilder/bestillings_knapp.png" alt=" " style="width: 50%; margin-left: 25%; margin-top: 38%; border-radius: 15px;"></a>
                        </div>
                    </div>

                    <div id="small">


                        <div class="content-area">
                            <img src="../fellesFiler/bilder/forsidebilde.png" alt="" style="width:100%;">
                        </div>

                    </div>
                </main>
                <!-- END -->
