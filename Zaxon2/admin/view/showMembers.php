

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
    echo "Fornavn: " . $member['First_name'] . "\n",
         "Etternavn: " . $member['Last_name'] . "\n",
         "Fødselsdag: " . $member['Birth'] . "\n",
         "Telefon nr: ". $member['Phone_Number'] . "\n". "\n";
       //  "Passord: " . $member['Login_Password'] . "<br>".  "<br>";
}
          ?>
    </div>
    
</main>