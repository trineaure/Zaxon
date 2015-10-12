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

                    <div>
                        <b><p>Add Member to Zaxon</p></b><br>
                        <form action="member.php" method="post">
                            <p>First name: <input type="text" placeholder="Ola" name="First_name" required/></p>
                            <p>Last name: <input type="text"placeholder="Nordmann" name="Last_name" required/></p>
                            <p>Birth: <input type="text"placeholder="1995-06-26" name="Birth" required/></p>
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
