<!--ADMIN SIDE-->

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script type="text/javascript">
        $("button").on("click', function () {
            $.ajax({
                type: 'POST',
                url: "view/deleteMember.php",
                data: {id: $(this).attr("data-id")},
                success: function (data) {
                    alert(data);
                    $('p').html(data);
                }
            });
        });
    </script>-->

<?php
//checks if a Employee are logged in 
session_start();
if (empty($_SESSION["EmployeeAreLoggedIn"])) {
    header("Location:../guest/?page=login");
}
?>
<?php
//$members = $GLOBALS["members"];
?>


<!-- START: Main area where content goes -->
<main>
    <p> Velkommen admin </p>

    <?php
//    "<p></p>";
//    echo $_POST['id'];
//
// echo $member["Membership_number"];
//   // echo '<button class="button" data-id="'.$members[$membershipnr]'" . type="button">Slett kunde</button>';
//    echo '<button class="button" data-id="'.$members[Membership_number].'" type="button">Slett kunde</button>';
    ?>



    <div id="big">
        <p> Ansatt</p>
        <div class="content-area">
            <div  id="big">

                <!--<a href="?page=deleteEmployee" class="button">Slett ansatt</a>-->
                 <a href="?page=showEmployee" class="smallButton">Vis ansatte</a>
                <a href="?page=searchEmployee" class="smallButton">Søk i ansatte</a>
                <a href="?page=searchEmployee" class="smallButton">Vis egen timeplan</a>
                <a href="?page=searchEmployee" class="smallButton">Legg inn bestilling</a>
               
            </div>
        </div>
<!--        <div class="content-area">
            <a href="?page=order"><img src="bilder/bestillings_knapp.png" alt=" " style="width: 50%; margin-left: 25%; margin-top: 38%; border-radius: 15px;"></a>
        </div>-->
    </div>



    <div id="small">
        <p> Kunde </p>
        <div class="content-area">
            <div id="big">

                 <a href="?page=showMembers" class="smallButton">Vis kunder</a>
                 <a href="?page=searchMember" class="smallButton">Søk i kunder</a>
                 <a href="?page=deleteMember" class="smallButton">Slett kunde</a>
              
               
            </div>
        </div>
    </div>



</main>
<!-- END -->
