<!--MASTER-->
<?php

// Controller layer - the router selects controller to use depending on URL and request parameters
class Router {

    /**
     * Returns the requested page name
     */
    public function getPage() {
        // Get page from request, or use default
        if (isset($_REQUEST["page"])) {
            $page = $_REQUEST["page"];
        } else {
            $page = $GLOBALS["DEFAULT_PAGE"];
        }
        return $page;
    }

    //
    /**
     * Decide which page to show
     * @return Controller
     */
    public function getController() {
        $page = $this->getPage();
        switch ($page) {

            case "pricelist":
            case "updatePricelist":
            case "updatePricelistAction":
                return new pricelistController();

//            case "searchMember":
//            case "searchEmployee":
//                return new searchController();
                
            case "searchMember":
            case "searchEmployee":
            case "listMembers":
            case "deleteMemberNow":
            case "listEmployees":
            case "deleteEmployeeNow":
            case "updateMember":
            case "updateMemberAction":
            case "updateEmployee":
            case "updateEmployeeAction":
                return new updateController();

            case "memberAdd":
            case "memberAdded":
                return new memberController();
                
            case "calendar":
            case "memberOrder":
            case "chooseTreatment":
            case "reservationDateAndEmployee":
            case "reservationTime":
            case "reservationComplete":
            case "reservationTreatmentFinish":
                return new reservationController();

            case "employeeAdd":
            case "employeeAdded":
                return new employeeController();

            case "home":
            default:
                return new homeController();
        }
    }

}
