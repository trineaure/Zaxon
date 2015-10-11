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
                        <li><a href="../bestille.php">Bestill time</a></li>
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
                     <?php
                $serverName = "(local)";
                $connectionInfo = array("Database" => "Zaxon", "UID" => "admin", "PWD" => "admin");
                $conn = sqlsrv_connect($serverName, $connectionInfo);

                if ($conn == true) {

                    $fName = $_POST['First_name'];
                    $lName = $_POST['Last_name'];

                    $sql = "INSERT INTO admin.Employee (First_name,Last_name)
    VALUES ('$fName','$lName')";


                    $q1 = sqlsrv_query($conn, $sql);
                    if ($q1 === false) {
                        echo "PeaceLate!!!!";
                        die(print_r(sqlsrv_errors(), true));
                    } else {
                        echo "success";
                    }
                } else {
                    echo "Connection could not be established.\n";
                    die(print_r(sqlsrv_errors(), true));
                }


                sqlsrv_close($conn);
                ?>
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


