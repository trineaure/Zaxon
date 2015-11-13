<!--MEMBER-->
<!-- START: Main area where content goes -->
<main>
    <div id="big">
        <div class="content-area">
            <p>VELKOMMEN MEDLEM  </p>
            <p> Ditt navn er: <?php echo $_SESSION["MemberFirstName"]; ?> </p>
            <p>Zaxon er en profesjonell frisørsalong, som har beliggenhet i Ålesund.</p>
            <p>   Vi er her for å gi deg en god håropplevelse. </p>

            <a href="?page=myInfo" class="smallButton">Min kundeinformasjon</a>
            <a href="?page=updateInformation" class="smallButton">Oppdater kundeinformasjon</a>

        </div>
        <div class="content-area">
            <a href="?page=order"><img src="../fellesFiler/bilder/bestillings_knapp.png" id="orderButton" ></a>
        </div>
    </div>

    <div id="small">


        <div class="content-area">
            <img src="../fellesFiler/bilder/forsidebilde.png" id="photo">
        </div>

    </div>
</main>
<!-- END -->
