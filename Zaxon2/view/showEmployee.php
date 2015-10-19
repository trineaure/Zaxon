

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
    echo    "Fornavn: " . $employee['First_name'] . "<br>",
            "Etternavn: " . $employee['Last_name'] . "<br>",
            "Fødselsdag: " . $employee['Birth'] . "<br>",
            "Telefon nr: ". $employee['Phone_Number'] . "<br>",
            "Hjemme adresse: " . $employee['Home_Address'] . "<br>",
            "Post kode: " . $employee['Zip_Code'] . "<br>",
            "Passord: " . $employee['Login_Password'] . "<br>".  "<br>";
}
          ?>
    </div>
    
</main>