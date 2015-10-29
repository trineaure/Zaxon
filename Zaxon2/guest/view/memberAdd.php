<?php
//variabler i $data2
$TlfNummer = $GLOBALS["tlfnummer"];
$feilTlf = $GLOBALS["feiltlf"];
?>
<main>
                    
                    <script>
                            //Ser om login_password stemmer overens med confirm_password
                    
                            function validate()
                            { 
                            var a = document.getElementById("Login_Password").value;
                            var b = document.getElementById("confirm_password").value;
                            if (a!==b) {
                            alert("Passordet er ikke likt");
                             
                            return false;
                            }
                            }
                    </script>
    
                    <div>
                        <b><p>Bli medlem av Zaxon</p></b><br>
                        <?php
                            if($feilTlf == "true"){?>
                        <h2> <?php echo $TlfNummer; ?> Eksisterer allerede</h2>
                            <?php }
                        ?>
                        <form onSubmit="return validate()" action="?page=memberAdded" method="post">
                            <p>Fornavn: <input type="text" placeholder="Ola" name="givenFirst_name" class="input-textarea" required/></p>
                            <p>Etternavn: <input type="text"placeholder="Nordmann" name="givenLast_name" class="input-textarea" required/></p>
                            <p>Fødselsdag: <input type="date"  placeholder="1995-06-26" name="givenBirth" class="input-textarea" required/></p>
                            <p>Telefon: <input type="number"placeholder="41761114" name="givenPhone_Number" class="input-textarea" required/></p>
                            <p>Passord: <input type="password" id="Login_Password" name="givenLogin_Password" minlength="6" class="input-textarea" required/></p>
                            <p>Gjenta Passord: <input type="password" id="confirm_password" name="givenConfirm_password" class="input-textarea" required/></p>
                            <input id="submit" type="submit" name="submit" value="Submit" />
                        </form>
                    </div>

           
</main>