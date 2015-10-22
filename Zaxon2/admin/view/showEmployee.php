

<main>
    <div  id="adminMenu">
        <a href="?page=login" class="smallButton">Ansatt</a>
        <a href="?page=EmployeeAdd" class="smallButton">Timeplan</a>
    </div>

    <div id="adminMain">
  <?php
       
    $included_employee = $GLOBALS["included_employee"];

  //  var_dump($included_members);
foreach ($included_employee as $employee) {
    echo    "Fornavn: " . $employee['First_name'] . "\n",
            "Etternavn: " . $employee['Last_name'] . "\n",
            "Fødselsdag: " . $employee['Birth'] . "\n",
            "Telefon nr: ". $employee['Phone_Number'] . "\n",
            "Hjemme adresse: " . $employee['Home_Address'] . "\n",
            "Post kode: " . $employee['Zip_Code'] . "\n" . "\n";
          //  "Passord: " . $employee['Login_Password'] . "<br>".  "<br>";
}
          ?>
    </div>
    
</main>