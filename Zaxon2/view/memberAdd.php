<main>
                    
                    <script>
                            //Ser om login_password stemmer overens med confirm_password
                            function validate()
                            { 
                            var a = document.getElementById("givenLogin_Password").value;
                            var b = document.getElementById("givenConfirm_password").value;
                            if (a!==b) {
                            alert("Passordet er ikke likt");
                            return false;
                            }
                            }
                    </script>
      
                    
                    <div>
                        <b><p>Add Member to Zaxon</p></b><br>
                        <form onSubmit="return validate()" action="page=../inga/MemberAdded" method="post">
                           <p>Medlemsnr: <input type="number" placeholder="medlemsnr" name="givenMembership_number" class="register-input" required/></p>
                            <p>Fornavn: <input type="text" placeholder="Ola" name="givenFirst_name" class="register-input" required/></p>
                            <p>Etternavn: <input type="text"placeholder="Nordmann" name="givenLast_name" class="register-input" required/></p>
                            <p>Fødselsdag: <input type="date"  placeholder="1995-06-26" name="givenBirth" class="register-input" required/></p>
                            <p>Telefon: <input type="number"placeholder="41761114" name="givenPhone_Number" class="register-input" required/></p>
                            <p>Passord: <input type="password" id="Login_Password" name="givenLogin_Password" minlength="6" class="register-input" required/></p>
                            <p>Gjenta Passord: <input type="password" id="confirm_password" name="givenConfirm_password"  class="register-input" required/></p>
                            <input id="submit" type="submit" name="submit" value="Submit" />
                        </form>
                    </div>

           
</main>