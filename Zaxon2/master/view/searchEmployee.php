<!--MASTER SIDE-->
<main>  
    <?php
        $searchResults = $GLOBALS["searchResults"];
          if(isset($_REQUEST["searchKeyword"])) {
          $searchKeyword = $_REQUEST['searchKeyword'];
        }
        else {
            $searchKeyword = "";
        }
        ?><br>
        <p> Søk etter frisørene ved Zaxon </p>
        <p> Søk ved hjelp av fornavn, etternavn, fødselsdag eller mobilnummer. </p>
         
        
<!--        <div class="backandforth">-->
            <br>
            <form method="post" action="?page=searchEmployee"> 
            <input type="text" class="input-textarea" name="searchKeyword" value="<?php echo $searchKeyword ?>" />
            <input class="tinySubmit" type="submit" value="Søk">
             <a href="?page=home" class="tinyButton">Tilbake</a> <br><br>
            </form>
<!--        </div>-->

   <script>
//alert on delete
    function ConfirmDelete()
    {
      var x = confirm("Er du sikker på at du vil slette?");
      if (x)
          return true;
      else
        return false;
    }
    </script>
        

       <?php
        if (!empty($searchResults)) { ?>
          <table>
            <tr> <td>Fornavn</td> <td>Etternavn</td> <td>Fødselsdag</td>  <td>Tlf.</td> <td>Adresse</td> <td>Postkode</td> <td>Rediger</td>  <td>Slett</td> </tr>

           <?php foreach ($searchResults as $r) { ?>
                    <tr>
                        <td> <?php echo $r["First_name"] ?> </td>
                        <td> <?php echo $r["Last_name"] ?> </td>
                        <td> <?php echo $r["Birth"]  ?></td>
                        <td> <?php echo $r["Phone_Number"] ?> </td>
                        <td> <?php echo $r["Home_Address"] ?></td>
                        <td> <?php echo $r["Zip_Code"] ?></td>
                    <td>
                    <form method="post" action="?page=updateEmployee">
                        <input type="hidden" value="<?php echo $employee["EmployeeID"]; ?>" name="EmployeeID">
                        <input type="hidden" value="<?php echo $r["First_name"]; ?>" name="First_name">
                        <input type="hidden" value="<?php echo $r["Last_name"]; ?>" name="Last_name">
                        <input type="hidden" value="<?php echo $r["Birth"]; ?>" name="Birth">
                        <input type="hidden" value="<?php echo $r["Phone_Number"]; ?>" name="Phone_Number">
                        <input type="hidden" value="<?php echo $r["Home_Address"]; ?>" name="Home_Address">
                        <input type="hidden" value="<?php echo $r["Zip_Code"]; ?>" name="Zip_Code">
                        <button value="submit"> Endre </button>
                    </form>
                </td>  
                <td>
                    <form method="post" action="?page=deleteEmployeeNow">
                        <!--Delete the employee by the unique employeeID-->
                        <input style="display:none;" value="<?php echo $r["EmployeeID"]; ?>" name="employeeID">
                        <button Onclick="return ConfirmDelete();"  type="submit" value="1"> Slett </button>
                    </form>
                </td>
            </tr>
        <?php }  ?>
         </table><?php } ?> 
        
</main>