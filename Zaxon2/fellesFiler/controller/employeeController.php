<?php

require_once("tempController.php");

//Represents home page
class employeeController extends tempController {
    /**
     * Render "Home" View
     *@param string $page
     */
    public function show($page) {
        if($page == "employeeAdd")
            {
            $this ->showEmployeeAction();
            }   
        else if ($page == "employeeAdded")    
            {
            $this ->addEmployeeAction();
            }
        }
        
        
    private function showEmployeeAction() {
        $data2 = array("feiltlf" => false,"tlfnummer" => 0);
        return $this->render("employeeAdd",$data2);
    }


    private function addEmployeeAction(){

        $givenF_Name = $_REQUEST['First_name'];
        $givenL_Name = $_REQUEST['Last_name'];
        $givenBirth = $_REQUEST['Birth'];
        $_SESSION['givenEmployeeNumber'] = $_REQUEST['Phone_Number'];
        $givenHome_Address = $_REQUEST['Home_Address'];
        $givenZip_Code = $_REQUEST['Zip_Code'];
        $givenLogin_Password = $_REQUEST['Login_Password'];
        $givenExtended_Access = $_REQUEST['Extended_Access'];
        $givenEmployee_Photo = $_REQUEST['Employee_Photo'];
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

        $added = $employeeModel->add
                ($givenF_Name, $givenL_Name, $givenBirth, $_SESSION['givenEmployeeNumber'], $givenHome_Address, $givenZip_Code, $givenLogin_Password, $givenExtended_Access, $givenEmployee_Photo );

        //Upload file source: http://www.w3schools.com/php/php_file_upload.asp
        if($added == true)
        {
        $target_dir = "../fellesFiler/bilder/employees";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

//        echo"hei";
//        var_dump($target_file);
//        echo"hei slutt";
//        var_dump($_FILES["fileToUpload"]["name"]);
//        echo "hei";
        
        If($target_file == $target_dir)
        {
            echo"Du har ikke lastet opp et bilde av en arbeidstaker.";
//            $target_file= $target_dir . "/profilbilde.jpg";
//        
//            var_dump($target_file);
//            move_uploaded_file("/profilbilde.jpg", $target_file);
//           
//            
//            $name = $_SESSION['givenEmployeeNumber'];
            //rename("../fellesFiler/bilder/employees". basename("/profilbilde"), "../fellesFiler/bilder/employees/$name.jpg");
        }
        else
        {
        {
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" ) {
            echo "Sorry, only JPG files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                //Renames the file you have uploaded to what you want
                $name = $_SESSION['givenEmployeeNumber'];
                rename("../fellesFiler/bilder/employees". basename( $_FILES["fileToUpload"]["name"]), "../fellesFiler/bilder/employees/$name.jpg");
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }     }
        }

        $data = array("added" => $added);

        return $this->render("employeeAdded",$data);
        }
}}

