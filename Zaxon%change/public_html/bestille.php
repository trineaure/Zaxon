<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <!-- START: Head med meta tagger ++ -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Zaxon</title>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <!-- END -->

    <!-- START: Body -->
    <body>

        <!-- START: Container (Den som holder bredden til siden) -->
        <div class="container">
            <!-- START: Navigasjon -->
            <nav>
                <div class="nav-bar">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="bestille.php">Bestill time</a></li>
                        <li><a href="prisliste.html">Prisliste</a></li>
                        <li><a href="oss.html">Om oss</a></li>
                        <li><a href="kontakt.html">Kontakt</a></li>
                    </ul>
                </div>
            </nav>
            <!-- END -->

            <!-- Lager til strukturen under navigasjonen og over footer -->
            <div id="structure">

                <!-- START: Header -->
                <header>
                    <div class="image">
                        <a href="index.html"><img src="bilder/logoo.png" alt=""></a>
                    </div>
                </header>
                <!-- END -->

                <!-- START: Main area where content goes -->
                <main>
                    <div id="big">
                        <div class="content-area">
                          
                                
                                Fyll ut skjemaet nedenfor for å bestille time.
                                Vi bekrefter timebestilling tilbake til deg så snart vi kan per epost.<br><br>
                                
                                </div>
                                </div> 
                        <div id="small">
                            <?php
                            if($_SESSION['info']) {
                                echo '<p id="info">' . $_SESSION['info'] . '</p>';
                                unset($_SESSION['info']);
                            } else if($_SESSION['error']) {
                                echo '<p id="error">' . $_SESSION['error'] . '</p>';
                                unset($_SESSION['error']);
                            }
                            ?>
                        <div class="content-area">
                                <form action="sendmail.php" method="post">
        
                                <label>Navn: </label>
                                <input name="navn" placeholder="Ditt navn" required>
            
                                <label>Epost:</label>
                                <input name="email" type="email" placeholder="din@epost.her" required>
                                    
                                <label>Telefon:</label>
                                <input name="telefon" placeholder="(+47) 123 45 678">
                                
                                <label>Dag og klokkeslett du ønsker timen: </label>
                                <textarea name="time" placeholder="F.eks: Fredag, 27.03.15 kl 12." required></textarea>
                                
                                <label>Eventuell melding. </label>
                                <textarea name="message"></textarea>
            
                                <input id="submit" name="submit" type="submit" value="Send Bestilling.">
        
                                </form>
                        </div>
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
                        <img src="img/icons/face.png" alt="">
                        <img src="img/icons/twitter.png" alt="">
                        <img src="img/icons/instagram.png" alt="">
                    </div>
                </div>
            </footer>
            <!-- END -->
        </div>
    </body>
    <!-- END -->

</html>
