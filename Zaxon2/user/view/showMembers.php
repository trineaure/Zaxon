

<main>
    <div  id="adminMenu">
        <a href="?page=login" class="smallButton">Medlem</a>
        <a href="?page=memberAdd" class="smallButton">Timeplan</a>
    </div>

    <div id="adminMain">
  <?php
       
    $included_members = $GLOBALS["included_members"];
    
  //  var_dump($included_members);
foreach ($included_members as $member) {
    echo "Fornavn: " . $member['First_name'] . "<br>",
         "Etternavn: " . $member['Last_name'] . "<br>",
         "Fødselsdag: " . $member['Birth'] . "<br>",
         "Telefon nr: ". $member['Phone_Number'] . "<br>";
       //  "Passord: " . $member['Login_Password'] . "<br>".  "<br>";
}
          ?>
    </div>
    
</main>