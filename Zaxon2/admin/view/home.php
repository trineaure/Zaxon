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

<!-- START: Main area where content goes -->
<main>
    <p> Velkommen admin </p>

    <div id="small">
        <p> Ansatt</p>

                 <a href="?page=showEmployee" class="smallButton">Vis ansatte</a>
                <a href="?page=searchEmployee" class="smallButton">Søk i ansatte</a>
                <a href="?page=searchEmployee" class="smallButton">Vis egen timeplan</a>

    </div>



    <div id="small">
        <p> Kunde </p>

                 <a href="?page=showMembers" class="smallButton">Vis kunder</a>
                 <a href="?page=searchMember" class="smallButton">Søk i kunder</a>
                 <a href="?page=deleteMember" class="smallButton">Rediger kunde</a>
                   <a href="?page=searchEmployee" class="smallButton">Legg inn bestilling</a>

    </div>



</main>
<!-- END -->
