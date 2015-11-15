<?php
//variabler i $data2
$TlfNummer = $GLOBALS["tlfnummer"];
$feilTlf = $GLOBALS["feiltlf"];
?>
<main>

     <script>
         //Deffinerer hvilken funksjon som skal bli kjøprt når dokumentet lastes opp.
         $(document).ready(function() {
        showUploadOption();
        });

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
         
         //Viser hvilken meny som skal vises.
         function showUploadOption()
         {
             document.getElementById("Photo").style.display = "block";
             document.getElementById("noPhoto").style.display = "none";
         }
          function hideUploadOption()
         {
             document.getElementById("Photo").style.display = "none";
             document.getElementById("noPhoto").style.display = "block";
         }
     </script>

     <div >
         <b><p>Legg til arbeidstaker til Zaxon</p></b><br>
         <?php if ($feilTlf == "true") { ?>
             <h2> <?php echo $TlfNummer ?> Eksisterer allerede</h2>
         <?php }
         ?>
         <form onSubmit="return validate()" action="?page=employeeAdded"method="post"enctype="multipart/form-data">
             
             
             <p>Fornavn: <input type="text" placeholder="Ola" name="First_name" class="input-textarea" required/></p>
             <p>Etternavn: <input type="text"placeholder="Nordmann" name="Last_name" class="input-textarea" required/></p>
             <p>Fødselsdag: <input type="date"  placeholder="1995-06-26" name="Birth" class="input-textarea" required/></p>
             <p>Telefon: <input type="number"placeholder="41761114" name="Phone_Number" class="input-textarea" required/></p>
             <p>Hjemme Adresse: <input type="text"placeholder="Engens vei. 53" name="Home_Address" class="input-textarea" required/></p>
             <p>Post Nummer: <input type="number" placeholder="6006" name="Zip_Code" class="input-textarea" required/></p>
             <p>Passord: <input type="password" id="Login_Password" name="Login_Password" minlength="6" class="input-textarea" required/></p>
             <p>Gjenta Passord: <input type="password" id="confirm_password" name="confirm_password" class="input-textarea" required/></p>
             <!--Velger om man vil ha bilde eller ikke-->
             <div id="Photo">    
             <label for="Employee_Photo"><input type="radio" class="regular-radio" name="Employee_Photo" value="0"  onclick="hideUploadOption()" />Ingen bilde</label>       
             <p>Velg bilde som skal lastes opp:</p>
             <input type="file" name="fileToUpload" id="fileToUpload"></p>
             <p>Bildet må være av jpg format. Kan ikke være over 5 Mb </p>
             </div>
             <div id="noPhoto" style="display:none">
             <label for="Employee_Photo"><input type="radio" class="regular-radio" name="Employee_Photo" value="1"  onclick="showUploadOption()"checked/>Du vil ha bilde</label>     
             </div>
             <label for="Extended_Access"> <input type="radio" class="regular-radio" name="Extended_Access" value="0" checked/>Standard tilgang </label>
             <label for="Extended_Access"> <input type="radio" class="regular-radio" name="Extended_Access" value="1"/>Utvidet tilgang </label>
             <div class="backandforth">
             <input class="tinySubmit" type="submit" name="submit" value="Neste" />
             <a href="?page=home" class="tinyButton">Tilbake</a>
             </form> </div>
             
         </form>
             
     </div>
 </main>
