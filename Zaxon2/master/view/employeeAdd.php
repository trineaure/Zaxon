<?php
//variabler i $data2
$TlfNummer = $GLOBALS["tlfnummer"];
$feilTlf = $GLOBALS["feiltlf"];
?>
<main>

     <script>
         //Ser om login_password stemmer overens med confirm_password
         //javascript
         function validate()
         {
             var a = document.getElementById("Login_Password").value;
             var b = document.getElementById("confirm_password").value;
             if (a !== b) {
                 alert("Passordet er ikke likt");
                 return false;
             }
         }
     </script>

     <div >
         <b><p>Legg til arbeidstaker til Zaxon</p></b><br>
         <?php if ($feilTlf == "true") { ?>
             <h2> <?php echo $TlfNummer ?> Eksisterer allerede</h2>
         <?php }
         ?>
         <form onSubmit="return validate()" action="?page=employeeAdded"method="post">
             
             
             <p>Fornavn: <input type="text" placeholder="Ola" name="First_name" class="input-textarea" required/></p>
             <p>Etternavn: <input type="text"placeholder="Nordmann" name="Last_name" class="input-textarea" required/></p>
             <p>Fødselsdag: <input type="date"  placeholder="1995-06-26" name="Birth" class="input-textarea" required/></p>
             <p>Telefon: <input type="number"placeholder="41761114" name="Phone_Number" class="input-textarea" required/></p>
             <p>Hjemme Adresse: <input type="text"placeholder="Engens vei. 53" name="Home_Address" class="input-textarea" required/></p>
             <p>Post Nummer: <input type="number" placeholder="6006" name="Zip_Code" class="input-textarea" required/></p>
             <p>Passord: <input type="password" id="Login_Password" name="Login_Password" minlength="6" class="input-textarea" required/></p>
             <p>Gjenta Passord: <input type="password" id="confirm_password" name="confirm_password" class="input-textarea" required/></p>
            
             <label for="Extended_Access"> <input type="radio" class="regular-radio" name="Extended_Access" value="0" checked/>Standard tilgang </label>
             <label for="Extended_Access"> <input type="radio" class="regular-radio" name="Extended_Access" value="1"/>Utvidet tilgang </label>
             <input id="submit" type="submit" name="submit" value="Submit"  required/>
             
         </form>
     </div>
 </main>
