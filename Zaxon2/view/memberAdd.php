
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
                        <b><p>Add Member to Zaxon</p></b><br>
                        <form onSubmit="return validate()" action="member.php"method="post">
                            <p>Fornavn: <input type="text" placeholder="Ola" name="First_name" class="register-input" required/></p>
                            <p>Etternavn: <input type="text"placeholder="Nordmann" name="Last_name" class="register-input" required/></p>
                            <p>Fødselsdag: <input type="date"  placeholder="1995-06-26" name="Birth" class="register-input" required/></p>
                            <p>Telefon: <input type="number"placeholder="41761114" name="Phone_Number" class="register-input" required/></p>
                            <p>Passord: <input type="password" id="Login_Password" name="Login_Password" minlength="6" class="register-input" required/></p>
                            <p>Gjenta Passord: <input type="password" id="confirm_password" name="confirm_password"  class="register-input" required/></p>
                            <input id="submit" type="submit" name="submit" value="Submit" />
                        </form>
                    </div>

                </main>