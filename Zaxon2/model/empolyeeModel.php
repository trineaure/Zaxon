<?php


class empoyeeModel {
    /** @var PDO */
    private $dbConn;

    const TABLE = "Empolyee";
    const SELECT_QUERY = "SELECT * FROM " . empoyeeModel::TABLE;
    const INSERT_QUERY = "INSERT INTO " . empoyeeModel::TABLE . " (name) VALUES (:name)";

    /** @var PDOStatement Statement for selecting all entries */
    private $selStmt;
    /** @var PDOStatement Statement for adding new entries */
    private $addStmt;

    //Constructor for the class employeeModel
    /*
     * @param $dbConn - The connection to the database
     */
    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->addStmt = $this->dbConn->prepare(empoyeeModel::INSERT_QUERY);
        $this->selStmt = $this->dbConn->prepare(empoyeeModel::SELECT_QUERY);
    }

    /**
     * Get all employee stored in the DB
     * @return array in associative form
     */
    public function getAll() {
        // Fetch all employee as associative arrays
        $this->selStmt->execute();
        return $this->selStmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Try to add a new customer
     *
     * @param $name
     *
     * @return bool true on success, false otherwise
     */
    public function add($name) {
        return $this->addStmt->execute(array("name" => $name));
    }

    // TODO - create additional functions for customer model here

    if ($dbConn) {

                        $fName = $_POST['First_name'];
                        $lName = $_POST['Last_name'];
                        $birth = $_POST['Birth'];
                        $Phone_Number = $_POST['Phone_Number'];
                        $Home_Address = $_POST['Home_Address'];
                        $Zip_Code = $_POST['Zip_Code'];
                        $Login_Password = $_POST['Login_Password'];
                        $confirm_password = $_POST['confirm_password'];
                        

                        $sql = "INSERT INTO dbo.Employee(First_name,Last_name,Birth,Phone_Number,Home_Address,Zip_Code,Login_Password)
                        VALUES ('$fName','$lName','$birth','$Phone_Number','$Home_Address','$Zip_Code','$Login_Password')";


                    $q1 = sqlsrv_query($conn, $sql);
                    if ($q1 === false) {
                        //Error page
                        echo"<script>window.location = 'http://localhost/github/zaxon/zaxon2/memberDenied.html'</script>";
                        die(print_r(sqlsrv_errors(), true));
                    } else {
                        echo "Success";
                        
                    }
                } else {
                    echo "Connection could not be established.\n";
                    die(print_r(sqlsrv_errors(), true));
                }


                sqlsrv_close($conn);
                ?>
    
}