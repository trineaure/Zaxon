<?php

require_once("tempController.php");

//Represents home page
class employeeController extends tempController {

    /**
     * Render "Home" View
     * @param string $page
     */
    public function show($page) {

        switch ($page) {

            case($page == "employeeAdd"):
                $this->showEmployeeAction();
                break;

            case($page == "employeeAdded"):
                $this->addEmployeeAction();
                break;
        }
    }

    /**
     * Show the information where the Employee can add himself.
     * Checks if the Phone_Number is false.
     * @return
     */
    private function showEmployeeAction() {
        $data2 = array("feiltlf" => false, "tlfnummer" => 0);
        return $this->render("employeeAdd", $data2);
    }

    /**
     * Add an employee to the db.
     * @return
     */
    private function addEmployeeAction() {

        $givenF_Name = filter_input(INPUT_POST, "First_name");
        $givenL_Name = filter_input(INPUT_POST, "Last_name");
        $givenBirth = filter_input(INPUT_POST, "Birth");
        $_SESSION['givenEmployeeNumber'] = filter_input(INPUT_POST, "Phone_Number");
        $givenHome_Address = filter_input(INPUT_POST, "Home_Address");
        $givenZip_Code = filter_input(INPUT_POST, "Zip_Code");
        $givenLogin_Password = filter_input(INPUT_POST, "Login_Password");
        $givenExtended_Access = filter_input(INPUT_POST, "Extended_Access");
        $givenEmployee_Photo = filter_input(INPUT_POST, "Employee_Photo");
        // Try to add new customers, Set action response code - success or not
        $employeeModel = $GLOBALS["employeeModel"];
        $numbers = $employeeModel->getAllNumbers();

        //check's if there are any phone number = $givePhone_number
        // if true. Render the page again.
        foreach ($numbers as $number) {
            if ($number["Phone_Number"] == $_SESSION['givenEmployeeNumber']) {
                $data2 = array(
                    "feiltlf" => "true",
                    "tlfnummer" => $_SESSION['givenEmployeeNumber']);
                return $this->render("employeeAdd", $data2);
            }
        }
        //Upload file source: http://www.w3schools.com/php/php_file_upload.asp 

        $target_dir = "../fellesFiler/bilder/employees";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

        //Denne funksjonen blir kjørt hvis bruker velger å ikke laste opp bilde. 
        //Siden ingen bilde er lastet opp så er ". basename($_FILES["fileToUpload"]["name"])" lik 0
        //så blir arbeidstaker info lagret i databasen.
        If ($target_file == $target_dir) {
            $added = $employeeModel->add
                    ($givenF_Name, $givenL_Name, $givenBirth, $_SESSION['givenEmployeeNumber'], $givenHome_Address, $givenZip_Code, $givenLogin_Password, $givenExtended_Access, $givenEmployee_Photo);
            echo"Du har ikke lastet opp et bilde av en arbeidstaker.";
            //Denne variabelen brues til å vise om opplastningen er vellykket.
            $uploadOk = 0;
            $data = array("added" => $added, "uploadOk" => $uploadOk);
            return $this->render("employeeAdded", $data);
        } else {
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check !== false) {
                    echo "Filen er et bilde:" . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "Filen er ikke et bilde.";
                    $uploadOk = 0;
                }
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                echo "filen eksisterer allerede";
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "Filen er for stor.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if ($imageFileType != "jpg") {
                echo "Bare jpg format er tilatt.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, filen ble ikke opplastet.";
                // if everything is ok, try to upload file. 
                //så blir arbeidstakerinfo lagt til i databasen 
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " har blitt lastet opp. \n";
                    //Renames the file you have uploaded to what you want
                    $name = $_SESSION['givenEmployeeNumber'];
                    rename("../fellesFiler/bilder/employees" . basename($_FILES["fileToUpload"]["name"]), "../fellesFiler/bilder/employees/$name.jpg");

                    $added = $employeeModel->add
                            ($givenF_Name, $givenL_Name, $givenBirth, $_SESSION['givenEmployeeNumber'], $givenHome_Address, $givenZip_Code, $givenLogin_Password, $givenExtended_Access, $givenEmployee_Photo);

                    $data = array("added" => $added, "uploadOk" => $uploadOk);
                    return $this->render("employeeAdded", $data);
                } else {
                    echo "Sorry, det var en feil under opplastingen.\n";
                }
            }
            //if nothing is right, $uploadOk = 0, $added = 0
            $added = 0;
            $data = array("added" => $added, "uploadOk" => $uploadOk);
            return $this->render("employeeAdded", $data);
        }
    }

}
