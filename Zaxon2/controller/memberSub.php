<!DOCTYPE html>
<html lang="en">

    <!-- START: Head med meta tagger ++ -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Zaxon</title>
        <link rel="stylesheet" href="../css/style.css" />

    </head>
    <!-- END -->

    <!-- START: Body -->
    <body>

        <!-- START: Container (Den som holder bredden til siden) -->
        <div class="container">



            <!-- START: Navigasjon -->
            <nav>
                <!-- START: Header -->
                <header>
                    <div class="logo">
                        <a href="../index.html"><img src="../bilder/nylogo.png" alt=""></a>
                    </div>
                </header>
                <!-- END -->

                <div class="nav-bar">

                    <ul>
                        <li><a href="../index.html">Home</a></li>
                        <li><a href="../bestill.html">Bestill time</a></li>
                        <li><a href="../prisliste.html">Prisliste</a></li>
                        <li><a href="../oss.html">Om oss</a></li>
                        <li><a href="../kontakt.html">Kontakt</a></li>
                    </ul>
                </div>
            </nav>
            <!-- END -->

            <!-- Lager til strukturen under navigasjonen og over footer -->
            <div id="structure">



                <!-- START: Main area where content goes -->
                <main>
                    
                    <script>
                            //Ser om login_password stemmer overens med confirm_password
                            function validate()
                            { 
                            var a = document.getElementById("Login_Password").value;
                            var b = document.getElementById("confirm_password").value;
                            if (a!=b) {
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
                            <p>Fødselsdag: <input type="text"  placeholder="1995-06-26" name="Birth" class="register-input" required/></p>
                            <p>Telefon: <input type="number"placeholder="41761114" name="Phone_Number" class="register-input" required/></p>
                            <p>Passord: <input type="text"placeholder="luremus123" id="Login_Password" name="Login_Password" class="register-input" required/></p>
                            <p>Gjenta Passord: <input type="text"placeholder="luremus123" id="confirm_password" name="confirm_password" class="register-input" required/></p>
                            <input id="submit" type="submit" name="submit" value="Submit" />
                        </form>
                    </div>

                </main>

                <!-- END -->

            </div>

            <!-- START: Footer -->
            <footer>
                <div class="footer-container">
                    <div class="footer-col">
                        <h2>Vårt Lokale</h2>
                        <p>Zaxon salong <br> Zaxon gate 32, 6014 Ålesund</p>
                    </div>
                    <div class="footer-col">
                        <h2>Kontakt</h2>
                        <p>tlf. 555-zaxon<br>
                            mail:
                            <a href="mailto:zaxon@frisor.no" target="_top">zaxon@frisor.no</a> </p>
                    </div>
                    <div class="footer-col">
                        <img src="../img/icons/face.png" alt="">
                        <img src="../img/icons/twitter.png" alt="">
                        <img src="../img/icons/instagram.png" alt="">
                    </div>
                </div>
            </footer>
            <!-- END -->
        </div>
    </body>
    <!-- END -->

</html>
