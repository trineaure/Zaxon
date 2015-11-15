<!--MEMBER-->
<!-- START: Main area where content goes -->
<main>
    <div id="big">
        <div class="content-area">
            <p>Velkommen <?php echo $_SESSION["MemberFirstName"]; ?> </p><br>
<!--            <p>Zaxon er en profesjonell frisørsalong, som har beliggenhet i Ålesund.</p>
            <p>   Vi er her for å gi deg en god håropplevelse. </p>-->
            <a href="?page=myReservations" class="smallButton">Min bestillinger</a>
            <a href="?page=myInfo" class="smallButton">Min kundeinformasjon</a>
            <a href="?page=updateInformation" class="smallButton">Oppdater kundeinformasjon</a>


            <a href="?page=chooseTreatment"><img src="../fellesFiler/bilder/bestillings_knapp.png" id="orderButton" ></a>
        </div>
    </div>

    <div id="small">


        <div class="content-area">
            <img src="../fellesFiler/bilder/forsidebilde.png" id="photo">
        </div>

    </div>
</main>
<!-- END -->
