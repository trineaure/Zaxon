<?php

require_once("tempController.php");

/**
 * Controlls of all the function with viewing of information on Zaxon.
 * Like showMembers, showEmployee and showMyReservations
 * 
 */
class showController extends tempController {

    public function show($page) {
        if ($page == "showMembers") {
            $this->showMembers();
        }
        if ($page == "showEmployee") {
            $this->showEmployee();
        }
        if ($page == "myReservations") {
            $this->showMyReservations($_SESSION["MembershipNumber"]);
        }
    }

    /**
     * Show all the Members in the database.
     * @return bool <b>TRUE</b> on success or <b>FALSE</b> on failure.
     * Render to the new page, showMembers
     */
    public function showMembers() {
        $memberModel = $GLOBALS["memberModel"];
        // Get all of the members from the db.
        $included_members = $memberModel->getAll();
        $data = array("included_members" => $included_members);
        return $this->render("showMembers", $data);
    }

    /**
     * Shows all the employee's in Zaxon.
     * @return bool <b>TRUE</b> on success or <b>FALSE</b> on failure.
     * Render to the new page, showEmployee
     */
    public function showEmployee() {
        $employeeModel = $GLOBALS["employeeModel"];

        // get all the employees from the db.
        $included_employee = $employeeModel->getAll();
        $data = array("included_employee" => $included_employee);
        return $this->render("showEmployee", $data);
    }

    /**
     * Shows the reservations to a member,
     * @return bool <b>TRUE</b> on success or <b>FALSE</b> on failure.
     * Render to the new page, myReservations
     * @return $this->render("myReservations")
     */
    public function showMyReservations($memberID) {
        $reservation_treatmentModel = $GLOBALS["reservation_treatmentModel"];
        $GLOBALS["reservations"] = $reservation_treatmentModel->getReservationInfo($memberID);
        return $this->render("myReservations");
    }

}
