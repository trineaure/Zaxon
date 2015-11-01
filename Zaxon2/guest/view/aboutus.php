<main>
                    <div id="big">
                        <div class="content-area">
                            <p>Zaxon har vært i Ålesund i godt over 10 år og har mange fornøyde kunder. 
                                Vi er også den ledende frisørsalongen som har vunnet beste salong 3 år på rad. 
                                Salongen har mange profesjonelle frisører med flere års erfaring. 
                                Du vil garantert føle deg som en prinsesse/prins etter en hårklipp med en av våre fantastiske frisører.
                                Vi kan tilby klipping av hår, farging og styling av bryn.
                                Vi har også en fornøyd garanti, om du ikke blir fornøyd med resultatet kan du komme tilbake innen 2 uker å få det rettet opp helt gratis. </p>
                        </div>
                    </div>

                    <div id="small">
                        <div class="content-area">
                           <img src="../fellesFiler/bilder/omoss.png" alt=" " style=" width: 100%; " >
                        </div>
                        
                    </div>
                </main>


<script>
function updateSeats()
    {
 
        <?php foreach($takenSeats as $takenSeat): ?>
            for (i=1; i<7 ; i++ ) 
            {
              var x = document.getElementById("A" + i);
              var y = document.getElementById("B" + i);  
              
              
             //window.alert(<?php //echo json_encode($takenSeat["SeatNumber"]) ?> );
       
             
              if(x.value == <?php echo json_encode($takenSeat["SeatNumber"]) ?> )
              {
                  var xLabel = document.getElementById("label" + x.value);
                  xLabel.style.backgroundColor = "red";
                  x.disabled=true;
              }
              
              if(y.value == <?php echo json_encode($takenSeat["SeatNumber"]) ?> )
              {
                  var yLabel = document.getElementById("label" + y.value);
                  yLabel.style.backgroundColor = "red";
                  y.disabled=true;
              }
            }
        <?php endforeach; ?>
        
    }